# Use official PHP image
FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip zip \
    libpng-dev libonig-dev libxml2-dev libzip-dev libsodium-dev libicu-dev \
    libpq-dev default-mysql-client libfreetype6-dev libjpeg62-turbo-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd zip sodium fileinfo \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Node.js 18
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash && \
    apt-get update && apt-get install -y nodejs && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy dependency files first (better caching)
COPY composer.json composer.lock* ./
COPY package.json package-lock.json* ./

# Install dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev --no-scripts
RUN npm install

# Copy application code (including your .env with APP_KEY already set)
COPY . .

# Build Vite assets (doesn't need database)
RUN npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Verify build output
RUN ls -la public/build || echo "⚠️ Build folder not found!"

# Expose port
EXPOSE 8080

# Start server (Laravel will use your existing .env)
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8080}