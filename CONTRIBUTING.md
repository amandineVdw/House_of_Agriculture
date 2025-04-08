# 🤝 Guide de contribution – HOA Platform

Merci de contribuer à HOA Platform !  
Ce document vous explique **comment collaborer efficacement** avec le reste de l’équipe.

---

## 📌 Branches principales

| Branche     | Rôle                                      |
|-------------|--------------------------------------------|
| `main`      | Version stable du projet (prod, démo)      |
| `develop`   | Base de travail commune à toute l’équipe   |
| `frontend`  | Design, Blade, Livewire, Tailwind/Bootstrap|
| `backend`   | API, logique métier, modèles Eloquent      |
| `docs`      | Documentation, guides, procédures internes |

---

## 🔄 Workflow Git recommandé

### ➕ Créer une nouvelle fonctionnalité

1. Se placer sur `develop` :
   ```bash
   git checkout develop
   git pull
   ```

2. Créer une nouvelle branche :
   ```bash
   git checkout -b feature/nom-de-la-fonction
   ```

3. Coder, commiter régulièrement :
   ```bash
   git add .
   git commit -m "feat: ajoute la page de cours"
   ```

4. Pousser la branche :
   ```bash
   git push origin feature/nom-de-la-fonction
   ```

5. Ouvrir une **Pull Request vers `develop`** sur GitHub

---

## ✍️ Conventions de nommage des branches

| Préfixe     | Utilisation                                  |
|-------------|-----------------------------------------------|
| `feature/`  | Nouvelle fonctionnalité                       |
| `fix/`      | Correction de bug                            |
| `chore/`    | Tâches techniques, config, mise à jour        |
| `hotfix/`   | Correction urgente en production             |
| `docs/`     | Ajout ou mise à jour de documentation        |

Exemples :
```bash
feature/formulaire-inscription
fix/erreur-validation-email
docs/mise-a-jour-readme
```

---

## ✅ Bonnes pratiques

- Garder des **commits clairs et significatifs** :
  - `feat: ajoute le composant formulaire`
  - `fix: corrige l’erreur de migration`

- Ouvrir une **Pull Request propre et compréhensible** :
  - Titre explicite
  - Description du changement
  - Captures d’écran si besoin

- Demander une **review d’un collègue** avant merge

---

## 🧹 Format de commit conseillé (optionnel)

Inspiré de Conventional Commits :

```
<type>: <description courte>

[Corps du message si besoin]
```

Types recommandés :
- `feat:` nouvelle fonctionnalité
- `fix:` correction de bug
- `docs:` documentation
- `style:` indentation, formatage
- `refactor:` refonte sans changer le comportement
- `test:` tests
- `chore:` tâches diverses

---

## 🧪 Tests et vérifications

Avant d’ouvrir une PR :
- Vérifiez que le projet tourne (`./start.sh`)
- Vérifiez que Laravel et BookStack fonctionnent
- Relisez vos commits

---

## 💬 Besoin d’aide ?

Contactez le référent technique : **[Nom]** – `email@exemple.com`  
Ou ouvrez une **Issue** dans le dépôt.

---

Merci pour vos contributions 💡
