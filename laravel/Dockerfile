# Étape 1 : Utiliser une image PHP officielle avec extensions nécessaires
FROM php:8.2-fpm

# Étape 2 : Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    libcurl4-openssl-dev libpq-dev gnupg \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd

# Étape 3 : Installer Node.js + npm (via NodeSource)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Étape 4 : Installer Composer globalement
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Étape 5 : Copier le code source
WORKDIR /var/www/html
COPY . .

# Étape 6 : Installer les dépendances Laravel
RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader

# Étape 7 : Installer les dépendances frontend
RUN npm install && npm run build

# Étape 8 : Fixer les permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Étape 9 : Exposer les ports Laravel + Vite
EXPOSE 8000 5173

# Étape 10 : Lancer Laravel et Vite en parallèle
CMD ["sh", "-c", "npm run dev & php artisan serve --host=0.0.0.0 --port=8000"]