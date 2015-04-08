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
	<title></title>
</head>
<body>
	<h1>Test log</h1>
	<form action="http://localhost/Talk/cible.php" method="post">
		<input name="pseudo" placeholder ="pseudo" type="text"></br></br>
		<input name="mdp" placeholder ="mot de passe" type="password"></br></br>
		<input name="vmdp" placeholder ="confirmer votre mot de passe" type="password"></br></br>
		<input name="mail" placeholder ="adresse mail" type="text"></br></br>
		<input type="submit" value="valider" >

	</form>

</body>
</html>













