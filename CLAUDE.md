# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

Next.js 15 (App Router) + React 19 + TypeScript site deployed to Vercel. A personal artist wall where visitors click tiles to watch YouTube embeds. No database — all artist data is static TypeScript.

> Note: `AGENTS.md` describes the old PHP structure and is outdated. Ignore it.

## Commands

```bash
npm run dev      # local dev server at http://127.0.0.1:3000
npm run build    # production build
npm run lint     # ESLint via next lint
```

TypeScript check (no dedicated script): `npx tsc --noEmit`

## Architecture

**Data flow:** `src/data/artists.ts` → `src/app/page.tsx` → `src/components/artist-wall.tsx`

- `src/data/artists.ts` — static array of `Artist` records (`slug`, `artist`, `song`, `embed` YouTube ID). Adding an artist = adding an entry here + dropping `{slug}.jpg` in `public/img-songs/`.
- `src/components/artist-wall.tsx` — single client component. Manages active artist state, hash-based deep links (`#slug`), background vinyl audio (`/audio/vinyl-21.mp3`), and YouTube nocookie iframe embed on tile click.
- `src/app/layout.tsx` — root layout with `<html>` and global metadata.
- `src/app/globals.css` — all styles (no CSS modules or Tailwind).

**Static assets** live in `public/`:
- `public/img-songs/{slug}.jpg` — one image per artist tile
- `public/audio/vinyl-21.mp3` — ambient background audio

## Deployment

Vercel project linked to this repo. `vercel.json` sets framework to `nextjs`. Merging to `master` triggers production deployment.

## Legacy archive

`_archive/php-website/` is the old PHP site snapshot — reference only, never deployed.
