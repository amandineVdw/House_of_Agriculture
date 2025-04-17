#!/bin/bash

echo "🛠 Démarrage des services Docker..."
docker-compose up -d

echo "📦 Installation des dépendances Laravel..."
docker exec -w /var/www/html hoa-laravel-app composer install

echo "🔐 Génération de la clé Laravel..."
docker exec -w /var/www/html hoa-laravel-app php artisan key:generate

echo "📊 Migration de la base Laravel..."
docker exec -w /var/www/html hoa-laravel-app php artisan migrate --force

echo "✅ Application disponible :"
echo " - Laravel    : http://localhost:8000"
echo " - BookStack  : http://localhost:6875"
echo " - phpMyAdmin : http://localhost:8081"

#executer avec : chmod +x start.sh
