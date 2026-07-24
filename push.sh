#!/usr/bin/env bash
#
# push.sh — commit and push theme changes to GitHub, which triggers
# Hostinger's Git deploy (if auto-deploy is enabled in hPanel) or shows
# up ready to click "Redeploy" in hPanel > Advanced > Git.
#
# Usage:
#   ./push.sh                       (uses an auto-generated commit message)
#   ./push.sh "describe the change" (uses your own commit message)
#
# Run this from Terminal.app on your Mac — not from inside Claude — since
# it needs your machine's normal internet access to reach GitHub.

set -e
cd "$(dirname "$0")"

if [ -z "$(git status --porcelain)" ]; then
  echo "No changes to push — working tree is clean."
  exit 0
fi

MSG="${1:-Update theme files ($(date '+%Y-%m-%d %H:%M'))}"

git add -A
git commit -m "$MSG"

if ! git remote get-url origin >/dev/null 2>&1; then
  echo
  echo "No GitHub remote is configured yet. Run this once:"
  echo "  git remote add origin <your-repo-url>"
  echo "  git push -u origin main"
  echo
  echo "Your commit was saved locally but NOT pushed."
  exit 1
fi

git push origin main
echo
echo "Pushed. If auto-deploy is on in hPanel > Advanced > Git, tvga.info"
echo "will update automatically in a minute or two. Otherwise, go to"
echo "hPanel > Advanced > Git and click Redeploy."
