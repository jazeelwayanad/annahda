#!/usr/bin/env sh
set -e

# Create .env on first boot if not present
if [ ! -f .env ] && [ -f .env.example ]; then
  cp .env.example .env
fi

# Prefer Railway's injected MySQL env; otherwise respect DB_* if provided in Railway.
if [ -n "${MYSQLHOST}" ]; then
  export DB_CONNECTION="mysql"
  export DB_HOST="${MYSQLHOST}"
  export DB_PORT="${MYSQLPORT:-3306}"
  export DB_DATABASE="${MYSQLDATABASE}"
  export DB_USERNAME="${MYSQLUSER}"
  export DB_PASSWORD="${MYSQLPASSWORD}"
elif [ -n "${DB_HOST}" ] && { [ -z "${DB_CONNECTION}" ] || [ "${DB_CONNECTION}" = "sqlite" ]; }; then
  export DB_CONNECTION="mysql"
fi

# Only handle sqlite if explicitly selected
if [ "${DB_CONNECTION}" = "sqlite" ]; then
  DB_PATH="${DB_DATABASE:-/var/www/html/database/database.sqlite}"
  export DB_DATABASE="${DB_PATH}"
  mkdir -p "$(dirname "$DB_PATH")"
  [ -f "$DB_PATH" ] || touch "$DB_PATH"
  echo "Using SQLite at ${DB_DATABASE}"
fi

# Log effective settings
echo "PORT=${PORT}"
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

# Optionally wait a bit for DB TCP reachability (won't block server start)
if [ "${DB_CONNECTION}" = "mysql" ] && [ -n "${DB_HOST}" ]; then
  (
    echo "Background: probing MySQL at ${DB_HOST}:${DB_PORT:-3306} ..."
    php -r '
      $h=getenv("DB_HOST"); $p=(int)(getenv("DB_PORT")?:3306);
      for ($i=0; $i<30; $i++) {
        $f=@fsockopen($h,$p,$e,$s,2);
        if ($f) { fclose($f); echo "MySQL reachable\n"; exit(0); }
        echo "retry...\n"; sleep(1);
      }
      echo "MySQL still unreachable after 30s\n";
    ' || true
  ) &
fi

# Start migrations in background with retries so server can bind to PORT quickly
(
  max=30
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
