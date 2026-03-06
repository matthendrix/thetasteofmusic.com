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

If port `3000` is already in use, Next.js will auto-pick another port (for example `3003`) and print it in the terminal.

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
5. Production branch: `master`

## Notes

- Legacy root PHP files were archived to keep the repository focused on the Next.js app.
- Temporary local files are ignored via `.gitignore` (`.next-*.log`, `dev-*.log`, `CLAUDE.md`).
