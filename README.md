# Portfolio

## Présentation du projet

Dans le cadre des projets à réaliser lors de ma première année à Ynov Nantes, il nous a été demandé de réaliser un portfolio en ligne qui soit administrable.

**Les fonctionnalités de ce projet :** 

C'est un site de type one-page, toutes les informations sont donc affichées sur la même page et découpées sous la forme de section.

 **Front-end :**

 - Section de présentation 
 - Section parcours (présentation des expériences professionnelles et des formations)
 - Section compétences
 - Section projets
 - Formulaire de contact

**Back-end :** 

En ce qui concerne le back-end, celui-ci se décompose en plusieurs page permettant d'administrer le portfolio selon les différentes sections :

 - Administration de la section présentation
 - Administration de la section parcours (ajout, modifications, suppression)
 - Administration de la section compétences (ajout, modifications, suppression)
 - Administration de la section projets (ajout, modifications, suppression)
 - Administration du formulaire de contact
 - Consultation des messages envoyées depuis le formulaire de contact (possibilité de supprimer les messages)


## Technologies utilisées

HTML & CSS | Javascript | jQuery | PHP | SQL 

## Architecture du projet

L'architecture se décompose ainsi : 

 - Racine du projet : on retrouve le point d'entrée du portfolio (index.php) et le template des erreurs
 - Répertoire admin** : contient les différentes pages de l'administration
 - Répertoire CSS : contient le CSS du portfolio
 - Répertoire JS : contient les différents scripts JS du projet
 - Répertoire download : contient les éléments téléchargeable 
 - Répertoire img : contient les images du projets
 - Répertoire installation : contient le script d'installation de la base de données avec un jeu de données initiales

**L'architecture du projet sera soumise à des modifications après le développement de la partie PHP et de l'intégration du pattern MVC au projet**

    README.md
    ├── admin
    │   ├── admin-about.php
    │   ├── admin-contact.php
    │   ├── admin-edit-experience.php
    │   ├── admin-edit-project.php
    │   ├── admin-edit-skills.php
    │   ├── admin-experience.php
    │   ├── admin-message.php
    │   ├── admin-nav.php
    │   ├── admin-project.php
    │   ├── admin-skills.php
    │   └── connexion.php
    ├── css
    │   ├── admin.css
    │   ├── front.css
    │   └── main.css
    ├── download
    │   └── CV.pdf
    ├── errors.php
    ├── img
    │   ├── error.png
    │   ├── profile
    │   │   └── profile.jpeg
    │   ├── project
    │   │   ├── carmanager.png
    │   │   ├── forteroche.jpg
    │   │   ├── louvre.jpg
    │   │   ├── moncoutant.jpg
    │   │   ├── nao.jpg
    │   │   └── valerie-dauphin.png
    │   └── skills
    │       ├── css.png
    │       ├── git.png
    │       ├── github.png
    │       ├── html.png
    │       ├── javascript.png
    │       ├── linkedin.png
    │       ├── php.png
    │       ├── sql.png
    │       └── symfony.png
    ├── index.php
    ├── installation
    │   └── portfolio.sql
    └── js
        ├── input-date.js
        ├── input-file.js
        ├── sidebar-menu.js
        ├── tinymce.js
        └── transition.js



## Instructions d'installation

 1. Cloner le projet `git clone https://github.com/arthurgeay/portfolio-v2.git`
 2. Installer un serveur web permettant d'exécuter du PHP. Le plus simple étant d'installer une plateforme LAMP (Apache, MySQL, PHP) sur sa machine : [WAMP](https://www.clubic.com/telecharger-fiche27009-wampserver.html) (windows) | [MAMP](https://www.mamp.info/en/) (Mac) | Linux (LAMP)
 3. Installer [PostgreSQL](https://www.pgadmin.org/)
 4. Créer une base de données depuis pgAdmin `CREATE DATABASE portfolio` 
 5. Exécuter le script SQL depuis un terminal pour créer les différentes tables nécessaires au bon fonctionnement du projet (`installation/portfolio.sql`) `psql -U votreuser nomdelabase < portfolio.sql`


**Première connexion à l'administration** :
 1. Se rendre à l'adresse : localhost/portfolio-v2/admin
 2. Cliquer sur le lien "Première connexion" puis rentrer l'identifiant et le mot de passe de connexion

Vous pouvez désormais  après avoir réalisé ces quelques étapes, modifier les différentes sections du site et construire votre portfolio.


