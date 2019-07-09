<?php
try {
    $bdd = new PDO('mysql:host=localhost;port= 3307;dbname=tick_tac', 'root', '');
  
} catch (PDOException $e) {
    print $e->getMessage();
    die();
}
?>