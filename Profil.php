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
				$reponse = $bdd->query('SELECT * FROM inscrits WHERE pseudo = \'Valou\' ');
				$donnees = $reponse->fetch();
				 ?>
				 <div id="contenuprincipal">
				 Nom : 
				<?php echo $donnees['nom'];?> </br>
				Prénom : 
				<?php echo $donnees['prenom'];?>

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
