# 🚀 Guide de démarrage – HOA Platform

Bienvenue ! Voici comment lancer le projet HOA Platform sur ta machine.

---

## ✅ Prérequis

- [ ] Docker & Docker Compose installés : https://docs.docker.com/get-docker/
- [ ] Git installé
- [ ] (Facultatif) Composer et Node.js si tu veux lancer Laravel sans Docker

---

## 🔧 Étapes d'installation

1. **Cloner le projet**

```bash
git clone https://github.com/ton-user/hoa-platform.git
cd hoa-platform
```

2. **Créer le fichier d'environnement Laravel**

```bash
cp laravel/.env.example laravel/.env
```

3. **Lancer l’environnement complet**

```bash
./start.sh
```

Ce script va :
- Lancer Docker
- Générer la clé Laravel
- Appliquer les migrations

---

## 🌐 Accès aux services

| Service      | URL                    | Identifiants par défaut              |
|--------------|------------------------|--------------------------------------|
| Laravel      | http://localhost:8000  | À créer via `/register`             |
| BookStack    | http://localhost:6875  | admin@admin.com / password          |
| phpMyAdmin   | http://localhost:8081  | root / root – hôte `mariadb`        |

---

## 🧰 Raccourcis utiles (alias)

Ajoute ça dans ton terminal :

```bash
alias art="docker exec -it hoa-laravel-app php artisan"
```

Exemples :

```bash
art migrate
art make:model Formation
```

---

## 🐛 Problèmes fréquents

### Laravel : `Unknown database 'laravel'`
→ Ouvre phpMyAdmin et crée la base manuellement (`utf8mb4`)

### BookStack : Erreur 500
→ Vérifie que `APP_KEY` est bien présent dans `docker-compose.yml`

---
## Si besoin après un git pull, relance ces commandes :

cd laravel
composer install        # remet à jour les dépendances PHP
npm install             # remet à jour les dépendances JS
npm run dev             # compile les assets frontend (si Vite est utilisé)
php artisan migrate     # applique les migrations si le backend a évolué

## 📬 Besoin d'aide ?

- Contacte le référent : Juan I. – `j.imbaquingo@outlook.fr`
- Ou crée une Issue GitHub
