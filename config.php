<?php
	try {
    	$bdd = new PDO('mysql:host=localhost;dbname=tick&tac', 'tick', 'tac');
	} catch (PDOException $e) {
    	print $e->getMessage();
    	die();
	}
	
	$user=$_POST['pseudo'];
	$password=$_POST['pass'];

	$info = $bdd->query("SELECT * from user where user = '".$user."'");

	while($data = $info->fetch())
	{
   		if(password_verify($password, $data['mdp'])) {
   			session_start();
   			$_SESSION['user'] = $user;
       		header('Location: tous_ticket.php');
   		} else{
        	header('Location: index.php?err=true');      
       	}
    }
?>