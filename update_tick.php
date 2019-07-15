<?php
	include 'connexion.php';

	$app = htmlentities($_POST['app']);
	$requette = "UPDATE ticket SET etat = ".$_POST['etat'].", application='".$app."', client='".$_POST['client']."', ";
	if ($_POST['responsable'] != "null") {
		$requette = $requette."responsable='".$_POST['responsable']."', ";
	}
	if ($_POST['recette'] != "") {
		$requette = $requette."drec='".$_POST['recette']."', ";
	}
	if ($_POST['prod'] != "") {
		$requette = $requette."dmep='".$_POST['prod']."', ";
	}
	$requette = $requette."dmaj = CURRENT_TIMESTAMP where id=".$_POST['id'];
	$bdd->query($requette);
	echo $requette;
	header('Location: ticket.php?id='.$_POST['id']);
?>