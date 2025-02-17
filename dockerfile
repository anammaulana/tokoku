# Gunakan image resmi PHP 8.1 dengan Apache
FROM php:8.2-apache

# Set timezone ke UTC agar sesuai dengan konfigurasi Laravel
ENV TZ=UTC

# Install paket yang dibutuhkan
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip unzip git curl libonig-dev \
    supervisor \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql opcache \
    && docker-php-ext-enable opcache

# Aktifkan mod_rewrite untuk Apache (agar Laravel dapat menggunakan route)
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy semua file Laravel ke dalam container
COPY . .

# Set permission folder storage dan bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Install dependensi Laravel (pastikan `composer.json` dan `composer.lock` ada)
RUN composer install --no-dev --optimize-autoloader

# Konfigurasi Apache (opsional, jika ingin menggunakan file custom)
COPY ./docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Konfigurasi OPCache untuk meningkatkan kinerja Laravel
#COPY ./docker/php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# Jalankan supervisord untuk memastikan queue Laravel berjalan
COPY ./docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Restart Apache ketika container berjalan
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
