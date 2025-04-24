# AVDW 23/04/25
# Variables
$BackupDir = "C:\Users\AVDW\Projets\House_of_Agriculture\backups"
$Date = Get-Date -Format "yyyyMMdd-HHmm"
$ProjectName = "house_of_agriculture-app"  # Nom du projet
$ImageHouseOfAgriculture = "house_of_agriculture-app:latest"
$ImageLaravel = "hoa-laravel-app:latest"
$ImageBookstack = "hoa-platform-member-bookstack:latest"

# Afficher le nom du projet pour vérification
Write-Host "Project Name: $ProjectName"

# Sauvegarde de l'image principale de l'application
Write-Host "💾 Sauvegarde de l'image House of Agriculture ($ProjectName)..."
docker image save $ImageHouseOfAgriculture -o "$BackupDir\backup-$ProjectName-$Date.tar"
Write-Host "✅ Image House of Agriculture sauvegardée dans $BackupDir"

# Sauvegarde de l'image Laravel
Write-Host "💾 Sauvegarde de l'image Laravel..."
docker image save $ImageLaravel -o "$BackupDir\backup-laravel-app-$Date.tar"
Write-Host "✅ Image Laravel sauvegardée dans $BackupDir"

# Sauvegarde de l'image BookStack
Write-Host "💾 Sauvegarde de l'image BookStack..."
docker image save $ImageBookstack -o "$BackupDir\backup-bookstack-app-$Date.tar"
Write-Host "✅ Image BookStack sauvegardée dans $BackupDir"
