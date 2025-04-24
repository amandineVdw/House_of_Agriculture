Voici une version mieux structurée du fichier **README.md** pour votre projet avec les changements et détails sur les sauvegardes Docker, les commandes et l'intégration du script PowerShell :

```markdown
# House of Agriculture - Backup and Docker Management

Ce projet inclut des scripts pour effectuer des sauvegardes des images Docker et gérer les containers via `Makefile` et `PowerShell`. Ce fichier README vous guidera pour comprendre et utiliser les commandes disponibles.

## Prérequis

Avant d'utiliser ces outils, assurez-vous que vous avez installé les éléments suivants sur votre machine :

- **Docker** : Pour construire et gérer les containers.
- **Make** : Pour gérer les tâches automatisées via le `Makefile`.
- **PowerShell** : Utilisé pour exécuter les scripts sous Windows.

---

## Structure du Projet

La structure du projet inclut des fichiers Docker, des images et des scripts pour gérer les sauvegardes. Voici les répertoires et fichiers principaux :

```

/House_of_Agriculture
├── backups/                  # Répertoire pour les sauvegardes Docker
├── docker/                    # Fichiers Docker (docker-compose.yml, etc.)
├── scripts/                   # Scripts PowerShell pour les backups
│   └── backup-docker-app.ps1  # Script PowerShell pour effectuer un backup de l'application
├── Makefile                   # Fichier Makefile pour gérer les tâches Docker
└── README.md                  # Ce fichier

```

---

## Commandes disponibles dans le `Makefile`

### 1. **Backup des images Docker**

Les commandes suivantes sont utilisées pour sauvegarder les images Docker spécifiques du projet.

#### Sauvegarde de l'image principale `House of Agriculture` :

```bash
make backup-house_of_agriculture
```

Cela sauvegardera l'image Docker de l'application principale dans le répertoire `backups` sous le nom `backup-house_of_agriculture-YYYYMMDD-HHMM.tar`.

#### Sauvegarde de l'image Laravel :

```bash
make backup-laravel
```

Cela sauvegardera l'image Docker Laravel dans le répertoire `backups` sous le nom `backup-laravel-app-YYYYMMDD-HHMM.tar`.

#### Sauvegarde de l'image BookStack :

```bash
make backup-bookstack
```

Cela sauvegardera l'image Docker BookStack dans le répertoire `backups` sous le nom `backup-bookstack-app-YYYYMMDD-HHMM.tar`.

### 2. **Nettoyage des anciens backups**

Cette commande supprime les sauvegardes anciennes pour garder uniquement les **5 dernières sauvegardes** pour chaque image Docker. Vous pouvez ajuster cette valeur en modifiant la variable `MAX_BACKUPS` dans le `Makefile`.

```bash
make prune_backups
```

### 3. **Commandes Docker**

#### Démarrage des containers :

```bash
make start
```

Démarre les containers en arrière-plan à l'aide de `docker-compose`.

#### Arrêt des containers :

```bash
make stop
```

Arrête les containers en cours d'exécution.

#### Nettoyage des systèmes Docker :

```bash
make clean
```

Prune tous les éléments inutilisés par Docker (images, volumes, réseaux).

#### Arrêt des containers avec sauvegarde préalable :

```bash
make down
```

Arrête les containers et effectue des sauvegardes des images Docker avant l'arrêt.

---

## Fonctionnement des Sauvegardes

Lors de chaque sauvegarde, un fichier `.tar` est créé dans le répertoire `backups/`. Si le répertoire `backups` n'existe pas, il sera automatiquement créé grâce à la commande intégrée dans le `Makefile`. Par défaut, **seulement 5 sauvegardes récentes** sont conservées, et les plus anciennes sont supprimées.

### Exemple de fichier de sauvegarde

Après exécution de la commande `make backup-house_of_agriculture`, un fichier de type `backup-house_of_agriculture-20250425-1500.tar` sera créé.

---

## Scripts PowerShell

Le script PowerShell `backup-docker-app.ps1` est responsable de la sauvegarde des images Docker. Ce script est automatiquement exécuté lors des commandes de sauvegarde dans le `Makefile`, mais vous pouvez aussi l'exécuter manuellement.

### Fonctionnement du script PowerShell

Le script `backup-docker-app.ps1` permet de sauvegarder plusieurs images Docker du projet. Il fonctionne de la manière suivante :

1. **Définition des Variables** : Le script commence par définir les variables nécessaires comme le nom du projet (`PROJECT_NAME`), le répertoire des sauvegardes (`BACKUP_DIR`), et les images Docker à sauvegarder.
2. **Sauvegarde des Images Docker** : Le script sauvegarde l'image Docker de l'application principale, de Laravel et de BookStack, en générant un fichier `.tar` dans le répertoire `backups/`.
3. **Exécution de la Sauvegarde** : Chaque commande de sauvegarde est accompagnée d'un message indiquant l'état de la sauvegarde (réussie ou échouée).

### Commande pour exécuter le script PowerShell

Vous pouvez exécuter le script de sauvegarde manuellement à partir de PowerShell avec la commande suivante :

```bash
powershell -ExecutionPolicy Bypass -File scripts/backup-docker-app.ps1
```

Cela exécutera le script pour toutes les images définies dans le script.

---

## Conclusion

Ce système de gestion des sauvegardes vous permet de gérer facilement les images Docker et de garder une trace de vos versions tout en automatisant les tâches courantes via `Makefile` et PowerShell.

N'hésitez pas à modifier les paramètres dans le `Makefile` pour personnaliser davantage vos processus de sauvegarde et de nettoyage.

---

## Points Clés

* **Sauvegardes Automatisées** : Le `Makefile` gère automatiquement les sauvegardes des images Docker et le nettoyage des anciennes.
* **Flexibilité** : Le script PowerShell peut être exécuté manuellement ou via les commandes du `Makefile`.
* **Répertoire de sauvegarde** : Le répertoire `backups/` est créé automatiquement si nécessaire.

```

### Améliorations effectuées :
1. **Structuration claire** avec des sections bien définies : "Prérequis", "Structure du Projet", "Commandes disponibles dans le Makefile", "Fonctionnement des Sauvegardes", "Scripts PowerShell", "Conclusion", etc.
2. **Ajout de la section "Points Clés"** pour résumer les fonctionnalités et les points essentiels du système.
3. **Explications détaillées** sur le script PowerShell et son utilisation manuelle.

Cette version est plus lisible et facile à suivre, tout en fournissant une vue d'ensemble complète du projet. Si vous avez d'autres demandes, n'hésitez pas !
```
