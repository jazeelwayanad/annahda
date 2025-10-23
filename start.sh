#!/usr/bin/env sh
set -e

# Create .env on first boot if not present
if [ ! -f .env ] && [ -f .env.example ]; then
  cp .env.example .env
fi

# Always map Railway's MYSQL* envs to Laravel's DB_* envs (override any .env placeholders)
if [ -n "${MYSQLHOST}" ]; then
  export DB_CONNECTION="mysql"
  export DB_HOST="${MYSQLHOST}"
  export DB_PORT="${MYSQLPORT:-3306}"
  export DB_DATABASE="${MYSQLDATABASE}"
  export DB_USERNAME="${MYSQLUSER}"
  export DB_PASSWORD="${MYSQLPASSWORD}"
fi

# Log effective DB settings (no password)
echo "DB_CONNECTION=${DB_CONNECTION}"
echo "DB_HOST=${DB_HOST}"
echo "DB_PORT=${DB_PORT}"
echo "DB_DATABASE=${DB_DATABASE}"
echo "DB_USERNAME=${DB_USERNAME}"

# Clear caches (avoid stale config)
php artisan package:discover --ansi || true
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Generate app key if not provided via env or .env
if [ -z "${APP_KEY}" ]; then
  php artisan key:generate --force || true
fi

# Start migrations in background with retries so the server can bind to PORT quickly
(
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
) &

php artisan storage:link || true

# Cache for performance (non-blocking for DB)
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Serve on Railway's assigned PORT (foreground)
exec php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
