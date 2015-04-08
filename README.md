PROJET TALK

	Ce projet a été conçu par RAYNAUD Yann, FAURE Michaël, SOUPET Paul, REALE Guillaume et REGNIER Alex en première année de BTS SIO (Services Informatiques aux Organisations) dans la structure Infosup de Toulouse.
Il a été mis au point dans le cadre des PPE (Projet Personnalisé Encadré) sous la tutelle d'un professeur qualifié en développement.

	Le projet Talk est la création d'un forum à l'aide des langages html 5, css 3, php, JQuery, Ajax ainsi que MySQL. Initialement conçu pour une utilisation privée, ce projet est finalement partagé sur GitHub afin que toute personne voulant l'essayer puisse y accéder via une plateforme publique.
Il est aussi possible de télécharger le projet et de s'en servir sur son serveur personnel.
Un site test permettant la visualisation simple du projet sera bientôt disponible.

Déploiement du forum:
	- Créez une nouvelle table dans votre base de données via phpmyadmin
	- Sélectionnez là
	- Accédez à l'onglet "Importer"
	- Importez le fichier "forum.sql" provenant du projet Talk précédemment téléchargé
	- Cliquez sur "Exécuter" en bas de la page pour finaliser l'importation du fichier.
	- Modifier les informations contenues dans les trois constantes définies dans le fichier addresse.php pour les adapter à votre forum (Identifiants, Mot de passe et Addresse de la base de données) 


L'ordre de détention de droits fonctionne en trois paliers:
Vous devrez assigner à au moins 1 utilisateur les droits d'administration via la base de données afin de pouvoir avoir une personne en charge du forum.
	- palier 2: Administrateur (tous les droits sur le forum)
	- palier 1: Modérateur (droits de lecture, droit d'écriture et d'édition des publications de tous les utilisateurs à l'exeption des autres modérateurs)
	- palier 0: Utilisateur (droits de lecture, droit d'écriture et d'édition de ses propres publications)

Sous License MIT
