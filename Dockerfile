# 1. Image de base pour PHP-FPM
# Utiliser une image Alpine légère avec PHP 8.x FPM (ajustez la version)
FROM php:8.3-fpm-alpine

# 2. Définir le répertoire de travail
WORKDIR /var/www/html

# 3. Installer les dépendances système nécessaires
RUN apk update && apk add \
    nginx \
    supervisor \
    make \
    git \
    curl \
    unzip \
    libzip-dev \
    # ... ajoutez d'autres paquets si nécessaire (par ex. pour GD, MySQLi, etc.)

# 4. Installer les extensions PHP
RUN docker-php-ext-install pdo pdo_mysql opcache zip

# 5. Copier les fichiers de configuration (créés à l'étape 2.3)
COPY ./docker/nginx.conf /etc/nginx/http.d/default.conf
COPY ./docker/supervisord.conf /etc/supervisord.conf
COPY ./docker/php.ini /usr/local/etc/php/conf.d/40-custom.ini

# 6. Copier le code de l'application
# Nous copions d'abord composer.json et composer.lock pour profiter du cache Docker
COPY composer.json composer.lock ./

# 7. Installer Composer et les dépendances (en tant que couche séparée)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --prefer-dist --optimize-autoloader

# 8. Copier le reste de l'application
COPY . .

# 9. Ajuster les permissions (important pour PHP-FPM et les logs/cache)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 10. Exposer le port par défaut de Nginx
EXPOSE 8080

# ...
COPY deploy.sh /usr/local/bin/deploy
RUN chmod +x /usr/local/bin/deploy
# ...
# 11. Définir la commande de démarrage (utilise supervisord pour Nginx et FPM)
CMD ["/usr/local/bin/deploy"]