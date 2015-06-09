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


<<<<<<< HEAD
					<?php 
=======
            	<h1> Vos rendez-vous </h1></br>
            	<?php $reponse = $bdd->prepare('SELECT * FROM rdv WHERE (pseudoacheteur = ? or pseudovendeur= ?) and validation=? ');
				$reponse -> execute(array($_SESSION['pseudo'],$_SESSION['pseudo'],"valide"));
>>>>>>> origin/master

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

				 while ($donnees = $reponse->fetch())
				{          $reponsse = $bdd->prepare('SELECT * FROM offre WHERE id=?');
				$reponsse -> execute(array($donnees['idoffre']));
					$donneees = $reponsse->fetch()	;?>


									<fieldset class="offre">
							<table>
					 	<tr>
						<td> Espèce: </td>
						<td><?php echo $donneees['espece'];?></td> </br>
						</tr>
						<tr>
						<td>Lieu : </td>
						<td><?php echo $donnees['Lieu'];?></td></br>
						</tr>
						<tr>
						<td>Date du produit : </td>
						<td><?php echo $donneees['date_du_produit'];?></td></br>
						</tr>
						<tr>
						<td>Poid :</td>
						<td> <?php echo $donnees['Poids'];?></td></br>
						 </tr>
						 <tr>
						<td>Prix : </td>
						<td><?php echo $donnees['Prix'];?></td></br>
						</tr>
						<tr>
						<td>Provenance : </td>
						<td><?php echo $donneees['provenance'];?></td></br>
						</tr>
						<td>Quantité : </td>
						<td><?php echo $donnees['quantite'];?></td></br>
						</tr>
						<td>Type de transaction : </td>
						<td><?php echo $donneees['vente_ou_echange'];?></td></br>
						</tr>
						<td>Vendeur : </td>
						<td><?php echo $donneees['pseudo'];?></td></br>
						</tr>
						<td>Commentaire : </td>
						<td><?php echo $donneees['commentaire'];?></td></br>
						</tr>
						<tr>
							<td> date: </td>
							<td> <?php echo $donnees['date'];?></td>
							</table>
							</fieldset>



					<?php }?>
					<h1>Les demandes concernant vos offres </h1></br>
				<?php $reponse1 = $bdd->prepare('SELECT * FROM rdv WHERE pseudovendeur = ? and  Validation=?');
				$reponse1 -> execute(array($_SESSION['pseudo'],"demande"));
			
			while ($donnees1 = $reponse1->fetch())
				{  $reponssse = $bdd->prepare('SELECT * FROM offre WHERE id=?');
				$reponssse -> execute(array($donnees1['idoffre']));
					$donneeees = $reponssse->fetch()	;?>

						<fieldset class="offre">
							<table>
					 	<tr>
						<td> Espèce: </td>
						<td><?php echo $donneeees['espece'];?></td> </br>
						</tr>
						<tr>
						<td>Lieu : </td>
						<td><?php echo $donnees1['Lieu'];?></td></br>
						</tr>
						<tr>
						<td>Date du produit : </td>
						<td><?php echo $donneeees['date_du_produit'];?></td></br>
						</tr>
						<tr>
						<td>Poid :</td>
						<td> <?php echo $donnees1['Poids'];?></td></br>
						 </tr>
						 <tr>
						<td>Prix : </td>
						<td><?php echo $donnees1['Prix'];?></td></br>
						</tr>
						<tr>
						<td>Provenance : </td>
						<td><?php echo $donneeees['provenance'];?></td></br>
						</tr>
						<td>Quantité : </td>
						<td><?php echo $donnees1['quantite'];?></td></br>
						</tr>
						<td>Type de transaction : </td>
						<td><?php echo $donneeees['vente_ou_echange'];?></td></br>
						</tr>
						<td>Vendeur : </td>
						<td><?php echo $donneeees['pseudo'];?></td></br>
						</tr>
						<td>Commentaire : </td>
						<td><?php echo $donneeees['commentaire'];?></td></br>
						</tr>
						<tr>
							<td> date: </td>
							<td> <?php echo $donnees['date'];?></td>
							</table>
							</fieldset>


				<?php }?>
				




				<h1>Vos propositions</h1>
					
				<?php $reponse2 = $bdd->prepare('SELECT * FROM rdv WHERE pseudoacheteur = ? and Validation=?');
				$reponse2 -> execute(array($_SESSION['pseudo'],"demande"));

				while ($donnees2 = $reponse2->fetch())
				{ 	 $reponssse = $bdd->prepare('SELECT * FROM offre WHERE id=?');
				$reponssse -> execute(array($donnees2['idoffre']));
					$donneeees = $reponssse->fetch()	;?>


						<fieldset class="offre">
							<table>
					 	<tr>
						<td> Espèce: </td>
						<td><?php echo $donneeees['espece'];?></td> </br>
						</tr>
						<tr>
						<td>Lieu : </td>
						<td><?php echo $donnees2['Lieu'];?></td></br>
						</tr>
						<tr>
						<td>Date du produit : </td>
						<td><?php echo $donneeees['date_du_produit'];?></td></br>
						</tr>
						<tr>
						<td>Poid :</td>
						<td> <?php echo $donnees2['Poids'];?></td></br>
						 </tr>
						 <tr>
						<td>Prix : </td>
						<td><?php echo $donnees2['Prix'];?></td></br>
						</tr>
						<tr>
						<td>Provenance : </td>
						<td><?php echo $donneeees['provenance'];?></td></br>
						</tr>
						<td>Quantité : </td>
						<td><?php echo $donnees2['quantite'];?></td></br>
						</tr>
						<td>Type de transaction : </td>
						<td><?php echo $donneeees['vente_ou_echange'];?></td></br>
						</tr>
						<td>Vendeur : </td>
						<td><?php echo $donneeees['pseudo'];?></td></br>
						</tr>
						<td>Commentaire : </td>
						<td><?php echo $donneeees['commentaire'];?></td></br>
						</tr>
						<tr>
							<td> date: </td>
							<td> <?php echo $donnees['date'];?></td>
							</table>
							</fieldset>





 				
					<?php }?>

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
