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
