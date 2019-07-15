<?php
	include 'connexion.php';
	$res = $bdd->query("UPDATE client SET del = 1 WHERE id=".$_GET['id']);
	header('Location: tous_client.php');
?>