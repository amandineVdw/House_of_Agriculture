# AVDW 23/04/25

# ==========================
# 🔧 Variables
# ==========================
PROJECT_NAME=house_of_agriculture-app
BACKUP_DIR=backups
MAX_BACKUPS=5
DATE=$(shell date +%Y%m%d-%H%M)

# Nom des images
IMAGE_HOUSE_OF_AGRICULTURE=house_of_agriculture-app:latest
IMAGE_LARAVEL=hoa-laravel-app:latest
IMAGE_BOOKSTACK=hoa-platform-member-bookstack:latest

# Couleurs (séquences ANSI pour jolis messages)
GREEN=\033[0;32m
YELLOW=\033[1;33m
RED=\033[0;31m
BLUE=\033[1;34m
NC=\033[0m  # No Color (reset)

# ==========================
# 💾 Sauvegardes
# ==========================

# Vérification de l'intégrité de l'image House of Agriculture
check-image-house_of_agriculture:
	@echo "$(BLUE)Vérification de l'intégrité de l'image $(IMAGE_HOUSE_OF_AGRICULTURE)...$(NC)"
	docker run --rm $(IMAGE_HOUSE_OF_AGRICULTURE) echo "Image House of Agriculture OK"
	@if [ $$? -ne 0 ]; then echo "$(RED)⚠️ L'image House of Agriculture est corrompue !$(NC)"; exit 1; fi

# Sauvegarde de l'image House of Agriculture
backup-house_of_agriculture: check-image-house_of_agriculture
	@if not exist $(BACKUP_DIR) mkdir $(BACKUP_DIR)
	@echo "$(YELLOW)💾 Sauvegarde de l'image House of Agriculture → backup-house_of_agriculture-$(DATE).tar$(NC)"
	docker image save $(IMAGE_HOUSE_OF_AGRICULTURE) -o $(BACKUP_DIR)/backup-house_of_agriculture-$(DATE).tar
	@echo "$(GREEN)✅ Image House of Agriculture sauvegardée dans $(BACKUP_DIR)/$(NC)"

# Vérification de l'intégrité de l'image Laravel
check-image-laravel:
	@echo "$(BLUE)Vérification de l'intégrité de l'image $(IMAGE_LARAVEL)...$(NC)"
	docker run --rm $(IMAGE_LARAVEL) echo "Image Laravel OK"
	@if [ $$? -ne 0 ]; then echo "$(RED)⚠️ L'image Laravel est corrompue !$(NC)"; exit 1; fi

# Sauvegarde de Laravel
backup-laravel: check-image-laravel
	@if not exist $(BACKUP_DIR) mkdir $(BACKUP_DIR)
	@echo "$(YELLOW)💾 Sauvegarde de l'image Laravel → backup-laravel-app-$(DATE).tar$(NC)"
	docker image save $(IMAGE_LARAVEL) -o $(BACKUP_DIR)/backup-laravel-app-$(DATE).tar
	@echo "$(GREEN)✅ Image Laravel sauvegardée dans $(BACKUP_DIR)/$(NC)"

# Vérification de l'intégrité de l'image BookStack
check-image-bookstack:
	@echo "$(BLUE)Vérification de l'intégrité de l'image $(IMAGE_BOOKSTACK)...$(NC)"
	docker run --rm $(IMAGE_BOOKSTACK) echo "Image BookStack OK"
	@if [ $$? -ne 0 ]; then echo "$(RED)⚠️ L'image BookStack est corrompue !$(NC)"; exit 1; fi

# Sauvegarde de BookStack
backup-bookstack: check-image-bookstack
	@if not exist $(BACKUP_DIR) mkdir $(BACKUP_DIR)
	@echo "$(YELLOW)💾 Sauvegarde de l'image BookStack → backup-bookstack-app-$(DATE).tar$(NC)"
	docker image save $(IMAGE_BOOKSTACK) -o $(BACKUP_DIR)/backup-bookstack-app-$(DATE).tar
	@echo "$(GREEN)✅ Image BookStack sauvegardée dans $(BACKUP_DIR)/$(NC)"

# Sauvegarde globale
backup-all: backup-house_of_agriculture backup-laravel backup-bookstack

# Nettoyage des anciens backups
prune_backups:
	powershell -Command "Get-ChildItem $(BACKUP_DIR)/backup-house_of_agriculture-*.tar | Sort-Object LastWriteTime -Descending | Select-Object -Skip $(MAX_BACKUPS) | Remove-Item"
	powershell -Command "Get-ChildItem $(BACKUP_DIR)/backup-laravel-app-*.tar | Sort-Object LastWriteTime -Descending | Select-Object -Skip $(MAX_BACKUPS) | Remove-Item"
	powershell -Command "Get-ChildItem $(BACKUP_DIR)/backup-bookstack-app-*.tar | Sort-Object LastWriteTime -Descending | Select-Object -Skip $(MAX_BACKUPS) | Remove-Item"

# ==========================
# 🚀 Commandes Docker
# ==========================

# Docker : démarrer les services
start:
	@echo "$(BLUE)🚀 Démarrage des conteneurs Docker...$(NC)"
	docker compose -f docker-compose.yml up -d
	@echo "$(GREEN)✅ Conteneurs démarrés$(NC)"

# Docker : arrêter les services
stop:
	@echo "$(BLUE)🛑 Arrêt des conteneurs Docker...$(NC)"
	docker compose -f docker-compose.yml down
	@echo "$(GREEN)✅ Conteneurs arrêtés$(NC)"

# Arrêter les services et sauvegarder
down:
	@$(MAKE) backup-house_of_agriculture
	@$(MAKE) backup-laravel
	@$(MAKE) backup-bookstack
	@echo "$(RED)🛑 Arrêt + suppression des conteneurs...$(NC)"
	docker compose down
	@echo "$(GREEN)✅ Tout a été stoppé et sauvegardé$(NC)"

# Reconstruire les images Docker
build:
	@echo "$(BLUE)🔧 Construction des images Docker...$(NC)"
	docker compose -f docker-compose.yml build
	@echo "$(GREEN)✅ Images Docker construites avec succès !$(NC)"

# ==========================
# 🧹 Nettoyage Docker
# ==========================

# Voir l'utilisation disque de Docker (afficher l’espace disque utilisé)
docker-df:
	@echo "$(BLUE)📊 Affichage de l'utilisation disque Docker...$(NC)"
	docker system df

# Nettoyer les éléments inutilisés AVEC confirmation manuelle
docker-prune:
	@echo "$(RED)⚠️ Cette commande va supprimer tous les éléments inutilisés de Docker$(NC)"
	@set /p confirm="$(YELLOW)Es-tu sûr de vouloir continuer ? (y/n): $(NC)" && if /i not $$confirm==y exit 1
	docker system prune

# ==========================
# 📦 Infos backup
# ==========================

# Afficher les tailles de backup
show-backup-sizes:
	powershell -Command "Get-ChildItem $(BACKUP_DIR)/*.tar | Sort-Object LastWriteTime -Descending | Select-Object Name, @{Name='Size(MB)';Expression={\"{0:N2}\" -f ($_.Length / 1MB)}}"

# Intégration du script PowerShell dans le Makefile
backup-script:
	powershell -ExecutionPolicy Bypass -File ./scripts/backup.ps1
