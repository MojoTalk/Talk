<?php




 ?> 


<html>
<head>
	<title>Register</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style.css" />
</head>
<body class="body">
	<?php 
	include("traduction.php");
	?>
	<section class="sect">
		<h1 class="title"><?php echo $senregistrer; ?></h1>
		<?php 
			if (isset($_GET['pseudo'])) 
			{ 
			?>
				<p class="tropCourt"><?php echo $erreurPseudoCourt; ?></p>
			<?php
			}
			else if(isset($_GET['mdp']))
			{
			?>
				<p class="tropCourt"><?php echo $erreurMdpCourt; ?></p>
			<?php
			}
			else if(isset($_GET['mailU']))
			{
			?>
				<p class="tropCourt"><?php echo $erreurMailUse; ?></p>
			<?php
			}
			else if(isset($_GET['pseudoU']))
			{
			?>
				<p class="tropCourt"><?php echo $erreurPseudoUse; ?></p>
			<?php
			}
			else if(isset($_GET['mdpF']))
			{
			?>
				<p class="tropCourt"><?php echo $erreurMdpDif; ?></p>
			<?php
			}
			?>
	<ul class="liste">
		<form action="http://localhost/Talk/cible.php" method="post">
			<li><label for="nom">
				<input name="pseudo" placeholder ="<?php echo $pseudoEnr; ?>" type="text"></br></br>
			</label></li>
			<li><label>
				<input name="mdp" placeholder ="<?php echo $motDePasseEnr; ?>" type="password"></br></br>
			</label></li>
			<li><label>
				<input name="vmdp" placeholder ="<?php echo $motDePasseEnrConf; ?>" type="password"></br></br>
			</label></li>
			<li><label>
				<input name="mail" placeholder ="<?php echo $addresseMail; ?>" type="text"></br></br>
			</label></li>
			<li>
				<input type="image" src="img/green.jpg" value="Envoyer" class="sub" >
			</li>
		</form>
	</ul>
		<div><img src="img/mignon1.jpeg" class="mignon"></div>
		<p class="retourTxt"><?php echo $retourAc; ?></p>
		<form action="http://localhost/talk/index.php">
			<input type="image" src="img/BtnRetour.jpg" value="Envoyer" class="retour">
		</form>
	</section>

</body>
</html>













