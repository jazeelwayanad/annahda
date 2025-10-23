#!/usr/bin/env sh
set -e

# Create .env on first boot if not present so ${MYSQL*} expansion works
if [ ! -f .env ] && [ -f .env.example ]; then
  cp .env.example .env
fi

# Clear any stale caches that might still point to sqlite
php artisan package:discover --ansi || true
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Run migrations with retries (DB may not be ready immediately)
max=10
count=0
until php artisan migrate --force; do
  count=$((count+1))
  if [ "$count" -ge "$max" ]; then
    echo "Migrations failed after $max attempts"
    break
  fi
  echo "Migration failed, retrying in 5s ($count/$max)..."
  sleep 5
done

# Optional but safe to repeat
php artisan storage:link || true

# Cache for performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start the server on Railway's PORT
exec php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
