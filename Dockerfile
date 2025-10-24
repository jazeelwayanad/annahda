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

# Install Node deps first for better caching
COPY package*.json ./
RUN npm ci

# Copy the rest of the application
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Build Vite frontend assets
RUN npm run build

# ✅ Confirm build folder
RUN echo "=== Checking built files ===" && ls -la public/build || echo "⚠️ No build folder found!"

# Expose port
EXPOSE 8080

# ✅ Serve from /public folder (static assets + Laravel routes)
# CMD php -S 0.0.0.0:${PORT:-8080} -t public public/index.php
CMD echo "=== Listing public/ folder ===" && ls -la public && echo "=== Listing public/build ===" && ls -la public/build && echo "=== Starting PHP ===" && php -S 0.0.0.0:${PORT:-8080} -t public public/index.php
