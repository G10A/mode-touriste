<?php
	session_start();
?>

<!DOCTYPE html>

<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">

			<?php

		$bdd = new PDO('mysql:host=localhost;dbname=g10a','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

				$connecte = false;

				//On verifie la demande de connexion
				if(isset($_POST['connexion'])){

					//On vérifie l'existence du pseudo et du mot de passe
					if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['MDP']) && !empty($_POST['MDP'])){

						//on effectue la requete
						$req=$bdd->prepare('SELECT *, COUNT(pseudo) AS nombre_pseudo FROM inscrits WHERE pseudo = ?');
					    $req->execute(array($_POST['pseudo']));
					    $donnees = $req->fetch();

					    //on regarde si le pseudo existe
					    if($donnees['nombre_pseudo'] == 1){

					    	//On regarde si le mot de passe est le bon
							if($donnees['mot_de_passe'] == $_POST['MDP']){	

									$connecte = true;
									$message_final = "Vous êtes désormais connecté";
							}
							else{
								
								$message_final = "Votre mot de passe est invalide";
							}
						}
						else{

							$message_final = "Veuillez entrer un pseudo valide";
						}

						//On termine la requete
						$req->closeCursor();
					
					}
					else{
						$message_final = "Veuillez remplir les deux champs";

					}
				}


				//on affiche le header selon que l'utilisateur est connecté ou non.
				if($connecte == true){

					$_SESSION['pseudo'] = $_POST['pseudo'];

					include("Base/header_connecte.php");
				}
				else{
					include("Base/header.php");
				}

				include("Base/menu.php");


				//On affiche le message qui convient
				echo '<p style="text-align:center;">'.$message_final.'</p>';
			?>



	</body>
</html>