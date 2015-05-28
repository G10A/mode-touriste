<?php session_start(); ?>
<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/choixheader.php"); ?>


			<table id="lien_offre">
				<tr>
					<td><p><a href="offrelegume.php">Les Légumes</a></p></td>
					<td><p><a href="offrefruit.php">Les Fruits</a></p></td>	
				</tr>
			</table>

		</div>

			<?php include("Base/footer.php"); ?>
		</div>

	</body>
</html>
