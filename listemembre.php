<?php
session_start();

require_once("addresse.php");
include("traduction.php");
include("cible.php");

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8"></meta>
	<title>Liste Membres</title>
</head>
<body class="MBdy">
	<section class="suppressionLogs">
		<h1>
			<?php echo $listeMembre; ?>
		</h1>
		<div>
			<?php 
			if (isset($_POST['assignAdmin'])||isset($_POST['unAssignAdmin'])) 
			{
				$reponse = $bdd -> prepare('SELECT pseudos, ID, mail, administrateur FROM logs WHERE ID = ?');
				$reponse->execute(array($idAd));
				while ($donees = $reponse ->fetch()) 
				{
					if ($donees['administrateur'] == 1) 
					{ 
						?>
						<p class="annonce"><?php echo $utilisateur;?><?php echo $donees['pseudos'];?><?php echo $estAdmin;?></p>												
						<?php
					}
					else if ($donees['administrateur'] == 0)
					{
						?>
						<p class="annonce"><?php echo $utilisateur;?> <?php echo $donees['pseudos'];?> <?php echo $nestPlusAdmin;?></p>
						<?php
					}		 	
			 	} 			
			}
			?>
			<ul style="max-height: 300px; overflow: auto; margin: auto;">
			<?php 
				$reponse = $bdd -> query('SELECT pseudos, ID, mail, administrateur FROM logs ORDER BY ID ');					
	 			while ($donees = $reponse -> fetch())
	 			{
		 			if ($donees['administrateur'] <= 1 ) 
		 			{	 			
				    ?>
					<li class="logs">
						<p>
							<?php 
								echo 'ID : '; echo $donees['ID']; ?> </br> 
								<?php 
								echo $donees['pseudos'];
								?> </br> 
								<?php 
								echo $donees['mail']; 
								?> </br> 
								<?php 
								echo $droitAdmin, $donees['administrateur']; 
								?>
								
						</p>
						<?php 
						if ($donees['administrateur'] < 1) 
						{
							?>
							<form  action="listemembre.php" method="post">
								<input type="hidden" name="suppressionLogsID" value="<?php echo $donees['ID'];?>">
								<input type="hidden" name="suppressionLogsNom" value="<?php echo $donees['pseudos'];?>">
								<input class="suppressionLogsBtn" type="image" src="img/suprimer.jpg" value="Envoyer" >
							</form>
							<?php
						}
						if ($_SESSION['administrateur'] > 1) 
						{
							if ($donees['administrateur'] < 1) 
							{
								?>						
								<form  action="listemembre.php" method="post">
									<input type="hidden" name="assignAdmin" value="<?php echo $donees['ID'];?>">
									<input class="assignAdmin" type="image" src="img/add.jpg" value="Envoyer" >
								</form>
								<?php
							}
							else if ($donees['administrateur'] = 1)
							{
								?>
								<form  action="listemembre.php" method="post">
									<input type="hidden" name="unAssignAdmin" value="<?php echo $donees['ID'];?>">
									<input class="unAssignAdmin" type="image" src="img/annulation.jpg" value="Envoyer" >
								</form>
								<?php
							}
						}
						 
						?>
					</li>
					<?php																
					}
				}?>

			</ul>
		</div>
		<p class="retourTxt"><?php echo $retourAc;?></p>
		<form action="index.php">
			<input type="image" src="img/BtnRetour.jpg" value="Envoyer" class="retour">
		</form>



	</section>

</body>
</html>