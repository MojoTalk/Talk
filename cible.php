<?php

if(isset($_POST['biliet']))
{
$req =$bdd->prepare('INSERT INTO posts(biliet, topic, nomp) Values(:biliet, :topic, :nomp)');
$req->execute(array(
'biliet' => $_POST['biliet'],
'topic' => $_GET['topic'],
'nomp' => $_SESSION['pseudo']

));
$req->closeCursor();
}

if(isset($_POST['nomtopic']))
{
$req =$bdd->prepare('INSERT INTO topic(nom) Values(:nom)');
$req->execute(array(
'nom' => $_POST['nomtopic']
));
$_GET['topic'] = $_POST['nomtopic'];
$req->closeCursor();
}






#  ci dessous ligne des logs


if(isset($_POST['mdp']))
{

	if((isset($_POST['mdp']))==(isset($_POST['vmdp'])))
	{

		$req = $bdd->prepare('SELECT pseudos, mail FROM logs WHERE pseudos = ? OR mail = ?');

		$req->execute(array($_POST['pseudo'], $_POST['mail']));
		$count = $req->rowCount(); 
		if ($count == 0)
		{
			$pass_hache = sha1($_POST['mdp']);
			$req =$bdd->prepare('INSERT INTO logs(pseudos, mdp, mail) Values(:pseudos, :mdp, :mail)');
			$req->execute(array(

			'pseudos' => $_POST['pseudo'],
			'mdp' => $pass_hache,
			'mail'=> $_POST['mail']
			));
			$req->closeCursor();
			echo 'Vous avez bien ete enregistrer';
			?>
			<a href="http://localhost/Talk/connection.php">pour vous connecter cliquez ici</a>
			<?php
		}
		else 
		{
			$req = $bdd->prepare('SELECT pseudos, mail FROM logs WHERE pseudos = ? ');
			$req->execute(array($_POST['pseudo']));
			$count = $req->rowCount(); 
				if ($count == 1)
					{
					echo 'pseudo deja utilise';
					?> <a href="http://localhost/talk/testlog.php">retour a la page d'enregistrement</a><?php
					}
				else
				{
					echo 'adresse mail déjà utilise';
					?> <a href="http://localhost/talk/testlog.php">retour a la page d'enregistrement</a><?php
				}
		}
		$req->closeCursor();
	}
}
if(isset($_POST['mdpc']))
{
		$pass_hache = sha1($_POST['mdpc']);
		$req = $bdd->prepare('SELECT id FROM logs WHERE pseudos = :pseudos AND mdp = :mdp');
		$req->execute(array(

		'pseudos' => $_POST['pseudoc'],
		'mdp' => $pass_hache,
		));

	$resultat = $req->fetch();

	if (!$resultat)

	{

	    echo 'Mauvais identifiant ou mot de passe !';

	}

	else

	{

	    

	    $_SESSION['id'] = $resultat['id'];

	    $_SESSION['pseudo'] = $_POST['pseudoc'];





	}
	$req->closeCursor();
}
if(isset($_POST['suppression']))
{
	$req = $bdd->prepare('DELETE FROM posts WHERE ID = ?');
	$req->execute(array($_POST['suppression']));

}