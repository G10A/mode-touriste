<?php
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['pseudo']) && !empty($_POST['pseudo'])) && (isset($_POST['MDP']) && !empty($_POST['MDP']))) {

	new PDO('mysql:host=localhost;dbname=g10a', 'root', 'root');

	// on teste si une entrée de la base contient ce couple pseudo / Mot de passe
	$sql = 'SELECT count(*) FROM membre WHERE pseudo="'.mysql_escape_string($_POST['pseudo']).'" AND pass_md5="'.mysql_escape_string(md5($_POST['MDP'])).'"';
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	$data = mysql_fetch_array($req);

	mysql_free_result($req);
	mysql_close();

	// si on obtient une réponse, alors l'utilisateur est un membre
	if ($data[0] == 1) {
		session_start();
		$_SESSION['pseudo'] = $_POST['pseudo'];
		header('Location: membre.php');
		exit();
	}
	// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son pseudo, soit dans son mot de passe
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
