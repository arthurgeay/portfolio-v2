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

*A venir*


## Instructions d'installation

 1. Cloner le projet `git clone https://github.com/arthurgeay/portfolio-v2.git`
 2. Installer un serveur web permettant d'exécuter du PHP. Le plus simple étant d'installer une plateforme LAMP (Apache, MySQL, PHP) sur sa machine : [WAMP](https://www.clubic.com/telecharger-fiche27009-wampserver.html) (windows) | [MAMP](https://www.mamp.info/en/) (Mac) | Linux (LAMP)
 3. Installer [PostgreSQL](https://www.pgadmin.org/)
 4. Créer une base de données depuis pgAdmin `CREATE DATABASE lenomdemabase` 
 5. Exécuter le script SQL depuis un terminal pour créer les différentes tables nécessaires au bon fonctionnement du projet (`installation/portfolio.sql`) `psql -U votreuser nomdelabase < portfolio.sql`


**Première connexion à l'administration** :
 1. Se rendre à l'adresse : localhost/portfolio-v2/admin
 2. Cliquer sur le lien "Première connexion" puis rentrer l'identifiant et le mot de passe de connexion

Vous pouvez désormais  après avoir réalisés ces quelques étapes, modifier les différentes sections du site et construire votre portfolio.


