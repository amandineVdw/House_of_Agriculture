### Install
## 🔧 Prérequis
- Docker & Docker Compose
- Git
- (Optionnel) Composer et PHP pour développement Laravel en local

---

## 🚀 Démarrage du projet

```bash
git clone <votre-repo>
cd hoa-platform
cp laravel/.env.example laravel/.env
docker-compose up --build -d

Permissions Docker (volumes PUID/PGID)

Tu les as déjà dans ton docker-compose.yml :

PUID=1000
PGID=1000
Vérifie simplement que l’UID de ton utilisateur est bien 1000 :

id -u  # doit afficher 1000
Sinon, adapte la variable pour coller à ton environnement local.

