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
  
L'architecture choisie est une architecture de type MVC (Model - View - Controller) qui se décompose ainsi :   
  
 - Racine du projet : on retrouve le point d'entrée du portfolio (index.php)  
 - Répertoire **controller** : contient les controllers pour le frontend et pour le backend
 - Répertoire **model**  : contient les différentes requêtes pour le frontend et le backend
 - Répertoire **view** : contient les différentes vues du projet (frontend et le backend)
 - Répertoire **public** : contient les différentes ressources qui doivent être accessibles depuis le navigateur (images, css, javascript et les éléments pouvant être téléchargé)
 - Répertoire **utils** : contient les fonctions utiles et réutilisables sur plusieurs pages
 - Répertoire **installation** : contient le script d'installation de la base de données avec un jeu de données initiales  
 
  

  ```   .
    ├── README.md
    ├── controller
    │   ├── backend.php
    │   └── frontend.php
    ├── index.php
    ├── installation
    │   └── portfolio.sql
    ├── model
    │   ├── backend.php
    │   ├── db.php
    │   └── frontend.php
    ├── public
    │   ├── css
    │   │   ├── admin.css
    │   │   ├── front.css
    │   │   └── main.css
    │   ├── download
    │   │   └── CV.pdf
    │   ├── img
    │   │   ├── error.png
    │   │   ├── profile
    │   │   │   └── profile.jpeg
    │   │   ├── project
    │   │   │   ├── carmanager.png
    │   │   │   ├── forteroche.jpg
    │   │   │   ├── louvre.jpg
    │   │   │   ├── moncoutant.jpg
    │   │   │   ├── nao.jpg
    │   │   │   └── valerie-dauphin.png
    │   │   └── skills
    │   │       ├── css.png
    │   │       ├── git.png
    │   │       ├── github.png
    │   │       ├── html.png
    │   │       ├── javascript.png
    │   │       ├── linkedin.png
    │   │       ├── php.png
    │   │       ├── sql.png
    │   │       └── symfony.png
    │   └── js
    │       ├── input-date.js
    │       ├── input-file.js
    │       ├── sidebar-menu.js
    │       ├── tinymce.js
    │       └── transition.js
    ├── utils
    │   └── upload.php
    └── view
        ├── backend
        │   ├── adminAboutView.php
        │   ├── adminContactView.php
        │   ├── adminExperienceView.php
        │   ├── adminMessageView.php
        │   ├── adminNavView.php
        │   ├── adminProjectView.php
        │   ├── adminSkillsView.php
        │   └── template.php
        ├── errors.php
        └── frontend
            ├── connexionView.php
            └── homeView.php
```
  
  
## Instructions d'installation  
   
 1. Installer un serveur web et PHP : `apt install apache2 php postfix`
 2. Installer [PostgreSQL](https://www.postgresql.org/download) 
 3. Lors de la configuration de postfix, choisir l'option  `Site internet`  puis pour le nom de domaine :  `portfolio`
4. Modifier le fichier de configuration de postfix :  `sudo nano /etc/postfix/main.cf`et supprimer à la ligne mydestination portfolio, | Modifier la ligne inet-interfaces = all par inet-interfaces = loopback-only
5.  Redémarrer postfix :  `sudo service postfix restart`
6.  Vérifier que votre Fournisseur d'Accès à Internet ne bloque pas les envois de mail SMTP. Vous pouvez désactiver le blocage en vous rendant sur la console d'administration de votre box; (généralement l'adresse pour y accéder est 192.168.1.1)
7. Modifier la configuration du virtual host par défaut :  `sudo nano /etc/apache2/sites-available/000-default.conf`
8.  Supprimer le /html à la ligne ->  `documentRoot: var/www`  puis enregistrer le fichier
9. Ajouter avant `</VirtualHost>` : 
```
<Directory /var/www/>
	AllowOverride All
</Directory>
```
12.  Activer le fichier de configuration modifié :  `sudo a2ensite 000-default.conf`  puis redémarrer apache  `sudo service apache2 restart`
13. Créer une base de données depuis pgAdmin `CREATE DATABASE portfolio`   
14. Exécuter le script SQL depuis un terminal pour créer les différentes tables nécessaires au bon fonctionnement du projet (`installation/portfolio.sql`) `psql -U votreuser nomdelabase < portfolio.sql`  

Pour que le projet fonctionne, il faut que le mot de passe de l'utilisateur **postgres** soit égale à **root**. Si ce n'est pas le cas, vous avez deux solutions soit : 

 - Modifier le mot de passe de l'utilisateur postgres en allant exécuter la commande `psql` puis `\password postgres` et vous tapez **root** en mot de passe
 - Si vous connaissez le mot de passe pour l'utilisateur postgres et que vous ne voulez pas changer son mot de passe, vous devrez alors modifier le fichier **db.php** qui se trouve dans le répertoire **model**. 

  
  
**Première connexion à l'administration** :  
 1. Se rendre à l'adresse : localhost/portfolio-v2/index.php?page=connect  
 2. Cliquer sur le lien "Première connexion" puis rentrer l'identifiant et le mot de passe de connexion  
  
Vous pouvez désormais  après avoir réalisé ces quelques étapes, modifier les différentes sections du site et construire votre portfolio.