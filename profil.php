<?php
 	session_start();
  	if (!isset($_SESSION['user']))
    	header('Location: index.php');
	include 'connexion.php';
	$res = $bdd->query("select * from user where user='".$_SESSION['user']."'");
	$user = $res->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profil de <?php echo $_SESSION['user']; ?> - tick & tac</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise.min.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-ui/concise-ui.min.css">
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="./js/fonctions.js"></script>
</head>
<body>
	<?php include 'menu.php'; ?>
	<section>
		<h1 class="_bb1 _mts _mbs">Profil de <?php echo $_SESSION['user']; ?></h1>
		<form method="post" action="update_profil.php">
			<label>Pseudo</label>
			<input type="text" name="user" value="<?php echo $_SESSION['user']; ?>" disabled>
			<label>Mot de passe</label>
			<input type="password" name="pass">
			<label>Prénom</label>
			<input type="text" name="prenom" value="<?php echo $user['prenom']; ?>">
			<label>Nom</label>
			<input type="text" name="nom" value="<?php echo $user['nom']; ?>">
			<label>E-mail</label>
			<input type="mail" name="mail" value="<?php echo $user['mail']; ?>">
			<label>Statut</label>
			<select name="profil">
            	<option value="Developpeur" <?php if($user['profil'] == "Developpeur") { echo "selected";} ?>>Développeur</option>
            	<option value="Rapporteur" <?php if($user['profil'] == "Rapporteur") { echo "selected";} ?>>Rapporteur</option>
        	</select>
        	<br>
			<input type="submit" value="Enregistrer" style="margin-top: 15px;">
		</form>
	</section>
</body>
</html>