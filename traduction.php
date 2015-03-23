<?php

$lang = "fr";
$testLang=strpos($_SERVER['HTTP_ACCEPT_LANGUAGE'],$lang);

if ($testLang==5) {

//fr
	// index.php
		//titres et liens
	$bonjour = 'Bienvenue';
	$bonjourDc = 'Bienvenue sur Talk';
	$connexion = 'Connexion'; // utile sur la page de connexion
	$senregistrer = 'S\'enregistrer'; // utile sur la page d'enregistrement
	$seDeconnecter = 'Se&nbspdéconnecter';
	$discution = 'Discussions récentes';
	$choix = 'Choisissez un des topic à votre gauche';
	$erreurTopic = 'Erreur : Nom de topic déjà utilisé.';
	$accueil = 'Acceuil';
		// placeholder et valeur(boutons)
	$creerTopic = 'nom topic';
	$ecrire = 'ecrire ici';
	$envoyer = 'envoyer';
	$recherche ='recherche...';
 
	// Register.php
		// placeholder

	$pseudoEnr = 'pseudo 6ch min';
	$motDePasseEnr ='mot de passe 8ch min';
	$motDePasseEnrConf ='confirmez le mot de passe';
	$addresseMail = 'adresse mail';

		//erreur
	$erreurPseudoUse = 'Pseudo utilisé';
	$erreurPseudoCourt = 'Pseudo trop court ( 6caractère minimum )';
	$erreurMdpCourt = 'Mot de passe trop court';
	$erreurMdpDif = 'Les mots de passe ne concordent pas';
	$erreurMailUse = 'Adresse mail déjà utilisé';
 
	//connexion.php
		//erreur
	$erreurConnect ='Erreur : Mauvais Identifiant ou Mot de passe';
	$enregistrementReussi ='Vous avez bien été enregistré ! veuillez vous connecter';
		//placeholder
	$pseudo = 'pseudo';
	$motDePasse ='mot de passe';
	

	//page liste membre
	$listeMembre = 'Liste membre';
	$droitAdmin ='droit d\'administrateur niveau ';
	$utilisateur ='l\'utilisateur';
	$estAdmin ='est désormais administrateur de rang 1';
	$nestPlusAdmin = 'n\'est plus administrateur de rang 1';

	// page multiple 
	$retourAc = 'retour à l\'accueil';

}

else
{
//eng
	// index.php
		//titres et liens
	$bonjour = 'Welcome';
	$bonjourDc = 'Welcome in Talk';
	$connexion = 'Sign in' ;// utile sur la page de connexion
	$senregistrer = 'Register now' ;// utile sur la page d'enregistrement
	$seDeconnecter = 'Sign out';
	$discution = 'Recent Discution';
	$choix = 'Choose a topic on your left';
	$erreurTopic = 'Error : Name of topic already use.';
	$accueil = 'Reception';
		// placeholder et valeur(boutons)
	$creerTopic = 'topic name';
	$ecrire = 'write here';
	$envoyer = 'Send';
	$recherche ='search...';
 
	// Register.php
		// placeholder

	$pseudoEnr = 'pseudo 6ch min';
	$motDePasseEnr ='Password 8ch min';
	$motDePasseEnrConf ='Password confirmation';
	$addresseMail = 'mail address';

		//erreur
	$erreurPseudoUse = 'Pseudo use';
	$erreurPseudoCourt = 'Pseudo too short ( 6caractère minimum )';
	$erreurMdpCourt = 'Password too short';
	$erreurMdpDif = 'Password do not match';
	$erreurMailUse = 'Mail address is already use';
 
	//connexion.php
		//erreur
	$erreurConnect ='Error : Bad pseudo or password';
	$enregistrementReussi ='you\'ve been register succesfuly ! Please sign in';
		//placeholder
	$pseudo = 'pseudo';
	$motDePasse ='password';
	

	//page liste membre
	$listeMembre = 'Membre list';
	$droitAdmin ='right of administration lvl ';
	$utilisateur ='The user ';
	$estAdmin ='is now a director rank 1';
	$nestPlusAdmin = 'is no longer a director of rank 1';

	// page multiple 
	$retourAc = 'Return to reception';
}