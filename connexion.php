<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=tick&tac;charset=utf8', 'tick', 'tac');
	} catch (PDOException $e) {
		print "Erreur !: " . $e->getMessage() . "<br/>";
    	die();
	}
?>