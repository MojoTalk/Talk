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



 try
 {
    $bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }

 catch (Exception $e)
 {
        die('Erreur : ' . $e->getMessage());
 }
 // verificaiton de la nécéssité de la page cible.php
 if(isset($_POST['biliet'])||isset($_POST['nomtopic'])||isset($_POST['pseudoc'])) 
 	{
 	include("cible.php");
 	}
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
		<div class="headerText">
			<h1>Welcome in Talk</h1>
			<h2>Mothafucka</h2>
		</div>
		<?php 
		if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){ // verification de l'existence d'informations de session
			?>
			<div class="headerButton">
			<a href=""><img src="img/gears.png"></a>
			<p>Bienvenue <?php echo $_SESSION['pseudo']; ?></p>			
			<a href="http://localhost/talk/index.php?&deco=1">Sign out</a>
		</div>		
			<?php
			}
		else // si non connecté 
			{ 
			?>
				<div class="headerButton">
				<a href=""><img src="img/gears.png"></a>			
				<a href="http://localhost/talk/testlog.php">Register Now    </a>
				<a href="http://localhost/talk/connection.php">     Connection </a>

				</div>
		
			<?php
			}
			?>
		


	</header>

	<div class="part2">
		
		<aside>
			<h1>Discussions récentes <!-- <?php #echo $_GET['t']?> --></h1>
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
			<?php if (isset($_SESSION['pseudo'])){?>
			<form action="http://localhost/talk/index.php?topic=<?php echo$donees['nom']?>&page=1" method="post">
				<input name="nomtopic" placeholder="nom topic" type="text">
				<input class="ajouter" type="submit" value="   ">
			</form>
			<?php } ?>
		</aside>

	<?php if(isset($_GET['topic']))
		{
		?>
		<!--Ci-dessous emplacement des posts -->
		<section>
			<div class="update">
				<h2><?php echo $_GET['topic'], " (",$_GET['page'],")" ?></h2>
				<img src="img/pen.png">
				<img src="img/cancel.png">
			</div>	

				<!--Ci-dessous affichage des post depuis/vers la base de donné forum/post affichage des 5 derniers posts -->
					<?php
				$reponse -> closeCursor();
				$reponse =$bdd -> query('SELECT biliet, topic FROM posts ORDER BY -id ');
 				$nb_biliet = 0;
 				$nb_page=0;
 				while ($donees = $reponse -> fetch())
 				
 				{
 					if ($_GET['topic'] == $donees['topic'])
 					{
 						$nb_biliet ++;

 					}

 					
 				}
 				$nb_page = $nb_biliet / 5;

 				$reponse -> closeCursor();
				$reponse =$bdd -> query('SELECT biliet, topic, nomp FROM posts ORDER BY -id ');
 				$inc = 0;
 				$aff = 0;

 				while (($donees = $reponse -> fetch()) and ($aff < 5))
 				
				{
					if (($_GET['topic'] == $donees['topic']) AND ($inc >= ($_GET['page']-1)*5))
						
						
							
					{?>
						<article>
						<div class="partie1">
							<img src="img/pic2.png">
							<p><?php echo $donees['nomp'];?></p>

							<p>heure </p>
						</div>
						<div class="partie2">

					<p> <?php echo $donees['biliet']; ?> </p>
					
						
						</div>	
						</article>
						<?php
						$aff ++; // incrémentation pour chaque billet affiché
						
						 
					}
					else if ($_GET['topic'] == $donees['topic']) {$inc++;} // incrémentation pour chaque billet apartenant au topic
					
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
				{ 
					 ?>

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
	?>

	</div>

</div>

</body>
</html>