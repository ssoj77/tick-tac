 <?php
 	session_start();
  	if (!isset($_SESSION['user']))
    	header('Location: index.php');
	include 'connexion.php';
	$res = $bdd->query("select * from ticket where del = 0 and id = ".$_GET['id']);
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
	$rp = $bdd->query("select nom,prenom from user where user = '".$rap."' and del = 0");
	$rapo = $rp->fetch();
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
	<?php include 'menu.php'; ?>
	<aside class="information">
		<form method="post" action="update_tick.php">
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
				<option value="null">Non assigné</option>
				<?php
					$re = $bdd->query("SELECT * FROM user WHERE profil = \"Developpeur\" and del = 0");
					foreach ($re as $line) {
						if ($line['user'] == $resp) {
							print('<option value="'.$line['user'].'" selected>'.$line['prenom'].' '.$line['nom'].'</option>');
						} else {
							print('<option value="'.$line['user'].'">'.$line['prenom'].' '.$line['nom'].'</option>');
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
			<input type="text" name="id" value="<?php echo $_GET['id']; ?>" style="display: none;">
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
		<?php
			$res = $bdd->query("SELECT c.text, u.nom, u.prenom FROM comm c join user u on c.user = u.user WHERE c.del = 0 order by c.id_mess");
			foreach ($res as $com) {
				echo "<h5>".$com['prenom']." ".$com['nom']." a dit :</h5>";
				echo "<p class=\"comments\">";
				echo $com['text'];
				echo "</p>";
			}
		?>
		<form method="post" action="add_com.php">
			<input type="text" name="comm" class="comm">
			<input type="hidden" name="id_tick" value="<?php echo $_GET['id']; ?>">
			<input type="hidden" name="user" value="<?php echo $_SESSION['user']; ?>">
			<input type="submit" value="Envoyer" style="margin-top: 10px">
		</form>
	</section>
</body>
</html