# The Taste of Music

A personal artist wall. Click a tile to watch a YouTube embed.

## Stack

Plain HTML, CSS, and JavaScript. No framework, no build step.

## Files

- `index.html` — page shell
- `style.css` — all styles
- `app.js` — all behaviour
- `data.js` — artist list (edit here to add/remove artists)
- `img-songs/` — one `.jpg` per artist tile
- `audio/` — ambient background audio

## Adding an Artist

1. Add an entry to `data.js`
2. Drop `img-songs/{slug}.jpg`
3. Push to master — GitHub Pages deploys automatically

## Local Dev

Open `index.html` directly in a browser, or serve with any static server (e.g. `npx serve .` or VS Code Live Server).
