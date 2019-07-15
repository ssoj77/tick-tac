<?php
	include 'connexion.php';
	session_start();
	$prenom = htmlentities($_POST['prenom']);
	$nom = htmlentities($_POST['nom']);
	$mail = htmlentities($_POST['mail']);
	$requette = "UPDATE user SET prenom = '".$prenom."', nom = '".$nom."', mail = '".$mail."'";
	if ($_POST['pass'] != "") {
		$pass = password_hash(htmlentities($_POST['pass']), PASSWORD_DEFAULT);
		$requette = $requette.", pass = '".$pass."'";
	}
	$requette = $requette.", profil = '".$_POST['profil']."' WHERE user = '".$_SESSION['user']."'";
	$bdd->query($requette);
	header('Location: profil.php');
?>