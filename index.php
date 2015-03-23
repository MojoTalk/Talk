<?php
session_start();
if (isset($_SESSION['pseudo'])) {
	header("HTTP/1.0 200 OK");
}
if (isset($_GET['deco']))
{
	if ($_GET['deco']==1)
		{
			session_destroy();
			$_SESSION =array();
			setcookie('login', '');
			setcookie('pass_hache', '');
		}
}
$address ='localhost';

 ?>
<html>
<head>
	<title>Talk</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8"></meta>
</head>

<body>
<?php
	include("traduction.php");
 	include("cible.php"); // Emplacement du traitement de la base de données 
 ?>
<div class="page">

	<header>
		<?php if(isset($_SESSION['id']))
		{ 
		?>
		<img class="pic" src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $_SESSION['email'] ) ) );?>.png">
		<?php 
		}
		else 
			{
				
			?>

				<img class="pic" src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( "defaut" ) ) );?>.png">
			<?php
			}
		if(isset($_SESSION['id']))  //vérification du statut connecté
			{?>
			<div class="headerText">
				<h1>
					<p><?php echo $bonjour; ?> <?php echo $_SESSION['pseudo']; ?></p>
				</h1>
			</div>

			<div class="headerSO">		
				<a href="http://<?php echo $address ; ?>/talk/index.php?&deco=1"> <?php echo $seDeconnecter ?> </a>
				<a href="http://<?php echo $address ; ?>/talk/index.php"><?php echo $accueil ?></a>
			</div>
			<?php
			if ($_SESSION['administrateur'] > 0)
				{
				?>
					<a href="http://<?php echo $address ; ?>/talk/listemembre.php"><img src="img/gears.png" class="gearsAd"></a>
				<?php 
				}
			else
				{ ?>					
					<img src="img/gears.png" class="gears">						
				<?php 
				}
		 	}
		else 
		{

		?>

		<div class="headerText">
			<h1><?php echo $bonjourDc;?></h1>
		</div>

			<div class="headerButton">
			<img src="img/gears.png" class="gears">
				<ul>
					<li><a href="http://<?php echo $address ; ?>/talk/register.php"><?php echo $senregistrer ?> </a></li>
					<li><a href="http://<?php echo $address ; ?>/talk/connexion.php"> <?php echo $connexion ?> </a></li>
					<li><a href="http://<?php echo $address ; ?>/talk/index.php"><?php echo $accueil ?></a></li>
				</ul>
			</div>
		
			<?php
		}

			?>
		


	</header>
										<!-- Affichage des topic -->
	
	<div class="part2"> 
		
		<aside> 
			<h1><?php echo $discution; ?> </h1>
			<div style="max-height: 300px; overflow: auto; margin: auto;">
				<ul>
					<?php
						$reponse = $bdd -> query('SELECT nom, id, rang FROM topic ORDER BY -id ');					
	 					while ($donees = $reponse -> fetch())
	 			{
	 				?>
					<li>
						<div class="topic"> 
							<a href="http://<?php echo $address ; ?>/talk/index.php?topic=<?php echo$donees['nom']?>&page=1">
								<?php echo$donees['nom']?>
							</a>
							<?php // Suppresion d'un topic 
							if (isset($_SESSION['pseudo'])) 
								{
								if (($_SESSION['administrateur'] > 0 && $donees['rang'] < 1 ) ||($_SESSION['administrateur'] == 2))// reservé à l'admin
									{
							?>
										<form  action="http://<?php echo $address ; ?>/talk/index.php" method="post">
											<input type="hidden" name="suppressionID" value="<?php echo $donees['id'];?>">
											<input type="hidden" name="suppressionNom" value="<?php echo $donees['nom'];?>">
											<input class="suppressionT" type="image" src="img/suprimer.jpg" value="Envoyer" >
										</form>	
									<?php
									}							
								} // fin suppression
								?>

						</div>	
					</li>
					<?php

				}
					?>

				</ul>
			</div>
			<?php if (isset($_SESSION['pseudo'])){?> <!-- vérification de session pour permettre la création de topic -->
			<div class="ajouterParent">	
				<form action="http://<?php echo $address ; ?>/talk/index.php?topic=<?php echo$donees['nom']?>&page=1" method="post">
					<input name="nomtopic" placeholder="<?php echo $creerTopic ?>" type="text" maxlength="32">
					<input name="rang" type="hidden" value="<?php echo $_SESSION['administrateur'] ?>">
					<input class="ajouter" type="image" src="img/add.jpg" value="ajouter">
				</form>
			</div>		
			<?php } ?>
			<div class="recherche">
			<form action="http://<?php echo $address ; ?>/talk/index.php" class="rechercheForm" method="post">
				<input classe="rechercheChamp" style="width: 220px;" type="text" placeholder="<?php echo $recherche ?>" name="recherche">
				<input class="rechercheBtn" type="image" src="img/loupe.png" value="envoyer">
			</form>	
	</div>
		</aside>
	<?php 
		if(isset($_GET['topic'])) // si un topic est selectioné
		{
	?>
<!-- - - - - - - - - - - - - - - - - -Ci-dessous emplacement des posts - - - - - - - - - - - - - - - - - - -->
		<section>
			<div class="update">
				<h2><?php echo $_GET['topic'], " (",$_GET['page'],")" ?></h2>
			</div>	

				<!--Ci-dessous affichage des post depuis/vers la base de donné forum/post affichage des 5 derniers posts -->
									<?php
 				$reponse -> closeCursor();
				$reponse =$bdd -> prepare('SELECT * FROM posts WHERE topic = ? ORDER BY id ');
				$reponse->execute(array($_GET['topic']));
				$count = $reponse->rowCount();
				$nb_page = $count / 5;
 				$inc = 0;
 				$aff = 0;

 				while (($donees = $reponse -> fetch()) and ($aff < 5)) //on s'assure que l'on affiche que 5 posts maximum par pages
 				
				{
					$reponse2 =$bdd -> prepare('SELECT pseudos, ID, mail FROM logs WHERE ID = ? ORDER BY id ');
					$reponse2->execute(array($donees['nomp']));
					$donees2 = $reponse2->fetch();

					if ($inc >= ($_GET['page']-1)*5)
						
						
							
					{?>
						<article>
						<div class="partie1">
							<?php 
							
							?>
							<img src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $donees2['mail'] ) ) );?>.png">
							<p><?php echo $donees2['pseudos'];?></p>    <!-- affichage des donnes de posts (message, nom, date) -->
							<p><?php echo $donees['dates'];?></p>	
							<?php // suppression  et edition de messages
							if (isset($_SESSION['pseudo'])) 
							{
								if (($donees2['ID']==$_SESSION['id']) || ($_SESSION['administrateur'] == 1 && $donees['rang'] < 1) || ($_SESSION['administrateur'] == 2))
								{
								?>
									<form  action="http://<?php echo $address ; ?>/talk/index.php?topic=<?php echo($_GET['topic'])?>&page=1" method="post"> <!-- suppression -->
										<input type="hidden" name="suppression" value="<?php echo $donees['ID'];?>">
										<input class="suppression" type="image" src="img/suprimer.jpg" value="supprimer" >
									</form>
									<form action="http://<?php echo $address ; ?>/talk/index.php?topic=<?php echo($_GET['topic'])?>&page=<?php echo($_GET['page']) ?>&edit=1#ancre_1"method="post"> <!-- edition -->
										<input type="hidden" name="edit" value="<?php echo $donees['ID']; ?>">
										<input class="editer" type="image" src="img/editer.png" value="editer">
									</form>	
								<?php
								}
							}
							?>
						</div>
						<div class="partie2">

					<p> <?php echo $donees['biliet']; ?> </p>
					
						
						</div>	
						</article>
						<?php
						$aff ++; // incrémentation pour chaque billet affiché
						
						 
					}
					else {$inc++;} // incrémentation pour chaque billet apartenant au topic
					
				}?>

													<!-- ajout des post -->


			<article>
			<?php 
			if (isset($_SESSION['pseudo']))
			{
				if (isset($_GET['edit'])) // si on est en mode editer, le champ ou l'on ecrit un post est rempli par les information du post à editer
					{ 
					?>

					<form action="http://<?php echo $address ; ?>/talk/index.php?topic=<?php echo($_GET['topic'])?>&page=<?php echo($_GET['page']) ?>" method="post">
						<textarea id="ancre_1" name="bilietM" rows="10" type="text"><?php echo $message ; ?></textarea>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input class="btn"  type="submit" value="Editer">
					</form>

				 	<?php
				 	}
				else 
				{
				?>
					<form action="http://<?php echo $address ; ?>/talk/index.php?topic=<?php echo($_GET['topic'])?>&page=<?php echo($_GET['page']) ?>" method="post"> <!-- sinon champ vide -->
						<textarea name="biliet" style="max-height: 175px; min-height: 175px; min-width: 453px; max-width: 453px;" rows="10" placeholder="<?php echo $ecrire ?>" type="text"></textarea>
						<input name="rang" type="hidden" value="<?php echo $_SESSION['administrateur'] ?>">
						<input class="btn"  type="submit" value="Submit">
					</form>

				<?php
				}
			}
			?>
				<!-- affichage des pages 1.2.3...... -->
				<?php 
				$page = 1;
				while ($nb_page >0) 
				{ ?>
 
			<a href="http://<?php echo $address ; ?>/talk/index.php?topic=<?php echo($_GET['topic'])?>&page=<?php echo($page)?>"> 
				<?php echo($page),'/'?>  
			</a>
				
				<?php
				$nb_page -- ;
				$page++;

				} ?>

			</article>	
		</section>
	<?php $reponse -> closeCursor();
	}
	elseif (isset($_POST['recherche'])) 
	{
	?>
		<section class="posterRech">
		<div class="topicTrouve">
	<?php


		$reponse = $bdd -> query('SELECT nom FROM topic ORDER BY id ');
		$rechercheReussie = 0;
		$tabRech = array();				
	 	while ($donees = $reponse -> fetch())
		{
			if ($_POST['recherche'] != "")
			{
				$valeur = strpos($donees['nom'], $_POST['recherche']);			
				if(!($valeur===FALSE))
				{
					$rechercheReussie ++;
					$tabRech[$rechercheReussie]=$donees['nom'];
					
				}
			}
		}
		
		?>
		</div>
		<?php
		if ($rechercheReussie > 0) 
		{ ?>
			<div class="resultatRech"> 
					<p><?php echo $rechercheReussie, " résultats trouvé"; ?></p>
				</div> <?php
			foreach ($tabRech as $key => $value)  
				{
					?><a href="http://<?php echo $address ; ?>/talk/index.php?topic=<?php echo $value ;?>&page=1"> 
				<?php echo $value;?></a></br> <?php
			# code...
		}
			
		}
		else
		{
			?>
				<div class="resultatRech">
					<p><?php echo "aucun résultat trouvé"; ?></p>
				</div>
			<?php
		}
		?>
		</section>
		<?php
	}

	else // accueil (pas de topic sélectioné)
	{
	?>
		<section class="poster"> <!-- Poster de droite sur l'accueil uniquement (disparait si on clique sur un topic) -->
			<div>
				<img class="minions" src="img/url.jpg">
				<?php
				if (isset($_GET['nomTopicUtilise'])) 
				{ 
				?>
					<div class="topicUtilise">
						<p><?php echo $erreurTopic ?></p>
					</div>
				<?php
				}
				else {
				?>
				<p><?php echo $choix ?></p>
				<?php } ?>
			</div>
		</section>
	<?php	
	}
	?>

	</div>
	
</div>
</body>
</html>






