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
	<title>Connection</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style.css" />
</head>
<body class="body">
	<section class="sect">
		<h1 class="title">Connection</h1>
	<ul class="liste">
		<form action="http://localhost/Talk/index.php" method="post">
			<li><label>
				<input name="pseudoc" placeholder ="pseudo" type="text"></br></br>
			</label></li>
			<li><label>
				<input name="mdpc" placeholder ="mot de passe" type="password"></br></br>
			</label></li>
			<li>
				<input type="image" src="img/green.jpg" value="Envoyer" class="sub" >
			</li>
		</form>
	</ul>
		<div><img src="img/minion.jpg" class="minion"></div>
	</section>
</body>
</html>













