<?php



// Suppresion de messagee______________________________________________________________________________________________________________________


if(isset($_POST['suppression']))
{
	$req = $bdd->prepare('DELETE FROM posts WHERE ID = ?');
	$req->execute(array($_POST['suppression']));
}

// Suppresion des Topics et des mpost qui y sont associé(reservé admin)e_______________________________________________________________________

if(isset($_POST['suppressionID']))
{
	$req = $bdd->prepare('DELETE FROM topic WHERE id = ?');
	$req->execute(array($_POST['suppressionID']));
	$req = $bdd->prepare('DELETE FROM posts WHERE topic = ?');
	$req->execute(array($_POST['suppressionNom']));
}

// Suppresion de personnese______________________________________________________________________________________________________________________
if(isset($_POST['suppressionLogsID']))
{
	$req = $bdd->prepare('DELETE FROM logs WHERE ID = ?');
	$req->execute(array($_POST['suppressionLogsID']));
}

?>