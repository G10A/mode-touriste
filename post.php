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

			$req = $bdd -> prepare("SELECT auteur, message, post_date FROM forum_post WHERE affiliated_topic = '".$_GET['id_topic']."' ORDER BY post_date ASC");
			$req -> execute();

			if(!isset($_GET['id_topic'])){

				echo 'Sujet non défini.';
			
			} else {

				while ($data = $req -> fetch()){

				?>

				<table width="1000" border="2">

					<tr>

						<td> Auteur: </td>
						<td> <?php echo $data['auteur']; ?> </td>

					</tr>

					<tr>

						<td> Date de la réponse: </td>
						<td> <?php echo $data['post_date']; ?> </td>

					</tr>
					<tr>

						<td> Message: </td>
						<td> <?php echo nl2br(htmlspecialchars(trim($data['message']))); ?> </td>

					</tr>

				</table>
			

			<?php } 

				}

			?>

			<div>

					 <p style= "font:  17pt serif">
				    <a href="creerpost.php?id_topic=<?php echo $_GET['id_topic']; ?>"> <input type="submit" name="post"  value="Répondre"/></a>
				    </p>
			
			</div>



				<div >
			<?php include("Base/footer.php"); ?>
			</div>

	</body>
</html>