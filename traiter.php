
<!DOCTYPE html>
<html>

	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/header.php"); ?>
			<?php include("Base/menu.php"); ?>

<?php

	

	$bdd = new PDO('mysql:host=localhost;dbname=g10a','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


	if(isset($_POST['register_offer'])){

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


			$req=$bdd->prepare('INSERT INTO offre(espece, zone_de_vente, date_du_produit, poids, prix, provenance, quantite, fruit_ou_legume, vente_ou_echange, commentaire) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
			$req->execute(array($espece, $zone_de_vente, $date_du_produit, $poids, $prix, $provenance, $quantite, $fruit_ou_legume, $vente_ou_echange, $commentaire));

			$message_right = "votre offre a bien été déposée";
			echo $message_right;
		}
		
			else{

			$message_erreur = "Veuillez remplir tous les champs";
			echo  $message_erreur;
		}
	}

?>

	</body>
</html>