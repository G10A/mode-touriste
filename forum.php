<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/choixheader.php"); ?>
			<?php include("Base/menu.php"); ?>

			<div>
					 <p style= "font:  17pt serif">
				    <a href="creertopic.php"> <input type="submit" name="topic"  value=" Créer un topic"/></a>
				    </p>
			</div>

			<div id="contenuprincipalf">
			<h1><a href="tutoforum.php">Réglementation du forum</a></h1>
			</div>

				<div >
			<?php include("Base/footer.php"); ?>
			</div>

	</body>
</html>
