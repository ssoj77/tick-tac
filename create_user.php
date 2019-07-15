<?php
include 'connexion.php';
	session_start();
	if (!isset($_SESSION['user'])) {
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html lang="fr">
<!DOCTYPE html>
<head>
	<title>ajout utilisateur</title>
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise.min.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-ui/concise-ui.min.css">
    <link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">
</head>

<body>
<?php
include 'menu.php';
?>
<section>
<h1 class= "_bb1 _mts">Création d'utilisateur</h1>
	<form method="post" action="create_user_post.php">
        <label>Pseudo</label>
        <input type="text" name="user" placeholder="Ex: jojo" required>
        
		<label>Mot de passe</label>
        <input type="password" name="mdp" placeholder="Mot De passe" required>
        <label>Prénom</label>
		<input type="text" name="prenom" placeholder="Ex: John" required>
		<label>Nom</label>
		<input type="text" name="nom" placeholder="Ex: Doe" required>
		
		<label>Mail</label>
		<input type="email" name="mail" placeholder="Ex: john.doe@exemple.com" required>
		
        <label >Profil</label>
        <select name="profil">
            <option value="Developpeur">Développeur</option>
            <option value="Rapporteur">Rapporteur</option>
        </select>
        <br>
        <input type="submit" value="Créer" style="margin-top: 15px;">
		
		
	</form>
    </section>
</body>
</html>
