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
	$app = $tick['application'];
	$rp = $bdd->query("select nom,prenom from user where user = '".$rap."'");
	$rapo = $rp->fetch();
	$re = $bdd->query("SELECT * FROM user WHERE profil = 'Développeur'");
?>
<!DOCTYPE html>
<html lang="fr">
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
	<?php include 'menu.php'; print_r($re);?>
	<aside class="information">
		<form method="post" action="upadte_tick.php">
			<label>État</label> 
				<select name="etat" class="champ">
					<?php
						$et = $bdd->query("SELECT * FROM etat");
						foreach ($et as $row) {
							if ($row['id'] == $etat) {
								print('<option value="'.$row['id'].'" selected>'.$row['statut'].'</option>');
							} else {
								print('<option value="'.$row['id'].'">'.$row['statut'].'</option>');
							}
						}
					?>
				</select>
			<label>Responsable</label>
			<select name="responsable" class="champ">
				<option value="">Non assigné</option>
				<?php
					
					foreach ($re as $row) {
						if($row['user'] == $resp) {
							echo '<option value="'.$row['user'].'" selected>'.$row['prenom'].' '.$row['nom'].'</option>';
						} else {
							echo '<option value="'.$row['user'].'">'.$row['prenom'].' '.$row['nom'].'</option>';
						}
					}
				?>
			</select>
			<label>Rapporteur</label>
			<input type="text" name="rapporteur" class="champ" value="<?php echo $rapo['prenom'].' '.$rapo['nom']; ?>" disabled>
			<label>Application</label>
			<input type="text" name="app" value="<?php echo $app?>" class="champ">
			<label>Date de recette</label>
			<input type="date" name="recette" class="champ" value="<?php echo $drec; ?>">
			<label>Date de mise en prod</label>
			<input type="date" name="prod" class="champ" value="<?php echo$dmep; ?>">
			<label>Date de création
			<br><?php echo $dcre?></label>
			<label>Dernière date de mise à jour
			<br><?php echo $dmaj?></label>
			<input type="submit" name="Valider" style="margin-top: 30px">
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