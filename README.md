# 🌟 Projet Banque de Sang

## 🚀 Présentation

Application PHP simple pour gérer une banque de sang.

Le projet permet de :
- créer des utilisateurs (`admin` / `gestionnaire`)
- se connecter
- enregistrer des poches de sang
- afficher et supprimer des poches existantes

La base de données utilisée est MySQL/MariaDB avec deux tables principales : `utilisateur` et `blood`.

---

## ✨ Fonctionnalités

- ✅ Inscription d'un utilisateur avec rôle `admin` ou `gestionnaire`
- ✅ Connexion avec email et mot de passe
- ✅ Enregistrement d'une poche de sang (type, rhésus, quantité, dates, donneur)
- ✅ Liste des poches de sang
- ✅ Suppression d'une poche de sang

---

## 🎬 Démonstration

> Remplacez `demo.gif` par votre propre GIF de démonstration.

![Demo application Banque de Sang](demo.gif)

---

## 📁 Structure du projet

- `index.php` : page d'accueil et navigation
- `ajout_utilisateur.php` : inscription d'un nouvel utilisateur
- `connexion.php` : connexion utilisateur
- `ajout_poche.php` : ajout d'une nouvelle poche de sang
- `supp_poche.php` : affichage et suppression des poches de sang
- `banque_of_blood.sql` : script SQL pour créer la base et les tables

---

## 🛠️ Installation

1. Installez un serveur web compatible PHP (Apache, Nginx, etc.) et MySQL/MariaDB.
2. Copiez les fichiers du projet dans le dossier web de votre serveur.
3. Importez le schéma SQL :

```bash
mysql -u root -p < banque_of_blood.sql
```

4. Ouvrez `index.php` dans votre navigateur.

---

## 🚢 Déploiement

### Option 1 : Déploiement local

1. Installez XAMPP, MAMP, WampServer ou un environnement PHP local.
2. Placez le dossier du projet dans le répertoire `htdocs` / `www`.
3. Importez `banque_of_blood.sql` dans phpMyAdmin ou via la ligne de commande.
4. Accédez à `http://localhost/Projet_banque_de_sang/index.php`.

### Option 2 : Déploiement sur un serveur Linux

1. Installez Apache/Nginx, PHP et MariaDB.
2. Copiez les fichiers dans le répertoire du site web.
3. Créez la base de données et importez le SQL.
4. Assurez-vous que le répertoire possède les bonnes permissions.
5. Redémarrez le serveur web.

### Option 3 : Hébergeur PHP

- Téléversez les fichiers sur votre hébergeur.
- Configurez la base de données MySQL.
- Adaptez les paramètres de connexion dans les fichiers PHP si nécessaire.

---

## 🗃️ Base de données

### Table `utilisateur`

- `id`
- `nom`
- `prenom`
- `email`
- `password`
- `role`
- `date_creation`

### Table `blood`

- `id`
- `type_sang`
- `rhesus`
- `quantite`
- `date_collection`
- `date_expiration`
- `donneur_nom`
- `donneur_prenom`
- `donneur_age`
- `id_utilisateur`
- `date_ajout`

---

## ⚠️ Notes importantes

- Ce projet est un prototype pédagogique.
- Les mots de passe sont stockés en clair dans la base de données.
- Il est fortement recommandé d'ajouter :
  - le hachage des mots de passe (`password_hash` / `password_verify`)
  - des requêtes préparées pour éviter les injections SQL
  - une validation plus stricte des champs
  - un contrôle de session et d'accès plus sécurisé

---

## 🧩 Améliorations possibles

- ajout d'un tableau de bord
- gestion des stocks par type sanguin
- recherche / filtre des poches de sang
- export CSV
- authentification plus robuste

---

## 📝 Auteur

Projet de gestion d'une banque de sang, réalisé en PHP/MySQL.
