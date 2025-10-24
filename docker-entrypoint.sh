#!/bin/sh

# Wait for the database to be ready
echo "Waiting for database connection..."
until php -r "try { new PDO(getenv('DB_CONNECTION') . ':host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD')); exit(0); } catch (Exception \$e) { exit(1); }"; do
  echo "Database not ready - sleeping"
  sleep 3
done

# Run migrations and seeders
php artisan migrate --force
php artisan db:seed --force

# Start Laravel
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
