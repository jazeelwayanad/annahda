# Minimal example; adjust extensions to your app’s needs
FROM php:8.2-cli

# Install system deps and PHP extensions you need (pdo_mysql at least)
RUN apt-get update && apt-get install -y git unzip libzip-dev \
  && docker-php-ext-install pdo_mysql zip \
  && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy code and install deps
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress --optimize-autoloader

COPY . .

# Expose is optional for Railway; it uses $PORT
# EXPOSE 8000

# Run Laravel’s built-in server bound to the platform port
CMD ["sh", "-lc", "php artisan serve --host=0.0.0.0 --port=${PORT:-8000}"]
