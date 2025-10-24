# Use official PHP image
FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip zip \
    libpng-dev libonig-dev libxml2-dev libzip-dev libsodium-dev libicu-dev \
    libpq-dev default-mysql-client libfreetype6-dev libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd zip sodium fileinfo

# Install Node.js (for Vite build)
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash && \
    apt-get update && apt-get install -y nodejs 

# Copy composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Install Node deps first for better layer caching
COPY package*.json ./
RUN npm ci

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# ✅ Build Vite assets (this was missing)
RUN npm run build

# 👀 Debug: Show what got built (just for confirmation)
RUN echo "=== Checking built files ===" && ls -la public/build || echo "⚠️ No build folder found!"

# Expose port
EXPOSE 8080

# Start Laravel app
CMD php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
