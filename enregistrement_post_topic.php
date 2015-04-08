<?php

if(isset($_POST['biliet']))
{
	$str = $_POST['biliet'];
	$str = strip_tags($str, '</br><br>');
	$order = array("\r\n", "\n", "\r");
	$replace = '</br>';
	$newstr = str_replace($order, $replace, $str);
	$req =$bdd->prepare('INSERT INTO posts(biliet, topic, nomp, rang) Values(:biliet, :topic, :nomp, :rang)');
	$req->execute(array(
	'biliet' => $newstr,
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
			header('location: index.php?nomTopicUtilise=true');
		}	
}

?>