<?php


//connexion



//  ci dessous ligne des logs
require_once ('addresse.php');

if(isset($_POST['mdp']))
{

	if(($_POST['mdp'])==($_POST['vmdp']))
	{
		$countmdp =strlen($_POST['mdp']);
		$countpseudo =strlen($_POST['pseudo']);
		function testchar ($char, $pos = 0)
					{				
						$test=strpos($_POST['mail'], $char, $pos);
						return $test;
					}
		function testmail ()
		{
			
			if ((testchar('@')!== FALSE) && (testchar('.')!== FALSE)) 
			{
				if (testchar('.') < (testchar('@')+3))
				{
					if(testchar('.', testchar('@')+3)!== false)
					{
						$testPosRes = true;
					}
					else
					{
						$testPosRes = false;
					}

				}
				else
				{
					$testPosRes = true;
				}		
			}
			else
				{
					$testPosRes = false;
				}

			return $testPosRes;
		}
		if ($countmdp >= 8 && $countpseudo >= 6) 
		{
			
		

			$req = $bdd->prepare('SELECT pseudos, mail FROM logs WHERE pseudos = ? OR mail = ?');

			$req->execute(array($_POST['pseudo'], $_POST['mail']));
			$count = $req->rowCount(); 
			if ($count == 0)
			{
				if (testmail() === true)
				{
				$pass_hache = sha1($_POST['mdp']);
				$req =$bdd->prepare('INSERT INTO logs(pseudos, mdp, mail) Values(:pseudos, :mdp, :mail)');
				$req->execute(array(

				'pseudos' => $_POST['pseudo'],
				'mdp' => $pass_hache,
				'mail'=> $_POST['mail']
				));
				$req->closeCursor();
				header('location: connexion.php?enregistre=1');
				}
				else
				{
					header("location: register.php?mailE=0");
				}
			}
			else 
			{
				$req = $bdd->prepare('SELECT pseudos, mail FROM logs WHERE pseudos = ? ');
				$req->execute(array($_POST['pseudo']));
				$count = $req->rowCount(); 
					if ($count == 1)
					{
						header('location: register.php?pseudoU=0');	
					}
					else
					{
						header('location: register.php?mailU=0');
					}
				$req->closeCursor();
			}
		}
		else if ($countpseudo < 6) 
		{
			header('location: register.php?pseudo=0');
		}
		else
		{
			header('location: register.php?mdp=0');
		}
		
	}
	else
	{
		header('location: register.php?mdpF=0');
	}
}

if(isset($_POST['mdpc']))
{
		$pass_hache = sha1($_POST['mdpc']);
		$req = $bdd->prepare('SELECT id, administrateur, mail FROM logs WHERE pseudos = :pseudos AND mdp = :mdp');
		$req->execute(array(
		'pseudos' => $_POST['pseudoc'],
		'mdp' => $pass_hache,
		));

	$resultat = $req->fetch();

	if (!$resultat)

	{		
	    header('location: connexion.php?error=false ');
	}

	else
	{
	    $_SESSION['id'] = $resultat['id'];
	    $_SESSION['pseudo'] = $_POST['pseudoc'];
	    $_SESSION['administrateur'] = $resultat['administrateur'];
	    $_SESSION['email'] = $resultat['mail'];
	}

	$req->closeCursor();
}
 ?>