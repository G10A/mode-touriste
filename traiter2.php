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


	if(isset($_POST['modifie_offer'])){
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



			
			$req=$bdd->exec('UPDATE offre SET espece= espece1, zone_de_vente= zone_de_vente1, date_du_produit= date_du_produit1, poids=poids1, prix=prix1, provenance=provenance1, quantite=quantite1, fruit_ou_legume=fruit_ou_legume1, vente_ou_echange=vente_ou_echange1, commentaire= commentaire1, pseudo=pseudo1 WHERE ID=10');
			$req->execute(array(
	'espece1' => $espece,
	'zone_de_vente1' => $zone_de_vente,
	'date_du_produit1' => $date_du_produit,
	'poids1'=> $poids,
	'prix1'=>$poids,
	'provenance1'=>$provenance,
	'quantite1'=>$quantite,
	'fruit_ou_legume1'=> $fruit_ou_legume,
	'vente_ou_echange1'=>$vente_ou_echange,
	'commentaire1'=>$commentaire,
	'pseudo1'=>$pseudo

	));
			$message_right = "votre offre a bien été modifié";
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