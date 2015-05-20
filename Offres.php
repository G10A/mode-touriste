<?php session_start(); ?>
<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/choixheader.php"); ?>




			<div id="contenuprincipalf">
				<table>
					<tr>
				<td><a href="offrefruit.php"><h1>Fruit</h1></a></td>
				<td><a href="offrelegume.php"><h1>Legume</h1></a></td>
					</tr>
				</table>




			</div>

			<?php include("Base/footer.php"); ?>
		</div>

	</body>
</html>
