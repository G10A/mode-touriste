<?php
  session_start();
?>

<!DOCTYPE html>
<html>

  <?php include("Base/head.php"); ?>
  <body>

    <div id="site">
      <?php include("Base/choixheader.php"); ?>

<?php

  if(isset($_POST['Demande'])){

  $bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	if (isset($_POST['Lieu']) && isset($_POST['poids']) && isset($_POST['prix']) && isset($_POST['quantite']) && isset($_POST['commentaire']) ){
			
			$pseudovendeur = htmlspecialchars($_POST['pseudovendeur']);
			$Lieu = htmlspecialchars($_POST['Lieu']);
			$poids = htmlspecialchars($_POST['poids']);
			$prix = htmlspecialchars($_POST['prix']);
			$quantite = htmlspecialchars($_POST['quantite']);
			$commentaire = htmlspecialchars($_POST['commentaire']);
			$pseudoacheteur = htmlspecialchars($_SESSION['pseudo']);
			$offre = htmlspecialchars($_POST['idoffre']);
			$validation="demande";


			$req=$bdd->prepare('INSERT INTO rdv (Lieu, poids, prix,  quantite, commentaire, pseudoacheteur,pseudovendeur,idoffre,Validation) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)');
			$req->execute(array($Lieu, $poids, $prix,$quantite, $commentaire, $pseudoacheteur, $pseudovendeur,$offre,$validation));

			$message = "votre demande a bien été effectué";
			
			}else {$message="Il a eu un problème, cela n'a pas pue aboutir";}
			echo $message;;

}
  ?>

  </body>
</html>