# HOA Platform – Starter Kit 📚🎥

Plateforme de formation en ligne participative basée sur Laravel + BookStack.

Ce projet fournit un environnement de développement complet via Docker pour :
- Développer un frontend dynamique avec Laravel, Livewire & Bootstrap
- Gérer du contenu collaboratif (fiches pratiques) via BookStack
- Superviser facilement la base de données via phpMyAdmin

---

## 📦 Technologies utilisées

| Stack            | Description                          |
|------------------|--------------------------------------|
| Laravel 12       | Backend principal, API, Auth, Livewire |
| Jetstream (Bootstrap) | Authentification, dashboard, gestion profil |
| MariaDB          | Base de données relationnelle        |
| BookStack        | Wiki/fiches collaboratives           |
| Docker Compose   | Orchestration des services           |
| phpMyAdmin       | Interface web pour gérer les bases   |

---

# HOA Platform – Starter Kit

Plateforme de cours en ligne avec Laravel + BookStack, orchestrée via Docker.

---

## 🚀 Démarrage rapide

```bash
git clone git@github.com:JuanAndresImb/House_of_Agriculture.git
cd hoa-platform
cp laravel/.env.example laravel/.env
./start.sh
```

> Le script démarre les services, génère la clé Laravel et lance les migrations.

---

## 🌐 Accès aux services

| Service      | URL                    | Accès par défaut                  |
|--------------|------------------------|-----------------------------------|
| Laravel      | http://localhost:8000  | `/register`                       |
| BookStack    | http://localhost:6875  | `admin@admin.com` / `password`    |
| phpMyAdmin   | http://localhost:8081  | `root` / `root` – hôte : `mariadb`|

---

## 🧰 Commandes utiles

Ajoutez à votre terminal (`.zshrc`, `.bashrc`) :

```bash
alias art="docker exec -it hoa-laravel-app php artisan"
```

Quelques raccourcis :

```bash
art migrate
art make:model Nom
art route:list
```

---

## 📁 Structure

```
hoa-platform/
├── laravel/             # Laravel avec Jetstream (Bootstrap)
├── docker-compose.yml   # Docker services
├── start.sh             # Script de démarrage
└── README.md
```

---

## 🐞 Problèmes fréquents

- **Laravel :** `Unknown database 'laravel'`  
  → Créez-la dans phpMyAdmin (`utf8mb4`)

- **BookStack :** Erreur 500  
  → Vérifiez `APP_KEY` dans `docker-compose.yml`

---

## 🤝 Contribution

- Fork → Branche `feature/` → PR vers `develop`

---

## 📄 Licence

MIT © 2025 – Équipe HOA
