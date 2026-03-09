# Repository Guidelines

## Project Structure & Module Organization
This repo now runs as a Next.js App Router project.
- `src/app/`: routes, layout, global CSS, and runtime error boundaries.
- `src/components/`: interactive UI components (for example the artist wall/player).
- `src/data/`: static content lists (artists, songs, YouTube IDs).
- `public/`: runtime assets (`img-songs/`, `audio/`, favicon files).
- `_archive/php-website/`: historical PHP snapshot for reference only; do not treat as active runtime code.

## Project Intent
- Treat this site as a personal artwork piece for Matt and friends, not a conventional public-facing product.
- Treat the homepage as artwork, not a conventional landing page.
- Do not add or suggest a homepage title, hero, or explanatory intro unless explicitly requested.
- Do not default to accessibility, compliance, old-browser, or generic product UX critiques unless explicitly requested.
- Keep technical work simple and tightly scoped to actual breakage, reliability issues, content updates, or explicit requests.
- Do not expand simple requests into lint/tooling migrations, process-heavy workflows, or speculative cleanup.
- If a task starts to sprawl, stop and return to the simplest interpretation of the request.

## Build, Test, and Development Commands
- `npm install`: install dependencies.
- `npm run dev`: start local dev server.
- `npm run dev -- --port 3003`: force a specific port when 3000 is occupied.
- `npm run build`: production build sanity check.
- `npm run lint`: run ESLint checks.

## Coding Style & Naming Conventions
- Language stack: TypeScript + React function components.
- Keep diffs minimal and behavior-focused; avoid broad refactors unless requested.
- Reuse existing naming conventions:
  - Components/files: follow existing conventions in place.
  - Data slugs: lower-case hyphenated IDs (`john-lydon`, `gary-numan`).
- Keep artist/media changes in `src/data/artists.ts` plus matching files in `public/img-songs/`.

## Testing Guidelines
No formal test suite is configured yet.
- Required baseline before pushing: `npm run build`.
- Recommended quick check: `npm run dev` and manually verify playback flow, close button, and scrubber behavior.
- For YouTube changes, verify unavailable videos do not block the session flow.

## Commit & Pull Request Guidelines
- Use short, imperative commit subjects (for example `Add Gary Numan Cars track`).
- Keep each commit scoped to one logical change.
- Do not commit local-only artifacts (logs, scratch files).
- PR descriptions should include: purpose, files changed, and manual verification performed.

## Security & Configuration Tips
- Keep Vercel config explicit in `vercel.json` (`framework: nextjs`).
- Never commit secrets or tokens.
- Preserve `.gitignore` rules for local-only files (`dev-*.log`, `CLAUDE.md`, caches).
