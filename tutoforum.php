<?php
	session_start();
?>

<!DOCTYPE html>

<html>
	<?php include("Base/head.php"); ?>
	<body>

		<div id="site">
			<?php include("Base/choixheader.php"); ?>
		</div> 

			<div>
					 <p style= "font:  17pt serif">
				     <a href="creertopic.php"><input type="submit" name="connexion"  value=" Créer un topic"/></a>
				    </p>
			</div>

		<div id="contenuprincipalf">
			<h1>Réglementation du forum</h1>

			<h2>Regarder le forum</h2>
			Il n'est pas nécessaire d'être connecter pour regarder les différents topic poster par les utilisateurs. Vous pouvez cependant avertir les administrateurs du forum d'un contenue non 
			adapté au site via le bouton signaler.

			<h2>Pour creér un topic</h2>
			Il faut avant regarder si le topic que vous voulez créer n'existe pas déjà. En effet, dans la plupart des cas, on peut trouver la réponse rien qu'avec l'outil qu'est la barre recherche.
			N'oubliez pas de vous connecter (et s'il le faut vous inscrire) car cette fonction n'est disponible qu'aux utilisateurs du site.
			Il faut ensuite rentrer le nom du topic et son contenue.
			N'oubliez pas de faire attention à l'orthographe et tenir un language respectueux sous peine d'être bannie.

			<h2>Commenter</h2>
			Via le bouton commenter, vous pouvez commenter les différents topic. Cependant les règles d'usage sont les mêmes que pour la création d'un topic.
		</div>
		


			<?php include("Base/footer.php"); ?>
		</div>

	</body>
</html>