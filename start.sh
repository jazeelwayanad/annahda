#!/usr/bin/env sh
set -e

# Create .env on first boot if not present so ${MYSQL*} mappings work
if [ ! -f .env ] && [ -f .env.example ]; then
  cp .env.example .env
fi

# Map Railway's MYSQL* envs to Laravel's DB_* envs if DB_* are not already set
if [ -n "${MYSQLHOST}" ]; then
  [ -z "${DB_CONNECTION}" ] && export DB_CONNECTION="mysql"
  [ -z "${DB_HOST}" ] && export DB_HOST="${MYSQLHOST}"
  [ -z "${DB_PORT}" ] && export DB_PORT="${MYSQLPORT:-3306}"
  [ -z "${DB_DATABASE}" ] && export DB_DATABASE="${MYSQLDATABASE}"
  [ -z "${DB_USERNAME}" ] && export DB_USERNAME="${MYSQLUSER}"
  [ -z "${DB_PASSWORD}" ] && export DB_PASSWORD="${MYSQLPASSWORD}"
fi

# Clear any stale caches (prevents fallback to sqlite)
php artisan package:discover --ansi || true
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Run migrations with retries (DB may not be immediately available)
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

php artisan storage:link || true

# Cache for performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Serve on Railway's assigned PORT
exec php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
