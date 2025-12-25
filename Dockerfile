FROM php:8.2-fpm

WORKDIR /var/www/html

# ---------------------------
# 1️⃣ Dépendances système
# ---------------------------
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    curl \
    gnupg \
    build-essential \
    && docker-php-ext-install \
    pdo \
    pdo_pgsql \
    zip

# ---------------------------
# 2️⃣ Installer Node.js & npm
# ---------------------------
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Vérifier l’installation
RUN node -v && npm -v

# ---------------------------
# 3️⃣ Installer Composer
# ---------------------------
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ---------------------------
# 4️⃣ Copier le code
# ---------------------------
COPY . .

# ---------------------------
# 5️⃣ Installer dépendances Laravel + front
# ---------------------------
RUN composer install --no-dev --optimize-autoloader
RUN npm install
RUN npm run build  # ou npm run dev selon ton workflow

# ---------------------------
# 6️⃣ Permissions Laravel
# ---------------------------
RUN chmod -R 775 storage bootstrap/cache

# ---------------------------
# 7️⃣ Port Render
# ---------------------------
EXPOSE 10000

# ---------------------------
# 8️⃣ Commande de démarrage
# ---------------------------
CMD php artisan migrate --force && \
    php artisan storage:link || true && \
    php artisan serve --host=0.0.0.0 --port=10000
