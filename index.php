<?php
session_start();
if (isset($_GET['deco']))
{
	if ($_GET['deco']==1)
		{
			session_destroy();
			$_SESSION =array();
			setcookie('login', '');
			setcookie('pass_hache', '');
			# code...
		}
}


 // verificaiton de la nécéssité de la page cible.php

 	include("cible.php");

 ?>
<html>
<head>
	<title>Talk</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8"></meta>
</head>

<body>

<div class="page">

	<header>
		<img class="pic" src="img/pic.png">
		<?php if(isset($_SESSION['id'])) {?>
		<div class="headerText">
		<h1>
			<p>Bienvenue <?php echo $_SESSION['pseudo']; ?></p>
			</h1>
		</div>

		<div class="headerSO">		
			<a href="http://localhost/talk/index.php?&deco=1"> Sign&nbspout </a>
		</div>
		<img src="img/gears.png" class="gears">
		
		<?php 
		}
		
		else 
		{

		?>

		<div class="headerText">
			<h1>Welcome in Talk</h1>
		</div>

			<div class="headerButton">
			<img src="img/gears.png" class="gears">
				<ul>
					<li><a href="http://localhost/talk/register.php">Register Now </a></li>
					<li><a href="http://localhost/talk/connection.php"> Connection </a></li>
				</ul>
			</div>
		
			<?php
		}

			?>
		


	</header>
										<!-- Affichage des topic -->
	
	<div class="part2"> 
		
		<aside> 
			<h1>Discussions récentes </h1>
			<div style="max-height: 300px; overflow: auto; margin: auto;">
			<ul>
				<?php
					$reponse = $bdd -> query('SELECT nom FROM topic ORDER BY id DESC LIMIT 0, 10');
 					while ($donees = $reponse -> fetch())
 			{
 				?>
				<li> 
					<a href="http://localhost/talk/index.php?topic=<?php echo$donees['nom']?>&page=1">
						<?php echo$donees['nom']?>
					</a>	
				</li>
				<?php

			}
				?>

			</ul>
			</div>
			<?php if (isset($_SESSION['pseudo'])){?> <!-- vérification de session pour permettre la création de topic -->
			<form action="http://localhost/talk/index.php?topic=<?php echo$donees['nom']?>&page=1" method="post">
				<input name="nomtopic" placeholder="nom topic" type="text">
				<input class="ajouter" type="submit" value="   ">
			</form>
			<?php } ?>
		</aside>

	<?php 
		if(isset($_GET['topic']))
		{
	?>
<!-- - - - - - - - - - - - - - - - - -Ci-dessous emplacement des posts - - - - - - - - - - - - - - - - - - -->
		<section>
			<div class="update">
				<h2><?php echo $_GET['topic'], " (",$_GET['page'],")" ?></h2>
				<div class="image">
					<img src="img/pen.png">
					<img src="img/cancel.png">
				</div>
			</div>	

				<!--Ci-dessous affichage des post depuis/vers la base de donné forum/post affichage des 5 derniers posts -->
					<?php
 				$reponse -> closeCursor();
				$reponse =$bdd -> prepare('SELECT biliet, topic, nomp, dates, ID FROM posts WHERE topic = ? ORDER BY id ');
				$reponse->execute(array($_GET['topic']));
				$count = $reponse->rowCount();
				$nb_page = $count / 5;
 				$inc = 0;
 				$aff = 0;

 				while (($donees = $reponse -> fetch()) and ($aff < 5)) #on s'assure que l'on affiche que 5 posts maximum par pages
 				
				{

					if ($inc >= ($_GET['page']-1)*5)
						
						
							
					{?>
						<article>
						<div class="partie1">
							<img src="img/pic2.png">
							<p><?php echo $donees['nomp'];?></p>    <!-- affichage des donnes de posts (message, nom, date) -->
							<p><?php echo $donees['dates'];?> </p>	
							<?php 
							if (isset($_SESSION['pseudo'])) 
							{
								if ($donees['nomp']==$_SESSION['pseudo']) 
								{
								?>
								<form action="http://localhost/talk/index.php?topic=<?php echo($_GET['topic'])?>&page=1" method="post">
								<input type="hidden" name="suppression" value="<?php echo $donees['ID'];?>">
								<input type="submit" value="supprimer" >
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
			<?php if (isset($_SESSION['pseudo']))
			{ ?>
					<form action="http://localhost/talk/index.php?topic=<?php echo($_GET['topic'])?>&page=1" method="post">
						<textarea name="biliet" rows="10" placeholder="Write here..." type="text"></textarea>
						<input class="btn"  type="submit" value="Submit">
					</form>
			<?php
			}
			?>
				<!-- affichage des pages 1.2.3...... -->
				<?php 
				$page = 1;
				while ($nb_page >0) 
				{ ?>
 
			<a href="http://localhost/talk/index.php?topic=<?php echo($_GET['topic'])?>&page=<?php echo($page)?>"> 
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

	else
	{
	?>
		<section class="poster">
			<div>
				<img class="minions" src="url.jpg">
				<p>Choisissez un des topic à votre gauche </p>
			</div>
		</section>
	<?php	
	}
	?>

	</div>

</div>

</body>
</html>