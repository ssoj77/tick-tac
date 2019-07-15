<!DOCTYPE html>
<html>
<?php
  session_start();
  if (!isset($_SESSION['user']))
    header('Location: index.php');
	include 'connexion.php';
?>
<head>
	<title>New tick - Tick & tac</title>
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
		<h1 class="_bb1 _mts _mbs">Nouveau ticket</h1>
		<form method="post" action="new_tick_post.php">
			<label for="nom">Titre</label>
			<input type="text" name="nom" required>
			<label for="desc">Description</label>
			<textarea name="desc"></textarea>
			<label for="app">Application</label>
			<input type="text" name="app" required>
			<label for="r7">Date de recette</label>
			<input type="date" name="r7">
			<label for="mep">Date de mise en production</label>
			<input type="date" name="mep">
			<label>Client</label>
			<select name="client" class="champ">
				<?php
						$res = $bdd->query("SELECT nom FROM client WHERE del = 0");
						foreach ($res as $line) {
							print('<option value="'.$line['nom'].'">'.$line['nom'].'</option>');
						}
					?>
			</select>
			<label for="resp">Responsable</label>
			<select name="resp" class="champ">
					<option value="nobody">Non assigné</option>
					<?php
						$re = $bdd->query("SELECT * FROM user WHERE profil = \"Developpeur\" and del = 0");
						foreach ($re as $line) {
							print('<option value="'.$line['user'].'">'.$line['prenom'].' '.$line['nom'].'</option>');
						}
					?>
			</select>
			<br>
			<input type="submit" value="Créer" style="margin-top: 20px;">
		</form>
	</section>
</body>
</html>