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


 ?> 


<html>
<head>
	<title>Register</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style.css" />
</head>
<body class="body">
	<section class="sect">
		<h1 class="title">Register</h1>
	<ul class="liste">
		<form action="http://localhost/Talk/cible.php" method="post">
			<li><label for="nom">
				<input name="pseudo" placeholder ="pseudo" type="text"></br></br>
			</label></li>
			<li><label>
				<input name="mdp" placeholder ="mot de passe" type="password"></br></br>
			</label></li>
			<li><label>
				<input name="vmdp" placeholder ="confirmer votre mot de passe" type="password"></br></br>
			</label></li>
			<li><label>
				<input name="mail" placeholder ="adresse mail" type="text"></br></br>
			</label></li>
			<li>
				<input type="image" src="img/green.jpg" value="Envoyer" class="sub" >
			</li>
		</form>
	</ul>
		<div><img src="img/mignon1.jpeg" class="mignon"></div>
	</section>

</body>
</html>













