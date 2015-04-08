<?php

if (isset($_GET['error'])) 
{
	header("HTTP/1.0 401 Unauthorized");	
}
require_once("addresse.php");
include("traduction.php");
include("cible.php");

 ?> 


<html>
<head>
	<title><?php echo $connexion; ?></title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style.css" />
</head>
<body class="body">
	<section class="sect">
		<h1 class="title"><?php echo $connexion; ?></h1>
	<ul class="liste">

		<?php 
		if (isset($_GET['error'])) 
		{ 
			?>

			<p class="erreurMdp"><?php echo $erreurConnect; ?></p>

		<?php 
		}
		elseif (isset($_GET['enregistre'])) 
		{ 
		?>
			<p class="enregistre"><?php echo $enregistrementReussi; ?></p>

		<?php
		}	
		?>


		<form action="index.php" method="post">
			<li><label>
				<input name="pseudoc" placeholder ="<?php echo $pseudo; ?>" type="text"></br></br>
			</label></li>
			<li><label>
				<input name="mdpc" placeholder ="<?php echo $motDePasse; ?>" type="password"></br></br>
			</label></li>
			<li>
				<input type="image" src="img/green.jpg" value="Envoyer" class="sub" >
			</li>
		</form>
	</ul>
		<div><img src="img/minion.jpg" class="minion"></div>
		<p class="retourTxt"><?php echo $retourAc; ?></p>
		<form action="index.php">
			<input type="image" src="img/BtnRetour.jpg" value="Envoyer" class="retour">
		</form>
	</section>
</body>
</html>













