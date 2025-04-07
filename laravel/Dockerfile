# Étape 1 : Utiliser une image PHP officielle avec extensions nécessaires
FROM php:8.2-fpm

# Étape 2 : Installer les dépendances système (extensions PHP + tools utiles)
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    libcurl4-openssl-dev libpq-dev libmcrypt-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd

# Étape 3 : Installer Composer globalement
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Étape 4 : Copier le code source Laravel dans le conteneur
WORKDIR /var/www/html
COPY . .

# Étape 5 : Installer les dépendances Laravel via Composer
RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader

# Étape 6 : Fixer les permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Étape 7 : Exposer le port utilisé par `php artisan serve`
EXPOSE 8000

# Étape 8 : Démarrage du serveur Laravel intégré (utile en dev local)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
