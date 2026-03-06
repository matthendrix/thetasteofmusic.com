"use client";

import { useEffect, useMemo, useRef, useState } from "react";
import type { Artist } from "@/data/artists";

type Props = {
  items: Artist[];
};

type YTPlayerState = {
  ENDED: number;
};

type YTPlayerEvent = {
  data: number;
  target: YTPlayer;
};

type YTReadyEvent = {
  target: YTPlayer;
};

type YTPlayer = {
  destroy: () => void;
  loadVideoById: (videoId: string) => void;
  playVideo: () => void;
};

type YTApi = {
  Player: new (
    element: string | HTMLElement,
    config: {
      videoId?: string;
      playerVars?: Record<string, number>;
      events?: {
        onReady?: (event: YTReadyEvent) => void;
        onStateChange?: (event: YTPlayerEvent) => void;
      };
    }
  ) => YTPlayer;
  PlayerState: YTPlayerState;
};

declare global {
  interface Window {
    YT?: YTApi;
    onYouTubeIframeAPIReady?: () => void;
  }
}

export default function ArtistWall({ items }: Props) {
  const [activeSlug, setActiveSlug] = useState<string | null>(null);
  const [showBrightSweep, setShowBrightSweep] = useState(false);
  const [hasInteracted, setHasInteracted] = useState(false);
  const audioRef = useRef<HTMLAudioElement>(null);
  const wallRef = useRef<HTMLUListElement>(null);
  const tileRefs = useRef<Record<string, HTMLLIElement | null>>({});
  const playerRef = useRef<YTPlayer | null>(null);
  const activeSlugRef = useRef<string | null>(null);
  const [ytReady, setYtReady] = useState(false);

  const activeArtist = useMemo(
    () => items.find((item) => item.slug === activeSlug) ?? null,
    [activeSlug, items]
  );
  const orderedSlugs = useMemo(() => items.map((item) => item.slug), [items]);

  useEffect(() => {
    if (window.YT?.Player) {
      setYtReady(true);
      return;
    }

    const script = document.createElement("script");
    script.src = "https://www.youtube.com/iframe_api";
    script.async = true;
    document.body.appendChild(script);

    const previous = window.onYouTubeIframeAPIReady;
    window.onYouTubeIframeAPIReady = () => {
      previous?.();
      setYtReady(true);
    };

    return () => {
      window.onYouTubeIframeAPIReady = previous;
    };
  }, []);

  useEffect(() => {
    const hash = window.location.hash.replace("#", "");
    if (hash && items.some((item) => item.slug === hash)) {
      setActiveSlug(hash);
      setHasInteracted(true);
      return;
    }

    void audioRef.current?.play().catch(() => null);
  }, [items]);

  useEffect(() => {
    if (hasInteracted) {
      return;
    }
    const timer = window.setTimeout(() => {
      setShowBrightSweep(true);
    }, 3000);

    return () => {
      window.clearTimeout(timer);
    };
  }, [hasInteracted]);

  useEffect(() => {
    if (activeSlug) {
      audioRef.current?.pause();
      window.history.replaceState(null, "", `#${activeSlug}`);
      return;
    }

    window.history.replaceState(null, "", window.location.pathname);
    void audioRef.current?.play().catch(() => null);
  }, [activeSlug]);

  useEffect(() => {
    activeSlugRef.current = activeSlug;
  }, [activeSlug]);

  useEffect(() => {
    if (!activeSlug) {
      return;
    }

    const wall = wallRef.current;
    const tile = tileRefs.current[activeSlug];
    if (!wall || !tile) {
      return;
    }

    const targetLeft = tile.offsetLeft - wall.clientWidth / 2 + tile.clientWidth / 2;
    wall.scrollTo({ left: Math.max(0, targetLeft), behavior: "smooth" });
  }, [activeSlug]);

  useEffect(() => {
    if (!activeArtist || !ytReady || !window.YT?.Player) {
      return;
    }

    if (!playerRef.current) {
      playerRef.current = new window.YT.Player("persona-video", {
        videoId: activeArtist.embed,
        playerVars: {
          autoplay: 1,
          controls: 1,
          rel: 0
        },
        events: {
          onReady: (event) => {
            event.target.playVideo();
          },
          onStateChange: (event) => {
            if (event.data !== window.YT?.PlayerState.ENDED) {
              return;
            }

            const currentSlug = activeSlugRef.current;
            if (!currentSlug) {
              return;
            }
            const currentIndex = orderedSlugs.indexOf(currentSlug);
            if (currentIndex === -1) {
              return;
            }
            const nextSlug = orderedSlugs[(currentIndex + 1) % orderedSlugs.length];
            setActiveSlug(nextSlug);
          }
        }
      });
      return;
    }

    playerRef.current.loadVideoById(activeArtist.embed);
  }, [activeArtist, orderedSlugs, ytReady]);

  useEffect(() => {
    return () => {
      playerRef.current?.destroy();
      playerRef.current = null;
    };
  }, []);

  useEffect(() => {
    function handleKeyDown(event: KeyboardEvent) {
      if (event.key === "Escape") {
        setActiveSlug(null);
        return;
      }

      const currentSlug = activeSlugRef.current;
      if (!currentSlug) {
        return;
      }

      if (event.key === "ArrowRight" || event.key === "ArrowLeft") {
        const currentIndex = orderedSlugs.indexOf(currentSlug);
        if (currentIndex === -1) {
          return;
        }
        const delta = event.key === "ArrowRight" ? 1 : -1;
        const nextSlug = orderedSlugs[(currentIndex + delta + orderedSlugs.length) % orderedSlugs.length];
        setHasInteracted(true);
        setShowBrightSweep(false);
        setActiveSlug(nextSlug);
      }
    }

    window.addEventListener("keydown", handleKeyDown);
    return () => window.removeEventListener("keydown", handleKeyDown);
  }, [orderedSlugs]);

  function activateSlug(slug: string) {
    if (!hasInteracted) {
      setHasInteracted(true);
      setShowBrightSweep(false);
    }
    setActiveSlug(slug);
  }

  return (
    <main>
      {activeArtist ? (
        <section className="persona-wrap">
          <div className="persona">
            <button type="button" className="close-btn" onClick={() => setActiveSlug(null)}>
              x
            </button>
            <h1>{activeArtist.artist}</h1>
            <p>{activeArtist.song}</p>
            <div
              id="persona-video"
              className="video"
            />
          </div>
        </section>
      ) : null}

      <ul
        ref={wallRef}
        className={`wall ${activeArtist ? "scrub" : ""}`}
        onWheel={(event) => {
          if (!activeArtist || !wallRef.current) {
            return;
          }
          if (Math.abs(event.deltaY) > Math.abs(event.deltaX)) {
            wallRef.current.scrollLeft += event.deltaY;
            event.preventDefault();
          }
        }}
      >
        {items.map((item, index) => {
          const isActive = item.slug === activeSlug;
          const shouldBlink = showBrightSweep && !hasInteracted;
          return (
            <li
              key={item.slug}
              ref={(element) => {
                tileRefs.current[item.slug] = element;
              }}
              className={`${isActive ? "active" : ""} ${shouldBlink ? "bright" : ""}`.trim()}
            >
              <button type="button" onClick={() => activateSlug(item.slug)}>
                <img
                  src={`/img-songs/${item.slug}.jpg`}
                  alt={`${item.artist} portrait`}
                  loading="lazy"
                  style={shouldBlink ? { animationDelay: `${index * 0.1}s` } : undefined}
                />
                <div>
                  <span>{item.artist}</span>
                  <span>{item.song}</span>
                </div>
              </button>
            </li>
          );
        })}
      </ul>

      <audio ref={audioRef} loop preload="auto">
        <source src="/audio/vinyl-21.mp3" type="audio/mpeg" />
      </audio>
    </main>
  );
}
