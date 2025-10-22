# 1) Dependencies stage: install PHP extensions and Composer deps (without scripts)
FROM php:8.3-fpm AS deps

# System packages (incl. PostgreSQL client libs)
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip curl git \
    libzip-dev libicu-dev libpq-dev \
  && rm -rf /var/lib/apt/lists/*

# PHP extensions (PostgreSQL)
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd zip intl

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy only composer files for best cache use and install WITHOUT scripts
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress --no-scripts

# 2) Assets stage: build Vite/Tailwind with vendor present (Filament preset needs it)
FROM node:20-alpine AS assets
WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY vite.config.js tailwind.config.js postcss.config.js ./
COPY resources ./resources
# Bring in PHP vendor so Tailwind can resolve vendor/filament preset
COPY --from=deps /var/www/html/vendor ./vendor

RUN npm run build

# 3) Final runtime image
FROM php:8.3-fpm

# System packages + PHP extensions (same as deps)
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip curl git \
    libzip-dev libicu-dev libpq-dev \
  && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd zip intl

# Composer (optional but useful for artisan tasks)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy application source
COPY . .

# Use vendor from deps (already installed without scripts)
COPY --from=deps /var/www/html/vendor ./vendor

# Copy built assets
COPY --from=assets /app/public/build ./public/build

# Laravel permissions
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
