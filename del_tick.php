<?php
	include 'connexion.php';
	$res = $bdd->query("UPDATE ticket SET del = 1 WHERE id=".$_GET['id']);
	header('Location : tous_ticket.php');
?>