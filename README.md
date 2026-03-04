#  Mini-Framework MVC et Routing
## Description
Ce projet PHP illustre une architecture MVC légère et modulaire pour la gestion des étudiants et des filières.
Il met en œuvre :

- Un point d’entrée unique (public/index.php) avec autoload et redirection.

- Une factory (AppFactory) qui instancie PDO, DAO, contrôleurs, vues et router.

- Un router maison (Router) qui gère les routes dynamiques GET/POST.

- Des contrôleurs (BaseController, EtudiantController) pour orchestrer la logique métier et l’affichage.

- Des DAO (DBConnection, FiliereDao, EtudiantDao) pour la persistance.

- Un Logger simple pour tracer les erreurs et infos.

- Un moteur de vues (View) avec layout global et templates sécurisés.

- Des templates PHP pour les pages (liste, création, édition, détail).

- Un fichier test_routes.md qui documente les endpoints CRUD et API.
## Project Structure
```
project-root/
├── public/
│   └── index.php
├── src/
│   ├── Container/
│   │   └── AppFactory.php
│   ├── Controller/
│   │   ├── BaseController.php
│   │   └── EtudiantController.php
│   ├── Core/
│   │   ├── Router.php
│   │   ├── Request.php
│   │   ├── Response.php
│   │   └── View.php
│   ├── Dao/
│   │   ├── DBConnection.php
│   │   ├── Logger.php
│   │   ├── EtudiantDao.php
│   │   └── FiliereDao.php
├── views/
│   ├── layout.php
│   └── etudiant/
│       ├── index.php
│       ├── create.php
│       ├── edit.php
│       └── show.php
├── logs/
│   └── app.logs
├── test_routes.md
└── README.md
```
# Configuration
## Création de la base de données
- Copier ce code dans phpMyAdmin ou exécuter via un client MySQL :
```sql
CREATE DATABASE IF NOT EXISTS gestion_etudiants_pdo CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE gestion_etudiants_pdo;

CREATE TABLE IF NOT EXISTS filiere (
  id INT AUTO_INCREMENT PRIMARY KEY,
  code VARCHAR(20) NOT NULL UNIQUE,
  libelle VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS etudiant (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cne VARCHAR(20) NOT NULL UNIQUE,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  filiere_id INT NOT NULL,
  CONSTRAINT fk_filiere FOREIGN KEY (filiere_id) REFERENCES filiere(id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;
```
## Configuration de la connexion PDO
- Dans AppFactory.php, adapter les paramètres si nécessaire :
```php
$dbHost = "127.0.0.1";
$dbName = "gestion_etudiants_pdo";
$dbUser = "root";
$dbPass = "";
$charset = "utf8mb4";
```
## Lancer l’application
- 1- Placer le projet dans ton serveur local (par ex. htdocs/gestion_etudiants).
- 2- Démarrer un serveur PHP intégré :
```
php -S localhost:8000 -t public
```
- 3- Ouvrir dans le navigateur :
```
http://localhost:8000/etudiants
```
## les principales routes 
- GET /etudiants → liste paginée

- GET /etudiants/create → formulaire création

- POST /etudiants/store → ajout étudiant

- GET /etudiants/{id} → détail étudiant

- GET /etudiants/{id}/edit → édition

- POST /etudiants/{id}/update → mise à jour

- POST /etudiants/{id}/delete → suppression

- GET /api/etudiants?page=1 → API JSON
#  Example Execution
<img width="930" height="437" alt="image" src="https://github.com/user-attachments/assets/5b57f750-9c5b-4e4f-b725-1c37519a3dd9" />
<img width="995" height="358" alt="image" src="https://github.com/user-attachments/assets/48e98933-231e-4fe9-b547-34b98340a34e" />
<img width="752" height="383" alt="image" src="https://github.com/user-attachments/assets/50b1f775-179c-48d6-aafa-5ccb6728800b" />

#  Concepts Practiced
- Mini framework MVC en PHP.

- Autoload PSR-4 simplifié.

- Routing maison avec regex et paramètres dynamiques.

- Contrôleur de base réutilisable.

- Validation et sanitation des données.

- API REST JSON en complément des vues HTML.

- Injection de dépendances via Factory.

- Séparation stricte des responsabilités (Controller, DAO, Core, Views).

- Sécurité des vues avec htmlspecialchars().

# 🧑‍💻 Author
- 👤 Majjati Mohamed Taha
- 🏫 Programmation orientée objet et fonctionnelle : PHP
- 🎓 Instructor : Mr. LACHGAR  
- 📅 3 mars 2026
