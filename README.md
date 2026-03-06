# The Taste Of Music

This repository contains the **Next.js migration** of `thetasteofmusic.com`, designed for deployment on Vercel.

## Stack

- Next.js (App Router)
- React
- TypeScript

## Project Structure

- `src/app/` - App Router pages and global styles
- `src/components/` - UI components (artist wall)
- `src/data/` - artist/song/embed data
- `public/` - runtime static assets (images/audio)
- `_archive/php-website/` - legacy PHP website snapshot (reference only)

## Local Development

```bash
npm install
npm run dev
```

Open: `http://127.0.0.1:3000`

## Build And Run

```bash
npm run build
npm run start
```

## Deployment (Vercel)

1. Import this GitHub repository into Vercel.
2. Use the default Next.js framework detection.
3. Build command: `npm run build`
4. Output: Next.js managed output (default)
5. Deploy from `feature/nextjs-vercel-migration` (or merge to `master` first).

## Notes

- Legacy root PHP files were archived to keep the repository focused on the Next.js app.
- Temporary local server logs are ignored via `.gitignore` (`.next-*.log`).
