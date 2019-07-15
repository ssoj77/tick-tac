<?php
	session_start();
	include 'connexion.php';

	$nom = htmlentities($_POST['nom']);
	$desc = htmlentities($_POST['desc']);
	$app = htmlentities($_POST['app']);
	$requette = "INSERT INTO ticket VALUES (null,'".$nom."','".$desc."',1,'".$app."',";
	if ($_POST['r7'] != '')
		$requette = $requette."'".$_POST['r7']."',";
	else
		$requette = $requette."null,";
	if ($_POST['mep'] != '') {
		$requette = $requette."'".$_POST['mep']."',";
	} else {
		$requette = $requette."null,";
	}
	$requette = $requette."'".$_SESSION['user']."',";
	$requette = $requette."'".$_POST['resp']."',";
	$requette = $requette."CURRENT_TIMESTAMP,CURRENT_TIMESTAMP,0)";
	echo $requette;
	$bdd->query($requette);
	header('Location: tous_ticket.php');
?>