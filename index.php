<?php
 try
 {
    $bdd = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }

 catch (Exception $e)
 {
        die('Erreur : ' . $e->getMessage());
 }

 if(isset($_POST["biliet"]))
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
		<div class="headerButton">
			<a href=""><img src="img/gears.png"></a>
			<a href=""><p>Sign out</p></a>
		</div>
	</header>

	<div>
		
		<aside>
			<h1>Discussions récentes</h1>
			<ul>
				<li>PHP, à vous de gérer!</li>
				<li>PHP, à vous de gérer!</li>
				<li>PHP, à vous de gérer!</li>
				<li>PHP, à vous de gérer!</li>
			</ul>
			<input class="ajouter" type="submit" value="">
		</aside>


		<section>
			<div class="update">
				<h2>Update site</h2>
				<img src="img/pen.png">
				<img src="img/cancel.png">
			</div>	


					<?php
				$reponse =$bdd -> query('SELECT biliet FROM posts ORDER BY id DESC LIMIT 0, 5');
 				while ($donees = $reponse -> fetch())
 				
				{
					?>
			<article>
				<div class="partie1">
					<img src="img/pic2.png">
					<p>Nom</p>
					<p>heure </p>
				</div>
				<div class="partie2">
					<p> <?php echo $donees['biliet']; ?> </p>
				</div>	
			</article>
				
					<?php

				}
					?>




			

			<article>
				<form action="index.php" method="post">
					<textarea name="biliet" rows="10" placeholder="Write here..." type="text"></textarea>
					<input class="btn"  type="submit" value="Submit">
				</form>
			</article>	
		</section>

	</div>

</div>

</body>
</html>