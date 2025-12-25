FROM php:8.2-fpm

WORKDIR /var/www/html

# Dépendances système
RUN apt-get update && apt-get install -y \
    nginx git unzip libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Copier le code
COPY . .

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/bin --filename=composer

RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chmod -R 775 storage bootstrap/cache

# Config Nginx
COPY nginx.conf /etc/nginx/nginx.conf

EXPOSE 10000

CMD service nginx start && php-fpm
