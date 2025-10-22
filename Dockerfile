# 1) PHP deps stage: install extensions and Composer deps (vendor/)
FROM php:8.3-fpm AS deps

# System packages (incl. PostgreSQL)
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip curl git \
    libzip-dev libicu-dev libpq-dev \
  && rm -rf /var/lib/apt/lists/*

# PHP extensions (PostgreSQL instead of MySQL)
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd zip intl

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy only composer files first for better caching
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress --optimize-autoloader

# Copy the rest of the app (after vendor is ready)
COPY . .

# 2) Assets stage: build Vite/Tailwind with vendor present (Filament preset)
FROM node:20-alpine AS assets
WORKDIR /app

# Install node deps
COPY package*.json ./
RUN npm ci

# Copy config, sources, and vendor (for Tailwind preset)
COPY vite.config.js tailwind.config.js postcss.config.js ./
COPY resources ./resources
COPY --from=deps /var/www/html/vendor ./vendor

# Build assets
RUN npm run build

# 3) Final runtime image
FROM php:8.3-fpm

# System packages and PHP extensions (same as deps)
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip curl git \
    libzip-dev libicu-dev libpq-dev \
  && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd zip intl

# Composer (optional at runtime, but handy for artisan tasks)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy application source
COPY . .

# Bring in vendor and built assets
COPY --from=deps /var/www/html/vendor ./vendor
COPY --from=assets /app/public/build ./public/build

# Permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose and start
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
