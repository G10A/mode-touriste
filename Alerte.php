<?php session_start(); ?>
<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
	<?php include("supprimer.php")  ?>
	<body>
		<div id="site">	

				<?php if(isset($_SESSION['pseudo'])){
					include("Base/choixheader.php");

					$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
					?>
            <div id="contenuprincipal">

					<h1>Vos demandes </h1></br>

					<?php 

					$req = $bdd -> query("SELECT * FROM rdv WHERE pseudoacheteur = '".$_SESSION['pseudo']."'");
					$req -> execute();

					while($data = $req -> fetch()){

					?>

					<table width="1000" border="1">

						<tr>

							<td> Vendeur: </td>
							<td> <?php echo $data['pseudovendeur']; ?> </td>

						</tr>
						<tr>

							<td> Lieu de l'échange: </td>
							<td> <?php echo $data['Lieu']; ?> </td>

						</tr>
						<tr>

							<td> Prix: </td>
							<td> <?php echo $data['prix']; ?> </td>

						</tr>
						<tr>

							<td> Poids: </td>
							<td> <?php echo $data['poids']; ?> </td>

						</tr>
						<tr>

							<td> Quantité: </td>
							<td> <?php echo $data['quantite']; ?> </td>

						</tr>
						<tr>

							<td> Votre commentaire: </td>
							<td> <?php echo $data['commentaire']; ?> </td>

						</tr>

					</table>
					
					<?php

					}

					?>

					<h1> Vos rendez-vous </h1>




 				


							<?php }else{
				include("Base/header_non_connecte.php");
				include("Base/menu.php");
				include("Base/profil_non_connecte.php");
			}?>

			</div>	
					

		</div>
		<?php include("Base/footer.php"); ?>
	</body>
</html>
