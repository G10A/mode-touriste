<?php
	session_start();
?>

<!DOCTYPE html>

<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/header.php"); ?>
			<?php include("Base/menu.php"); ?>

			<?php

		$bdd = new PDO('mysql:host=localhost;dbname=g10a','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


				//On verifie la demande de connexion
				if(isset($_POST['connexion'])){

					//On vérifie l'existence du pseudo et du mot de passe
					if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['MDP']) && !empty($_POST['MDP'])){

						//on effectue la requete
						$req=$bdd->prepare('SELECT COUNT(pseudo) AS nombre_pseudo, pseudo, mot_de_passe FROM inscrits WHERE pseudo = ?');
					    $req->execute(array($_POST['pseudo']));
					    $donnees = $req->fetch();

					    //on regarde si le pseudo existe
					    if($donnees['nombre_pseudo'] == 1){

					    	//On regarde si le mot de passe est le bon
							if($donnees['mot_de_passe'] == $_POST['MDP']){	

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

				//On affiche le message qui convient
				echo $message_final;

			?>



	</body>
</html>