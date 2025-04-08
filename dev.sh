#!/bin/bash

#######################################
# HOA Platform – Script Dev Environnement
# À sourcer dans ton terminal :
#    source dev.sh
#######################################

echo "✅ HOA Dev Environment Ready"

# 📦 Artisan dans Docker
alias art="docker exec -it hoa-laravel-app php artisan"

# 🎼 Composer dans Docker
alias compo="docker exec -it hoa-laravel-app composer"

# 🔧 Bash dans le conteneur Laravel
alias laravel-bash="docker exec -it hoa-laravel-app bash"

# 📂 Ouvrir les logs Laravel
alias laravel-log="docker exec -it hoa-laravel-app tail -f storage/logs/laravel.log"

# 🐳 Lancer les conteneurs
alias hoa-up="docker-compose up -d --build"

# 🧹 Réinitialiser la base de données (dev uniquement !)
alias art-fresh="docker exec -it hoa-laravel-app php artisan migrate:fresh --seed"

# 💾 Accès rapide au conteneur BookStack
alias bookstack-bash="docker exec -it bookstack bash"

# 💬 Aide
alias hoa-help="echo -e 'Commandes utiles :\n- art (artisan)\n- compo (composer)\n- laravel-bash (bash Laravel)\n- laravel-log\n- hoa-up\n- art-fresh (reset DB dev)\n- bookstack-bash\n'"
