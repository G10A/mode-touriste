<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			
		<?php 
			if(isset($_SESSION['pseudo'])){

				include("Base/header_connecte.php");
				include("Base/menu.php");
				include("Base/profil_connecte.php");

			}
			else{
				include("Base/header.php");
				include("Base/menu.php");
				include("Base/profil_non_connecte.php");
			}

			 
			include("Base/footer.php"); 



			

		 ?>
		</div>

	</body>
</html>
