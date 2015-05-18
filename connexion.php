<?php
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['nom_de_compte']) && !empty($_POST['nom_de_compte'])) && (isset($_POST['mot_de_passe']) && !empty($_POST['mot_de_passe']))) {

	new PDO('mysql:host=localhost;dbname=g10a', 'root', 'root');

	// on teste si une entrée de la base contient ce couple nom_de_compte / mot_de_passe
	$sql = 'SELECT count(*) FROM membre WHERE nom_de_compte="'.mysql_escape_string($_POST['nom_de_compte']).'" AND pass_md5="'.mysql_escape_string(md5($_POST['mot_de_passe'])).'"';
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	$data = mysql_fetch_array($req);

	mysql_free_result($req);
	mysql_close();

	// si on obtient une réponse, alors l'utilisateur est un membre
	if ($data[0] == 1) {
		session_start();
		$_SESSION['nom_de_compte'] = $_POST['nom_de_compte'];
		header('Location: membre.php');
		exit();
	}
	// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son nom_de_compte, soit dans son mot de passe
	elseif ($data[0] == 0) {
		$erreur = 'Compte non reconnu.';
	}
	// sinon, alors la, il y a un gros problème :)
	else {
		$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>
<html>
<head>
<title>Accueil</title>
</head>

<body>
Connexion à l'espace membre :<br />
<form action="index.php" method="post">
nom_de_compte : <input type="text" name="nom_de_compte" value="<?php if (isset($_POST['nom_de_compte'])) echo htmlentities(trim($_POST['nom_de_compte'])); ?>"><br />
Mot de passe : <input type="password" name="mot_de_passe" value="<?php if (isset($_POST['mot_de_passe'])) echo htmlentities(trim($_POST['mot_de_passe'])); ?>"><br />
<input type="submit" name="connexion" value="Connexion">
</form>
<a href="inscription.php">Vous inscrire</a>
<?php
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
</body>
</html>