<?php

if(isset($_POST['biliet']))
{
	$req =$bdd->prepare('INSERT INTO posts(biliet, topic, nomp, rang) Values(:biliet, :topic, :nomp, :rang)');
	$req->execute(array(
	'biliet' => $_POST['biliet'],
	'topic' => $_GET['topic'],
	'nomp' => $_SESSION['id'],
	'rang' => $_SESSION['administrateur']

	));
	$req->closeCursor();
}

if(isset($_POST['nomtopic']))
{
	$req = $bdd->prepare('SELECT nom FROM topic WHERE nom = ? ');
	$req->execute(array($_POST['nomtopic']));
	$count = $req->rowCount();

		if ($count == 0)
		{
			$req =$bdd->prepare('INSERT INTO topic(nom, rang) Values(:nom, :rang)');
			$req->execute(array(
			'nom' => $_POST['nomtopic'],
			'rang' => $_SESSION['administrateur']
			));
			$_GET['topic'] = $_POST['nomtopic'];
			$req->closeCursor();
		}

		else
		{
			header('location: http://localhost/talk/index.php?nomTopicUtilise=true');
		}	
}

?>