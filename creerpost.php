<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
<?php

	//On initialise les variables utilisées dans le code php
	$error = FALSE;
	$success = FALSE;

	//On vérifie que le formulaire a bien été soumis
	if(isset($_POST['go'])){

		//On vérifie que tout les champs ont bien été remplis
		if(!isset($_POST['message']) || empty($_POST['message'])){

			$error = TRUE;
			$errorMSG = 'Tout les champs n\'ont pas été remplis';

		} else {

			//On récupère la date et l'heure du post
			$date = date("Y-m-d H:i:s");

			//Insertion du message dans la bdd
			$req = $bdd -> prepare('INSERT INTO forum_post(auteur, message, post_date, affiliated_topic) VALUES (?, ?, ?, ?)');
			$ins = $req -> execute(array($_SESSION['pseudo'], $_POST['message'], $date, $_GET['id_topic']));

			//Modification de la date du dernier message posté
			$req2 = $bdd -> prepare("UPDATE forum_topic SET last_post = '".$date."' WHERE id = '".$_GET['id_topic']."'");
			$upd = $req2 -> execute();

			$success = TRUE;
			$successMSG = 'Votre message a bien été posté';

		}
	
	}

?>
<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html>

	<body>
			<?php 

				include("Base/head.php"); 

			?>
			<?php 
			
				if(isset($_SESSION['pseudo'])){

			?>

				<div id="site">
					
					<?php include("Base/choixheader.php"); ?>
				
				
				
					<div id="contenuprincipalf">
					
					<?php 

						if($error OR (!$error && !$success)){

					?>

					<h1> Nouveau post </h1>

					<form action="creerpost.php?id_topic=<?php echo $_GET['id_topic']; ?>" method="post">

						<table>

							<tr>	

								<td> <label for="auteur"> <strong> Auteur: </strong> </label> </td>
								<td> <?php echo $_SESSION['pseudo'] ?> </td> </br> </br>

							</tr>
							<tr>

								<td> <label for="message"> <strong> Message: </strong> </label> </td>
								<td> <textarea name="message" id="message" rows="10" cols="50"> </textarea> </td>

							</tr>
							<tr>

								<td> <input type="submit" name="go"  value="Poster"/> </td>	

							</tr>

						</table>

					</form>

					<?php 

						if($error){

							echo $errorMSG;

						}

					} else {

						echo $successMSG;

					}

					?>

					</div>

				</div>

				<?php 

				} else {
					
					include("Base/header_non_connecte.php");
					include("Base/menu.php");
					include("Base/profil_non_connecte.php");
				
				}

				?>
			

	</body>

</html>