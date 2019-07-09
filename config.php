<?php
try {
    $bdd = new PDO('mysql:host=localhost;port= 3307;dbname=tick_tac.sql', 'root', '');
  
} catch (PDOException $e) {
    print $e->getMessage();
    die();
}
$user=$_POST['pseudo'];
$password=$_POST['pass'];



$info = $bdd->query('SELECT * from user');

while($data = $info->fetch())
{
   if($data['user'] == $user && $data['mdp'] == $password)
       header('Location: ticket.php');
   
       else{
           $pas_present = true;
           header('Location: page_connexion.php');
                   
       
       }
       
       

}



?>