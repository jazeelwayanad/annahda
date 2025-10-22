# Build frontend assets
FROM node:20-alpine AS assets
WORKDIR /app
COPY package*.json ./
COPY vite.config.js tailwind.config.js postcss.config.js ./
COPY resources ./resources
RUN npm ci && npm run build

# PHP runtime
FROM php:8.3-fpm

# System deps (incl. PostgreSQL)
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip curl git \
    libzip-dev libicu-dev libpq-dev \
  && rm -rf /var/lib/apt/lists/*

# PHP extensions (PostgreSQL instead of MySQL)
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd zip intl

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# App
WORKDIR /var/www/html
COPY . .

# Install PHP deps (production)
RUN composer install --no-dev --prefer-dist --optimize-autoloader

# Copy built assets
COPY --from=assets /app/public/build /var/www/html/public/build

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Serve Laravel (Render will route to this port)
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
