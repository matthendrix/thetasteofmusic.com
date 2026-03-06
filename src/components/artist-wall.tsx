"use client";

import { useEffect, useMemo, useRef, useState } from "react";
import type { Artist } from "@/data/artists";

type Props = {
  items: Artist[];
};

export default function ArtistWall({ items }: Props) {
  const [activeSlug, setActiveSlug] = useState<string | null>(null);
  const [showBrightSweep, setShowBrightSweep] = useState(false);
  const [hasInteracted, setHasInteracted] = useState(false);
  const audioRef = useRef<HTMLAudioElement>(null);
  const wallRef = useRef<HTMLUListElement>(null);
  const tileRefs = useRef<Record<string, HTMLLIElement | null>>({});

  const activeArtist = useMemo(
    () => items.find((item) => item.slug === activeSlug) ?? null,
    [activeSlug, items]
  );

  useEffect(() => {
    const hash = window.location.hash.replace("#", "");
    if (hash && items.some((item) => item.slug === hash)) {
      setActiveSlug(hash);
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
            <iframe
              className="video"
              src={`https://www.youtube-nocookie.com/embed/${activeArtist.embed}?autoplay=1&rel=0`}
              title={`${activeArtist.artist} - ${activeArtist.song}`}
              allow="autoplay; encrypted-media; picture-in-picture"
              allowFullScreen
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
