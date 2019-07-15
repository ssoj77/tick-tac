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
	<title>ajout client</title>
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
<h1 class= "_bb1 _mts">Création d'un client</h1>
	<form method="post" action="create_client_post.php">
        <label>Pseudo</label>
        <input type="text" name="nom" placeholder="Ex: Monoprix" required>
        <input type="submit" value="Créer" style="margin-top: 15px;">
	</form>
    </section>
</body>
</html>
