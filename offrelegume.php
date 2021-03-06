<?php session_start(); ?>
<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/choixheader.php"); 

			$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
			$reponse = $bdd->prepare('SELECT * FROM offre WHERE fruit_ou_legume=?');
			$reponse -> execute(array('legume'));
				 ?>


				<table id="table_produit"> 
					<tr>
						<td><p class="lien_produit"><a href="offrelegume.php">Les Légumes</a></p></td>	
					</tr> 
					<tr>
						<td><p class="lien_produit"><a href="offrefruit.php">Les Fruits</a></p></td>
					</tr>
				</table>

				<section class="offre_fruit_legume">
					<h1>Les offres de légumes</h1>
							
				<?php while ($donnees = $reponse->fetch())
				{ ?>
				
				<fieldset class="offre">
				<table>
					
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
					<td><a href="rdv.php?$offre=<?php echo $donnees['ID']?>">Contacter le vendeur</a> </td>
					</tr>
            	</table>

            	<div class="photo_offre">
	            			<?php
	            				$file = $donnees['photo'];	
	            			?>
	            			<img src="<?php echo $file; ?>" width="100" height="100">
	            </div>

            	</fieldset>

            	
            	<?php } ?>

            	</section>	

			<?php include("Base/footer.php"); ?>
		</div>

	</body>
</html>
