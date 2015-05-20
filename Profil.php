<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			
		<?php 
			if(isset($_SESSION['pseudo'])){
				
				$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

				include("Base/header_connecte.php");
				include("Base/menu.php");
				$reponse = $bdd->query('SELECT * FROM inscrits WHERE pseudo = \''.  $_SESSION['pseudo'] . "'");
				$donnees = $reponse->fetch();
				 ?>

				 <div id="contenuprincipalprofil">
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




				</div>
				<?php 

			}
			else{
				include("Base/header_non_connecte.php");
				include("Base/menu.php");
				include("Base/profil_non_connecte.php");
			}

			 
			include("Base/footer.php"); 



			

		 ?>
		 
		</div>

	</body>
</html>
