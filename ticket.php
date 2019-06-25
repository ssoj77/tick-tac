<?php
	$ticket = '001';
	$dcre = '2019-06-24 15:50';
	$dmaj = "2019-06-24 19:00";
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
</head>
<body>
	<nav class="menu">
		<img src="./img/back.png" alt="retour" width="35px" style="float: right;">
		<ul style="top: 15px">
			<li>
				Accueil
			</li>
			<li>
				Tickets
				<ul>
					<li>Tous les Tickets</li>
					<li>Mes Tickets</li>
					<li>Signalés par moi</li>
				</ul>
			</li>
			<li>
				Profil
			</li>
		</ul>
	</nav>
	<aside class="information">
		<form method="post" action="upadte_tick.php">
			<p>État</p> 
				<select name="etat" class="champ">
					<option class="champ">Nouveau</option>
					<option class="champ">Ouvert</option>
					<option class="champ">Planfié</option>
					<option class="champ">Livré</option>
					<option class="champ">Validé informatique</option>
					<option class="champ">Validé Métier</option>
					<option class="champ">Terminé</option>
				</select>
			</option>
			<p>Responsable</p>
			<input type="text" name="responsable" class="champ">
			<p>Rapporteur</p>
			<input type="text" name="rapporteur" class="champ">
			<p>Date de recette</p>
			<input type="date" name="recette" class="champ">
			<p>Date de mise en prod</p>
			<input type="date" name="prod" class="champ">
			<p>Date de création
			<br><?php echo $dcre?></p>
			<p>Dernière date de mise à jour
			<br><?php echo $dmaj?></p>
			<input type="submit" name="Valider">
		</form>
	</aside>
	<section>
		<h2 class="_bb1 _mts _mbs">Description</h2>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum et nulla interdum mauris porta luctus at at arcu. Nullam tincidunt eu elit eget dignissim. Nam quis magna id arcu mattis dictum. Morbi ante justo, placerat ut malesuada et, volutpat in sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras vitae arcu a lorem lacinia auctor quis at felis. Mauris nec nulla in mauris vestibulum consectetur. Cras dolor mi, auctor non pretium non, molestie nec justo. Aenean pellentesque porttitor lacus, in tempus nisl congue vitae.

			Duis feugiat ultrices lacus in convallis. Nullam ex justo, lacinia ut euismod pellentesque, congue vitae velit. Mauris non lacus purus. Mauris fringilla sem non nisi mattis, quis egestas dui sagittis. Nunc vulputate lectus mauris, id vulputate neque porta nec. Quisque tellus eros, rutrum quis lacus eu, semper hendrerit ante. Etiam sollicitudin, dui eu condimentum efficitur, urna lectus efficitur risus, eget efficitur tortor leo et urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Pellentesque ultrices augue non iaculis dictum. Phasellus erat tortor, congue vel enim et, imperdiet aliquet ipsum. Pellentesque in nulla et lorem fringilla hendrerit. Sed sagittis ipsum vel aliquam venenatis. Sed elementum eros vitae cursus aliquam. Suspendisse pulvinar consectetur lacus mattis tempus. Sed blandit, nunc sed lobortis condimentum, sapien diam cursus urna, vitae euismod dolor mi in justo.
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