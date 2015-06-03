<?php
	
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

?>
<?php 

//On met les varaibles utilisées dans le code php à false
$error = FALSE;
$success = FALSE;

//On teste si le formulaire a bien été soumis
if(isset($_POST['go'])){

	//On regarde que tout les champs ont étés remplis
	if(!isset($_POST['titre']) || !isset($_POST['message']) || empty($_POST['titre']) || empty($_POST['message'])){

		$error = TRUE;
		$errorMSG = 'Au moins un des champs est vide!';

	} else {

		//On calcule la date actuelle
		$date = date("Y-m-d H:i:s");

		//Requête d'insertion dans la table forum_topic
		$req = $bdd -> prepare('INSERT INTO forum_topic(auteur, titre, last_post) VALUES (?, ?, ?)');
        $insertion = $req -> execute(array($_SESSION['pseudo'], $_POST['titre'], $date));
	
        //On récupère l'id du topic qu'on vient de créer
        $id_topic = $bdd -> lastInsertID();
        
        //Requête d'insertion du message dans le topic créé
        $req2 = $bdd -> prepare('INSERT INTO forum_post(auteur, message, post_date, affiliated_topic) VALUES (?, ?, ?, ?)');
        $insertion2 = $req2 -> execute(array($_SESSION['pseudo'], $_POST['message'], $date, $id_topic));

        $success = TRUE;
        $successMSG = 'Votre topic a été mis en ligne!';
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
				
				<?php 

					include("Base/choixheader.php"); 

				?>

				<div id="contenuprincipalf">

					<?php

						if($error OR (!$error && !$success)){
					
					?>
				
				<h1>Création d'un topic</h1>							

				<form  action="creertopic.php" method="post">

					<table>
				
						<tr>

							<td> <label for="Auteur"> <strong> Auteur: </strong> </label> </td>
							<td> <?php echo $_SESSION['pseudo'] ?> </td> </br>

						<tr>

            				<td> <label for="titre"> <strong> Titre: </strong> </label> </td>
            				<td> <input type="text" name="titre" id="titre" maxlength="50"/> </td> </br> </br>
            	
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