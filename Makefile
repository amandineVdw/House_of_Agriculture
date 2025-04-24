# AVDW 23/04/25

# ==========================
# 🔧 Variables
# ==========================
PROJECT_NAME=house_of_agriculture-app            # Nom du projet
BACKUP_DIR=backups                               # Dossier de sauvegarde
MAX_BACKUPS=5                                    # Nombre max de backups à conserver
DATE=$(shell date +%Y%m%d-%H%M)                  # Date/heure formatée pour les noms de fichiers

# Noms des images Docker utilisées
IMAGE_HOUSE_OF_AGRICULTURE=house_of_agriculture-app:latest
IMAGE_LARAVEL=hoa-laravel-app:latest
IMAGE_BOOKSTACK=hoa-platform-member-bookstack:latest

# Couleurs ANSI pour rendre l'affichage plus lisible
GREEN=\033[0;32m
YELLOW=\033[1;33m
RED=\033[0;31m
BLUE=\033[1;34m
NC=\033[0m  # Reset couleur terminal

# ==========================
# 💾 Sauvegardes des images Docker
# ==========================

# Vérifie si l'image House of Agriculture est valide
check-image-house_of_agriculture:
	@echo "$(BLUE)Vérification de l'intégrité de l'image $(IMAGE_HOUSE_OF_AGRICULTURE)...$(NC)"
	docker run --rm $(IMAGE_HOUSE_OF_AGRICULTURE) echo "Image House of Agriculture OK"

# Sauvegarde de l'image House of Agriculture
backup-house_of_agriculture: check-image-house_of_agriculture
	@test -d $(BACKUP_DIR) || mkdir -p $(BACKUP_DIR)
	@echo "$(YELLOW)💾 Sauvegarde de l'image House of Agriculture → backup-house_of_agriculture-$(DATE).tar$(NC)"
	docker image save $(IMAGE_HOUSE_OF_AGRICULTURE) -o $(BACKUP_DIR)/backup-house_of_agriculture-$(DATE).tar
	@echo "$(GREEN)✅ Image House of Agriculture sauvegardée$(NC)"

# Vérifie si l'image Laravel est valide
check-image-laravel:
	@echo "$(BLUE)Vérification de l'intégrité de l'image $(IMAGE_LARAVEL)...$(NC)"
	docker run --rm $(IMAGE_LARAVEL) echo "Image Laravel OK"

# Sauvegarde de l'image Laravel
backup-laravel: check-image-laravel
	@test -d $(BACKUP_DIR) || mkdir -p $(BACKUP_DIR)
	@echo "$(YELLOW)💾 Sauvegarde de l'image Laravel → backup-laravel-app-$(DATE).tar$(NC)"
	docker image save $(IMAGE_LARAVEL) -o $(BACKUP_DIR)/backup-laravel-app-$(DATE).tar
	@echo "$(GREEN)✅ Image Laravel sauvegardée$(NC)"

# Vérifie si l'image BookStack est valide
check-image-bookstack:
	@echo "$(BLUE)Vérification de l'intégrité de l'image $(IMAGE_BOOKSTACK)...$(NC)"
	docker run --rm $(IMAGE_BOOKSTACK) echo "Image BookStack OK"

# Sauvegarde de l'image BookStack
backup-bookstack: check-image-bookstack
	@test -d $(BACKUP_DIR) || mkdir -p $(BACKUP_DIR)
	@echo "$(YELLOW)💾 Sauvegarde de l'image BookStack → backup-bookstack-app-$(DATE).tar$(NC)"
	docker image save $(IMAGE_BOOKSTACK) -o $(BACKUP_DIR)/backup-bookstack-app-$(DATE).tar
	@echo "$(GREEN)✅ Image BookStack sauvegardée$(NC)"

# Sauvegarde globale de toutes les images
backup-all: backup-house_of_agriculture backup-laravel backup-bookstack

# Suppression des anciens backups (garde les X derniers)
prune_backups:
	powershell -Command "Get-ChildItem $(BACKUP_DIR)/backup-house_of_agriculture-*.tar | Sort-Object LastWriteTime -Descending | Select-Object -Skip $(MAX_BACKUPS) | Remove-Item"
	powershell -Command "Get-ChildItem $(BACKUP_DIR)/backup-laravel-app-*.tar | Sort-Object LastWriteTime -Descending | Select-Object -Skip $(MAX_BACKUPS) | Remove-Item"
	powershell -Command "Get-ChildItem $(BACKUP_DIR)/backup-bookstack-app-*.tar | Sort-Object LastWriteTime -Descending | Select-Object -Skip $(MAX_BACKUPS) | Remove-Item"

# ==========================
# 📦 Infos sur les sauvegardes
# ==========================

# Affiche les tailles des fichiers de sauvegarde
show-backup-sizes:
	powershell -Command "Get-ChildItem $(BACKUP_DIR)/*.tar | Sort-Object LastWriteTime -Descending | Select-Object Name, @{Name='Size(MB)';Expression={\"{0:N2}\" -f ($_.Length / 1MB)}}"

# Exécute un script PowerShell externe
backup-script:
	powershell -ExecutionPolicy Bypass -File ./scripts/backup.ps1

# ==========================
# 🛡️ Sauvegarde & Restauration BDD Laravel
# ==========================

# Sauvegarde de la base de données Laravel via un conteneur temporaire
backup-db:
	@test -d $(BACKUP_DIR) || mkdir -p $(BACKUP_DIR)
	@echo "$(YELLOW)💾 Sauvegarde de la base de données Laravel...$(NC)"
	docker run --rm \
		--network=host \
		-v $(shell pwd)/$(BACKUP_DIR):/backups \
		mariadb:10.5 \
		sh -c 'exec mysqldump -h127.0.0.1 -uroot -proot laravel > /backups/backup-laravel-db-$(DATE).sql'
	@echo "$(GREEN)✅ Base de données Laravel sauvegardée$(NC)"

# Restaure la dernière sauvegarde SQL ou un fichier donné
restore-db FILE?=last:
	@echo "$(YELLOW)♻️ Restauration de la base de données Laravel...$(NC)"
	@if [ "$(FILE)" = "last" ]; then \
		FILE=$$(ls -t $(BACKUP_DIR)/backup-laravel-db-*.sql | head -n 1); \
	fi; \
	echo "Fichier restauré: $$FILE"; \
	type $$FILE | docker exec -i mariadb sh -c 'mysql -u root -p"root" laravel'
	@echo "$(GREEN)✅ Restauration terminée$(NC)"

# ==========================
# 🚀 Commandes Docker
# ==========================

# Démarre tous les conteneurs Docker
start:
	@echo "$(BLUE)🚀 Démarrage des conteneurs Docker...$(NC)"
	docker compose -f docker-compose.yml up -d
	@$(MAKE) composer-dump
	@echo "$(GREEN)✅ Conteneurs démarrés + autoload régénéré$(NC)"

# Stoppe tous les conteneurs Docker
stop:
	@echo "$(BLUE)🛑 Arrêt des conteneurs Docker...$(NC)"
	docker compose -f docker-compose.yml down
	@echo "$(GREEN)✅ Conteneurs arrêtés$(NC)"

# Sauvegarde + arrêt + suppression des conteneurs
down:
	@$(MAKE) backup-db
	@$(MAKE) backup-house_of_agriculture
	@$(MAKE) backup-laravel
	@$(MAKE) backup-bookstack
	@echo "$(RED)🛑 Arrêt + suppression des conteneurs...$(NC)"
	docker compose down
	@echo "$(GREEN)✅ Tout a été stoppé et sauvegardé$(NC)"

# Rebuild toutes les images Docker à partir du Dockerfile
build:
	@echo "$(BLUE)🔧 Construction des images Docker...$(NC)"
	docker compose -f docker-compose.yml build
	@echo "$(GREEN)✅ Images Docker construites avec succès !$(NC)"

# ==========================
# 🧹 Nettoyage Docker
# ==========================

# Affiche la consommation d'espace disque par Docker
docker-df:
	@echo "$(BLUE)📊 Affichage de l'utilisation disque Docker...$(NC)"
	docker system df

# Supprime tous les objets inutilisés (images, volumes, conteneurs arrêtés, etc.)
docker-prune:
	@echo "$(RED)⚠️ Cette commande va supprimer tous les éléments inutilisés de Docker$(NC)"
	@set /p confirm="$(YELLOW)Es-tu sûr de vouloir continuer ? (y/n): $(NC)" && if /i not $$confirm==y exit 1
	docker system prune

# ==========================
# 🎼 Composer
# ==========================

# Regénérer les fichiers d'autoload (utile après ajout de classes manuelles dans Laravel)
composer-dump:
	@echo "$(BLUE)🔁 Regénération de l'autoload Composer...$(NC)"
	docker exec hoa-laravel-app composer dump-autoload
	@echo "$(GREEN)✅ Autoload Composer régénéré avec succès$(NC)"
