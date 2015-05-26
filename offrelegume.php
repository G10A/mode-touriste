<?php session_start(); ?>
<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/choixheader.php"); 

			$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
			$reponse = $bdd->query('SELECT * FROM offre WHERE fruit_ou_legume=\'legume\' ');
				 ?>



							
				<?php while ($donnees = $reponse->fetch())
				{ ?>
				<div id="contenuprincipal">
				            	<table id="offre">
			 	<tr>
				<td> Espèce: </td>
				<td><?php echo $donnees['espece'];?></td> </br>
				</tr>
				<tr>
				<td>Zone de vente : </td>
				<td><?php echo $donnees['zone_de_vente'];?></td></br>
				</tr>
				<tr>
				<td>Date du produit : </td>
				<td><?php echo $donnees['date_du_produit'];?></td></br>
				</tr>
				<tr>
				<td>Poid :</td>
				<td> <?php echo $donnees['poids'];?></td></br>
				 </tr>
				 <tr>
				<td>Prix : </td>
				<td><?php echo $donnees['prix'];?></td></br>
				</tr>
				<tr>
				<td>Provenance : </td>
				<td><?php echo $donnees['provenance'];?></td></br>
				</tr>
				<td>Quantité : </td>
				<td><?php echo $donnees['quantite'];?></td></br>
				</tr>
				<td>Type de transaction : </td>
				<td><?php echo $donnees['vente_ou_echange'];?></td></br>
				</tr>
				<td>Vendeur : </td>
				<td><?php echo $donnees['pseudo'];?></td></br>
				</tr>
				<td>Commentaire : </td>
				<td><?php echo $donnees['commentaire'];?></td></br>
				</tr>
							<tr>
					<td>Contacter le vendeur :<?php 
									$repons = $bdd->prepare('SELECT * FROM inscrits WHERE pseudo=? ');
									$repons -> execute(array($donnees['pseudo']));
									$donne = $repons->fetch();
									echo $donne['email'];?></td>
				</tr>

            	</table>
            	</div>
            	<?php } ?>

			<?php include("Base/footer.php"); ?>
		</div>

	</body>
</html>
