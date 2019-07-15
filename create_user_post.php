<?php

include 'connexion.php';
$requete = "INSERT INTO user VALUES ('".htmlentities($_POST['user'])."', '".password_hash(htmlentities($_POST['mdp']),PASSWORD_DEFAULT)."', '".htmlentities($_POST['prenom'])."', '"
	.htmlentities($_POST['nom'])."', '".htmlentities($_POST['mail'])."', '".htmlentities($_POST['profil'])."',0)";
	echo $requete;
	$bdd->query($requete);
	header('Location: index.php');
?>