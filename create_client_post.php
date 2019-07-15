<?php

include 'connexion.php';
$requete = "INSERT INTO client VALUES (null,'".htmlentities($_POST['nom'])."', 0)";
	echo $requete;
	$bdd->query($requete);
	header('Location: tous_client.php');
?>