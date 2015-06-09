<?php

	session_start();

	$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

?>
<?php 

	//Initialisation des variables dont on aura besoin dans le code php
	$error = FALSE;
	$found = FALSE;

	//On regarde que la barre de recherche a bien été remplie
	if(!isset($_POST['the_search']) || empty($_POST['the_search'])){

		$error = TRUE;
		$errorMSG = 'Aucun mot clef n\'a été écrit!';

	} else {

		//On regarde que le mot-clef ne dépasse pas 25 lettres
		if(strlen($_POST['the_search']) > 25){

			$error = TRUE;
			$errorMSG = 'Mot-clef trop long!';

		} else {

			$found = TRUE;

		}

	}



?>

<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/choixheader.php"); ?> 
			
			

			<div id="contenuprincipalf">

				<h3> Offres correspondantes au mot-clef "<?php echo $_POST['the_search']; ?>" </h3>

				<?php

				if($found){		
				
					$search = $_POST['the_search'];

					//On commence la chaîne de requetes pour trouver le mot-clef dans les tables

					//requête sur la table offres
					$req = $bdd -> prepare("SELECT espece, zone_de_vente, commentaire FROM offre WHERE espece LIKE '%$search%' OR commentaire LIKE '%$search%' OR zone_de_vente LIKE '%$search%' ORDER BY espece DESC");
					$req -> execute(); 

					while ($data = $req -> fetch()){
				
				?>

					<table width="750" border="1">

						<tr>

							<td> Espece: </td>
							<td> <?php echo $data['espece']; ?> </td>

						</tr>
						<tr>

							<td> Zone de Vente: </td>
							<td> <?php echo $data['zone_de_vente'] ?> </td>

						</tr>
						<tr>

							<td> Commentaire: </td>
							<td> <?php echo $data['commentaire']; ?> </td> </br>

						</tr>

					</table>
			
				<?php 

					}

				?>

				<h3> Inscrits correspondants au mot-clef "<?php echo $_POST['the_search']; ?>" </h3>


				<?php

					//Requête sur la table inscrits
					$req2 = $bdd -> prepare("SELECT pseudo FROM inscrits WHERE pseudo LIKE '%$search%' ORDER BY pseudo DESC");
					$req2 -> execute();

					while($data2 = $req2 -> fetch()){

				?>
				
					<table width="750" border="1">

						<tr>

							<td> Pseudonyme: </td>
							<td> <?php echo $data2['pseudo']; ?> </td> </br>

						</tr>

					</table>

				<?php

					}

				?>

				<h3> Topics correspondants au mot-clef "<?php echo $_POST['the_search']; ?>" </h3>

				<?php

					//requête sur la table des topics
					$req3 = $bdd -> prepare("SELECT id, titre FROM forum_topic WHERE titre LIKE '%$search%' ORDER BY titre DESC");
					$req3 -> execute();

					while($data3 = $req3 -> fetch()){

				?>

					<table width="750" border="1">

						<tr>

							<td> Titre: </td>
							<td> <?php echo '<a href="./post.php?id_topic=' , $data3['id'], '">' , $data3['titre'] , '</a>'; ?> </td> </br>

						</tr>

					</table>

				<?php

					}

				?>

				<h3> Posts correspondants au mot-clef "<?php echo $_POST['the_search']; ?>" </h3>

				<?php

					//requête sur la table des posts
					$req4 = $bdd -> prepare("SELECT message, affiliated_topic FROM forum_post WHERE message LIKE '%$search%' ORDER BY message DESC");
					$req4 -> execute();

					$data4 = $req4 -> fetch();

					//On regarde dans quel topic le post est écrit
					$req5 = $bdd -> prepare("SELECT id, titre FROM forum_topic WHERE id = '".$data4['affiliated_topic']."' ORDER BY titre DESC");
					$req5 -> execute();	

					while($data5 = $req5 -> fetch()){

				?>

					<table width="750" border="1">

						<tr>

							<td> Message: </td>
							<td> <?php echo $data4['message']; ?> </td>

						</tr>
						<tr>

							<td> Titre du topic: </td>
							<td> <?php echo '<a href="./post.php?id_topic=' , $data5['id'], '">' , $data5['titre'] , '</a>'; ?> </td> </br>

						</tr>

					</table>

				<?php

					}

				} else {

					echo $errorMSG;
			
				}
				
				?>

			</div>

			<div >
				
				<?php include("Base/footer.php"); ?>
			
			</div>

	</body>

</html>