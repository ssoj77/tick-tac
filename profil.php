<?php
 	session_start();
  	if (!isset($_SESSION['user']))
    	header('Location: index.php');
	include 'connexion.php';
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
		<form>
			
		</form>
	</section>
</body>
</html>