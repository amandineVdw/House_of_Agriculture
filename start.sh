#!/bin/bash

echo "📦 Démarrage des services Docker..."
docker-compose up --build -d

echo "🔐 Génération de la clé Laravel..."
docker exec -it hoa-laravel-app php artisan key:generate

echo "📊 Migration de la base de données..."
docker exec -it hoa-laravel-app php artisan migrate

echo "✅ Plateforme disponible :"
echo " - Laravel : http://localhost:8000"
echo " - BookStack : http://localhost:6875"

#executer avec : chmod +x start.sh
