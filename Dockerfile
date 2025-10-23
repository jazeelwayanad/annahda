# 1) Dependencies stage: install PHP extensions and Composer deps (without scripts)
FROM php:8.3-fpm AS deps

# System packages (GD, ICU, Zip, etc.)
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    libonig-dev libxml2-dev zip unzip curl git \
    libzip-dev libicu-dev \
  && rm -rf /var/lib/apt/lists/*

# PHP extensions (MySQL + GD configured with JPEG/Freetype)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd pdo_mysql mbstring exif pcntl bcmath zip intl

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy only composer files for best cache usage and install WITHOUT scripts
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress --no-scripts

# 2) Assets stage: build Vite/Tailwind with vendor present
FROM node:20-alpine AS assets
WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY vite.config.js tailwind.config.js postcss.config.js ./
COPY resources ./resources
# Bring in PHP vendor so Tailwind/Filament presets resolve
COPY --from=deps /var/www/html/vendor ./vendor

RUN npm run build

# 3) Final runtime image
FROM php:8.3-fpm

# System packages + PHP extensions (same as deps)
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    libonig-dev libxml2-dev zip unzip curl git \
    libzip-dev libicu-dev \
  && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd pdo_mysql mbstring exif pcntl bcmath zip intl

# Composer (handy for artisan tasks at runtime)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy application source
COPY . .

# Use vendor from deps (already installed without scripts)
COPY --from=deps /var/www/html/vendor ./vendor

# Copy built assets
COPY --from=assets /app/public/build ./public/build

# Startup script
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Laravel permissions
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000
# Run pre-start tasks and bind to Railway's PORT
CMD ["bash", "/start.sh"]
