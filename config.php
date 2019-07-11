<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=tick&tac', 'tick', 'tac');
  
} catch (PDOException $e) {
    print $e->getMessage();
    die();
}
$user=$_POST['pseudo'];
$password=$_POST['pass'];



$info = $bdd->query('SELECT * from donnees');

while($data = $info->fetch())
{
   if($data['user_name'] == $user && $data['password'] == $password)
       header('Location: ticket.php');
   
       else{
           $pas_present = true;
           header('Location: page_connexion.php');
                   
       
       }
       
       

}



?>