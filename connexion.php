

<!DOCTYPE html>

<html>
	<?php include("Base/head.php"); ?>
	<body>

		

			<?php

		$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

				$connecte = false;
				$message_erreur_connexion = "          ";
				
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
							}
							else{
								
								$message_erreur_connexion = "Votre mot de passe est invalide";
							}
						}
						else{

							$message_erreur_connexion = "Veuillez entrer un pseudo valide";
						}

						//On termine la requete
						$req->closeCursor();
					
					}
					else{
						$message_erreur_connexion = "Veuillez remplir les deux champs";

					}
				}

	
				$_SESSION['erreur_connexion'] = $message_erreur_connexion;

				//on ouvre la session si on s'est connecté.
				if($connecte == true){

					$_SESSION['pseudo'] = $_POST['pseudo'];
					
				}
				
			 
			   

			?>

	</body>
</html>