<?php session_start(); ?>
<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
	<body>
		<div id="site">
		
			
		<?php 
			if(isset($_SESSION['pseudo'])){

				 include("Base/choixheader.php");
				
				$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

				$reponse = $bdd-> prepare('SELECT * FROM offre WHERE  pseudo = ?');
		 	$reponse -> execute(array($_SESSION['pseudo']));
		 	 
		?>

				<section class="offre_fruit_legume">
					<h1>Mes offres</h1>

		<?php while ($donnees = $reponse->fetch()) 
			{  
		?>
					<fieldset class="offre">
						<table style="margin-right:30px">
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
							<td><?php echo $_SESSION['pseudo'] ;?></td></br>
							</tr>
							<td>Commentaire : </td>
							<td><?php echo $donnees['commentaire'];?></td></br>
							</tr>
							<tr>

							<td colspan="2" style="text-align:center"><a href="modifieoffre.php?$offre=<?php echo $donnees['ID']?>">Modifier l'offre</a></td>
							</tr>
	            		</table>

	            		<div class="photo_offre">
	            			<?php
	            				$file = $donnees['photo'];
	            				
	            			?>
	            			<img src="<?php echo $file; ?>" width="100" height="100">
	            		</div>

	            			
	            			<?php include("supprimer.php")  ?>
	           
	            			<form id="supprimer_offre" method="post">
	            				<input type="hidden" name="id_offre" value="<?php echo $donnees['ID']?>"/>
	            				<input type="submit" name="supprimer_offre"  value="supprimer cette offre"/>
	            			</form>
            		</fieldset>

            	
	   
            <?php 
        		} 
        	?>
        		</section>

        	<?php
			}
			else{
				include("Base/header_non_connecte.php");
				include("Base/menu.php");
				include("Base/profil_non_connecte.php");
			}

			 
			 

			?>
		 
			<?php  include("Base/footer.php");  ?>

		</div>

		<script>
			var bouton1 = document.querySelector('#supprimer_offre');

			bouton1.addEventListener('submit', function(e){

					if(confirm("êtes vous sûr de vouloir supprimer cette offre ?")){
						alert('Votre offre a bien été supprimée');
						e.target.submit();	
					}

			}, true);

		</script>
		
	</body>
</html>


