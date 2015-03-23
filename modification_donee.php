<?php


//Modification de message______________________________________________________________________________________________________________________
	//etape 1 récupération des informations liées au message.
if (isset($_POST['edit'])) 
{
	$reponse = $bdd->prepare('SELECT ID, biliet FROM posts WHERE ID = ?');
	$reponse->execute(array($_POST['edit']));
	$message = "";
	$id = 0;
	while ($donees = $reponse -> fetch())
	{
		$message = $donees['biliet'];
		$id = $donees['ID'];
	}
}

	//etape 2 enregistrement des nouvelles informations
if (isset($_POST['bilietM'])) 
{
	$req = $bdd->prepare('UPDATE posts SET biliet = ? WHERE ID = ?');
	$req->execute(array($_POST['bilietM'], $_POST['id']));
}


// assignation des droits d'administrateur niveau 1 
if(isset($_POST['assignAdmin']))
{
	$req = $bdd->prepare('UPDATE logs SET administrateur = 1 WHERE ID = ?');
	$req->execute(array($_POST['assignAdmin']));
	$idAd = $_POST['assignAdmin'];
}
// retrait des droits d'administration
if(isset($_POST['unAssignAdmin']))
{
	$req = $bdd->prepare('UPDATE logs SET administrateur = 0 WHERE ID = ?');
	$req->execute(array($_POST['unAssignAdmin']));
	$idAd = $_POST['unAssignAdmin'];	
}

?>
