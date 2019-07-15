<?php
	include 'connexion.php';
	$user = $_POST['user'];
	$id = $_POST['id_tick'];
	$text = htmlentities($_POST['comm']);

	$req = "INSERT INTO comm VALUES (null,'".$user."',".$id.",'".$text."',0)";
	$res = $bdd->query($req);
	header('Location: ticket.php?id='.$id);
?>