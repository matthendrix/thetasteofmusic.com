"use client";

import { useEffect, useMemo, useRef, useState } from "react";
import type { Artist } from "@/data/artists";

type Props = {
  items: Artist[];
};

export default function ArtistWall({ items }: Props) {
  const [activeSlug, setActiveSlug] = useState<string | null>(null);
  const audioRef = useRef<HTMLAudioElement>(null);

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
    if (activeSlug) {
      audioRef.current?.pause();
      window.history.replaceState(null, "", `#${activeSlug}`);
      return;
    }

    window.history.replaceState(null, "", window.location.pathname);
    void audioRef.current?.play().catch(() => null);
  }, [activeSlug]);

  return (
    <main>
      <section className="persona-wrap">
        {activeArtist ? (
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
        ) : (
          <div className="persona-idle">
            <h1>The Taste Of Music</h1>
            <p>Pick an artist tile to play a track.</p>
          </div>
        )}
      </section>

      <ul className={`wall ${activeArtist ? "scrub" : ""}`}>
        {items.map((item) => {
          const isActive = item.slug === activeSlug;
          return (
            <li key={item.slug} className={isActive ? "active" : ""}>
              <button type="button" onClick={() => setActiveSlug(item.slug)}>
                <img src={`/img-songs/${item.slug}.jpg`} alt={`${item.artist} portrait`} loading="lazy" />
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
