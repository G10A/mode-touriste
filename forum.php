<?php
	session_start();

	$bdd = new PDO('mysql:host=localhost;dbname=test','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
<?php include("connexion.php"); ?>
<!DOCTYPE html>
<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/choixheader.php"); 
			
			$req = $bdd->prepare('SELECT * FROM forum_topic ORDER BY last_post DESC');
			$req -> execute(); 
			?>

			
			<h1 id="tuto_forum"><a href="tutoforum.php">Réglementation du forum</a></h1>

			 <p style= "font:  17pt serif">
				<?php if(isset($_SESSION['pseudo'])){ ?>
				    <a href="creertopic.php"> <input type="submit" name="topic"  value=" Créer un topic"/></a>
				<?php } ?>
			</p>

			<?php 
			while ($data = $req -> fetch()){
			?>

			<table width="1000" border="1" class="table_forum">

				<tr>

					<td> Auteur: </td>
					<td> <?php echo $data['auteur']; ?> </td> </br>

				</tr>
				<tr>

					<td> Titre: </td>
					<!-- <td> <?php //echo "<a href=\"topic.php?id_topic\">".$data['titre']."</a>"; ?> </td> REVENIR A CETTE ECRITURE SI CA MARCHE PAS-->
					<td> <?php echo '<a href="./post.php?id_topic=' , $data['id'], '">' , $data['titre'] , '</a>'; ?> </td>

				</tr>
				<tr>

					<td> Dernière réponse: </td>
					<td> <?php echo $data['last_post']; ?> </td>

				</tr>

			</table>
			<?php } ?>


			
					
			
		</div>
				
			<?php include("Base/footer.php"); ?>
			

	</body>
</html>