<?php session_start(); ?>
<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
	<body>

		
			
		<?php 
			if(isset($_SESSION['pseudo'])){

				 include("Base/choixheader.php");
				
				$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 
				$reponse = $bdd->prepare('SELECT * FROM inscrits WHERE pseudo = ?');
				$reponse -> execute(array($_SESSION['pseudo']));

				$donnees = $reponse->fetch();
		?>

<div id="contenuprincipal">
			<div id="profil">
			 	<section id="profil_gauche"
			 		<h1>Votre profil</h1>
					<table>
					 	<tr>
						<td> Nom : </td>
						<td><?php echo $donnees['nom'];?></td> </br>
						</tr>
						<tr>
						<td>Prénom : </td>
						<td><?php echo $donnees['prenom'];?></td></br>
						</tr>
						<tr>
						<td>Année de naissance : </td>
						<td><?php echo $donnees['annee_de_naissance'];?></td></br>
						</tr>
						<tr>
						<td>Genre :</td>
						<td> <?php echo $donnees['sexe'];?></td></br>
						 </tr>
						 <tr>
						<td>Localité : </td>
						<td><?php echo $donnees['localite'];?></td></br>
						</tr>
						<tr>
						<td>Adresse mail : </td>
						<td><?php echo $donnees['email'];?></td></br>
						</tr>
    				</table>
				</section>

			
				

		<?php 
			$reponse = $bdd-> prepare('SELECT * FROM offre WHERE  pseudo = ?');
		 	$reponse -> execute(array($_SESSION['pseudo']));
		 	 
		?>


				<section id="profil_droit">
		<?php while ($donnees = $reponse->fetch()) 
			{  
		?>
					
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
						<td><?php echo $_SESSION['pseudo'] ;?></td></br>
						</tr>
						<td>Commentaire : </td>
						<td><?php echo $donnees['commentaire'];?></td></br>
						</tr>
            		</table>
            	</section>
            </div>
	        </div>
            <?php 
        		} 

			}
			else{
				include("Base/header_non_connecte.php");
				include("Base/menu.php");
				include("Base/profil_non_connecte.php");
			}

			 
			include("Base/footer.php"); 

			?>
		 

	</body>
</html>
