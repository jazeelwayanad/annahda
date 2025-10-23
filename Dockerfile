# Build with PHP 8.3 and required extensions
FROM php:8.3-cli

# System packages + PHP extensions (pdo_mysql, zip, intl)
RUN apt-get update \
  && apt-get install -y --no-install-recommends \
     git unzip libzip-dev libicu-dev \
  && docker-php-ext-install pdo_mysql zip intl \
  && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Install PHP deps using Composer with best caching
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress --optimize-autoloader

# Copy the rest of the app
COPY . .

# Run the Laravel dev server binding to platform port
# If you are not using start.sh, make sure DB_* env vars are set in Railway.
CMD ["sh","-lc","php artisan serve --host=0.0.0.0 --port=${PORT:-8000}"]
