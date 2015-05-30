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
 
				$reponse = $bdd->prepare('SELECT * FROM inscrits WHERE pseudo = ?');
				$reponse -> execute(array($_SESSION['pseudo']));

				$donnees = $reponse->fetch();
		?>


				<div id="contenuprincipal">

					<section id="profil">
						<fieldset id="profil_info">
							<h1>Mon Profil</h1>	
							<table>
								<tbody>
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
									<td><?php echo $donnees['sexe'];?></td></br>
									 </tr>
									 <tr>
									<td>Localité : </td>
									<td><?php echo $donnees['localite'];?></td></br>
									</tr>
									<tr>
									<td>Adresse mail : </td>
									<td><?php echo $donnees['email'];?></td></br>
									</tr>
									<tr>
									<td colspan="2" style="text-align:center"><a href="modifieprofil.php?$offre=<?php echo $donnees['pseudo']?>">Modifier son profil</a></td>
									</tr>
								</tbody>
		    				</table>
	    				</fieldset>
	    			</section>


			
				

		
        	<?php
			}
			else{
				include("Base/header_non_connecte.php");
				include("Base/menu.php");
				include("Base/profil_non_connecte.php");
			}

			 
			 

			?>
		 </div>
			<?php  include("Base/footer.php");  ?>

		</div>	
	</body>
</html>
