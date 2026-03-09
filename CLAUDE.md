# CLAUDE.md

This file provides guidance to Claude Code when working with code in this repository.

## Project

Plain HTML/CSS/JS static site deployed to GitHub Pages. A personal artist wall where visitors click tiles to watch YouTube embeds. No build step, no framework, no dependencies.

## File Structure

- `index.html` — shell HTML, loads style.css and app.js
- `style.css` — all styles
- `app.js` — all behaviour (YouTube IFrame API, scrub bar, keyboard nav, hash routing, idle sweep, ambient audio)
- `data.js` — static array of artist records (slug, artist, song, embed YouTube ID)
- `img-songs/{slug}.jpg` — one image per artist tile
- `audio/vinyl-21.mp3` — ambient background audio

## Adding an Artist

1. Add an entry to `data.js`
2. Drop `img-songs/{slug}.jpg`

## Deployment

GitHub Pages: Settings > Pages > Source: master branch, root folder.
URL: https://<username>.github.io/thetasteofmusic.com/
Pushing to master triggers deployment automatically.

## Development

Open `index.html` directly in a browser, or use any static server:

    npx serve .

No build step. No npm. No Node.js required.

## Architecture Notes

- `activeSlug` is a plain module-scoped variable in `app.js`. No stale closure issues, so callbacks read it directly.
- YouTube player is reused via `loadVideoById()` — not destroyed/recreated on each selection.
- Autoplay on hard refresh may be blocked by browser policy — expected behaviour.
- Keyboard shortcuts (arrows/Escape) only fire when an artist is active, not in YouTube fullscreen.

## Legacy Archive

`_archive/php-website/` is the old PHP site snapshot — reference only, never deployed.
