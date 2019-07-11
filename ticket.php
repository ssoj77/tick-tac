 <?php
	include 'connexion.php';
	$res = $bdd->query("select * from ticket where id = ".$_GET['id']);
	$tick = $res->fetch();
	$ticket = $tick['id'];
	$dcre = $tick['dcre'];
	$dmaj = $tick['dmaj'];
	$desc = $tick['description'];
	$drec = $tick['drec'];
	$dmep = $tick['dmep'];
	$etat = $tick['etat'];
	$nom = $tick['nom'];
	$rap = $tick['rapporteur'];
	$resp = $tick['responsable'];
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo "<title>Ticket ".$ticket." - Tick & tac</title>";?>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise.min.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-ui/concise-ui.min.css">
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="./js/fonctions.js"></script>
</head>
<body>
	<?php include 'menu.php';?>
	<aside class="information">
		<form method="post" action="upadte_tick.php">
			<p>État</p> 
				<select name="etat" class="champ">
					<option class="champ" selected><?php echo $etat; ?></option>
					<option class="champ" id="new">Nouveau</option>
					<option class="champ" id="open" style="background-color: rgb(200,200,200)">Ouvert</option>
					<option class="champ" id="planed" style="background-color: rgb(0,123,255); color: white">Planifié</option>
					<option class="champ" id="liv" style="background-color: rgb(0,93,225); color: white">Livré</option>
					<option class="champ" id="vi" style="background-color: rgb(42,161,50); color: white">Validé informatique</option>
					<option class="champ" id="vm" style="background-color: rgb(12,131,20); color: white">Validé Métier</option>
					<option class="champ" id="term" style="background-color: rgb(0,119,8); color: white">Terminé</option>
				</select>
			</option>
			<p>Responsable</p>
			<input type="text" name="responsable" class="champ" value="<?php echo $resp; ?>">
			<p>Rapporteur</p>
			<input type="text" name="rapporteur" class="champ" value="<?php echo $rap; ?>">
			<p>Date de recette</p>
			<input type="date" name="recette" class="champ" value="<?php echo $drec; ?>">
			<p>Date de mise en prod</p>
			<input type="date" name="prod" class="champ" value="<?php echo$dmep; ?>">
			<p>Date de création
			<br><?php echo $dcre?></p>
			<p>Dernière date de mise à jour
			<br><?php echo $dmaj?></p>
			<input type="submit" name="Valider">
		</form>
	</aside>
	<section>
		<h1><?php echo $nom; ?></h1>
		<h2 class="_bb1 _mts _mbs">Description</h2>
		<p>
			<?php echo $desc; ?>
		</p>
	</section>
	<section>
		<h2>Commentaires</h2>
		<form method="post" action="ticket.php">
			<input type="text" name="comm" class="comm">
			<input type="submit" value="Envoyer" style="margin-top: 10px">
		</form>
	</section>
</body>
</html