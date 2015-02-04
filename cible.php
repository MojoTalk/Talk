<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
}

catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());	
}

$req =$bdd->prepare('INSERT INTO posts(biliet) Values(:biliet)');
$req->execute(array(
'biliet' => $_POST['biliet'],
));

