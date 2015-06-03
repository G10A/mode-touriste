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

	

	$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


	if(isset($_POST['register_offer'])){
		if(isset($_SESSION['pseudo'])){

			if (isset($_POST['espece']) && isset($_POST['zone_de_vente']) && isset($_POST['date_du_produit']) && isset($_POST['fruit_ou_legume']) && isset($_POST['vente_ou_echange']) && isset($_POST['poids']) && isset($_POST['prix']) && isset($_POST['provenance']) && isset($_POST['quantite']) && isset($_POST['commentaire'])){
			
			
			$espece = htmlspecialchars($_POST['espece']);
			$zone_de_vente = htmlspecialchars($_POST['zone_de_vente']);
			$date_du_produit = htmlspecialchars($_POST['date_du_produit']);
			$vente_ou_echange = htmlspecialchars($_POST['vente_ou_echange']);
			$fruit_ou_legume = htmlspecialchars($_POST['fruit_ou_legume']);
			$poids = htmlspecialchars($_POST['poids']);
			$prix = htmlspecialchars($_POST['prix']);
			$provenance = htmlspecialchars($_POST['provenance']);
			$quantite = htmlspecialchars($_POST['quantite']);
			$commentaire = htmlspecialchars($_POST['commentaire']);
			$pseudo = htmlspecialchars($_SESSION['pseudo']);


			$uploaddir = 'image/'. rand(1,999);
			$uploadfile = $uploaddir .basename($_FILES['photo']['name']);
			
			echo '<pre>';
			move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile);


			$req=$bdd->prepare('INSERT INTO offre(espece, zone_de_vente, date_du_produit, poids, prix, provenance, quantite, fruit_ou_legume, vente_ou_echange, commentaire, pseudo, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
			$req->execute(array($espece, $zone_de_vente, $date_du_produit, $poids, $prix, $provenance, $quantite, $fruit_ou_legume, $vente_ou_echange, $commentaire, $pseudo, $uploadfile));



			$message_right = "votre offre a bien été déposée";
			echo $message_right;
			}
		
			else{

			$message_erreur = "Veuillez remplir tous les champs";
			echo  $message_erreur;	
			}
		} 
		else{
			$message_erreur = "Veuillez vous connecter";
			echo  $message_erreur;	

		}
	}

?>

	</body>
</html>