<?php

session_start();



include ('cible.php');
 			
				$reponse = $bdd -> prepare('SELECT * FROM posts WHERE topic = ? ORDER BY id ');
				$reponse->execute(array($_POST['topic']));
				$count = $reponse->rowCount();
				$nb_page = $count / 5;
 				$inc = 0;
 				$aff = 0;
 				?>

<div id="rafraichissement">

 				<?php
 				while (($donees = $reponse -> fetch()) and ($aff < 5)) //on s'assure que l'on affiche que 5 posts maximum par pages
 				
				{
					$reponse2 =$bdd -> prepare('SELECT pseudos, ID, mail FROM logs WHERE ID = ? ORDER BY id ');
					$reponse2->execute(array($donees['nomp']));
					$donees2 = $reponse2->fetch();

					if ($inc >= ($_POST['page']-1)*5)
						
						
							
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
									<form  action="index.php?topic=<?php echo($_POST['topic'])?>&page=1" method="post"> <!-- suppression -->
										<input type="hidden" name="suppression" value="<?php echo $donees['ID'];?>">
										<input class="suppression" type="image" src="img/suprimer.jpg" value="supprimer" >
									</form>
									<form action="index.php?topic=<?php echo($_POST['topic'])?>&page=<?php echo($_POST['page']) ?>&edit=1#ancre_1"method="post"> <!-- edition -->
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
					
				}

				$page = 1;
				while ($nb_page >0) 
				{ ?>
 
			<a href="index.php?topic=<?php echo($_POST['topic'])?>&page=<?php echo($page)?>"> 
				<?php echo($page),'/'?>  
			</a>
				
				<?php
				$nb_page -- ;
				$page++;

				} ?>
</div>



