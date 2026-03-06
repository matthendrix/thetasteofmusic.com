# Repository Guidelines

## Project Structure & Module Organization
This repository is a classic PHP site with static assets.
- `public_html/`: live web root and primary code.
- `public_html/index.php`, `public_html/soma.php`: main entry pages.
- `public_html/inc.*.php`: shared bootstrap, DB, helper, and layout includes.
- `public_html/css`, `public_html/js`, `public_html/img`, `public_html/audio`: frontend assets.
- `public_html/soma` and `public_html/somafm`: channel data and related pages/assets.
- `_archive/`: historical files; do not treat as runtime code.

## Build, Test, and Development Commands
There is no build pipeline in this project; edits are served directly by PHP/Apache.
- `php -S localhost:8080 -t public_html`: run local dev server.
- `php -l public_html/index.php`: lint a single PHP file.
- `Get-ChildItem public_html -Recurse -Filter *.php | ForEach-Object { php -l $_.FullName }`: lint all PHP files.

## Coding Style & Naming Conventions
- Follow existing style: tabs for indentation, K&R-style braces, and procedural PHP includes.
- Keep include names consistent with current patterns (for example `inc.globals.php`, `inc.functions.common.php`).
- Use lowercase, hyphenated names for asset files (for example `john-lennon.jpg`).
- Keep page-specific logic close to its page file; shared logic belongs in `inc.*.php`.

## Testing Guidelines
- No automated test suite is configured.
- Required baseline before PR: PHP lint passes for changed files and key pages load locally (`/`, `/soma.php`, relevant `somafm` routes).
- Document manual verification steps in your PR description.

## Commit & Pull Request Guidelines
Remote history uses short, imperative summaries (examples: `Initial commit`, `Add initial files/folders`, `Update inc.globals.php`).
- Use concise subject lines under 72 chars.
- Keep commits scoped to one logical change.
- PRs should include: purpose, files/areas changed, manual test notes, and screenshots for UI changes.

## Security & Configuration Tips
- `public_html/inc.globals.php` contains environment-specific DB settings; avoid introducing new hardcoded secrets.
- Prefer local-only overrides for credentials and never expose sensitive values in logs or screenshots.
