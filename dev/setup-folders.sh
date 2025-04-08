#!/bin/bash

echo "📁 Création des dossiers nécessaires avec .gitkeep..."

# Docker volumes
mkdir -p docker/bookstack
mkdir -p docker/mariadb
touch docker/bookstack/.gitkeep
touch docker/mariadb/.gitkeep

# Laravel storage & cache
mkdir -p laravel/storage/app/public
mkdir -p laravel/storage/framework/cache/data
mkdir -p laravel/storage/framework/sessions
mkdir -p laravel/storage/framework/views
mkdir -p laravel/storage/logs
mkdir -p laravel/bootstrap/cache

touch laravel/storage/app/.gitkeep
touch laravel/storage/app/public/.gitkeep
touch laravel/storage/framework/.gitkeep
touch laravel/storage/framework/cache/data/.gitkeep
touch laravel/storage/framework/sessions/.gitkeep
touch laravel/storage/framework/views/.gitkeep
touch laravel/storage/logs/.gitkeep
touch laravel/bootstrap/cache/.gitkeep

echo "✅ Tous les dossiers avec .gitkeep ont été créés avec succès !"

▶️ 2. Rends-le exécutable

chmod +x dev/setup-folders.sh