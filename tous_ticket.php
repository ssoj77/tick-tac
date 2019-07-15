<!DOCTYPE html>
<?php
  session_start();
  if (!isset($_SESSION['user']))
    header('Location: index.php');
	include 'connexion.php';
?>
<html>
<head>
	<title>Ticket - Tick & Tac</title>
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
	<section style="width: 76%">
		<h1 class="_bb1 _mts _mbs">Vue Globale</h1>
		<table>
			<thead style="background-color: rgb(220,220,220)">
				<th>ID</th>
				<th>Titre</th>
				<th>État</th>
				<th>Application</th>
				<th>Responsable</th>
				<th>Rapporteur</th>
				<th>Date de création</th>
				<th>Mis à jour</th>
				<th>Supprimer</th>
			</thead>
			<tbody>
				<?php
					$ticks = $bdd->query("SELECT t.id, t.nom, e.statut, t.application, u1.nom en, u1.prenom ep, u2.nom an, u2.prenom ap, t.dcre, t.dmaj FROM ticket t JOIN etat e ON t.etat = e.id JOIN user u1 ON u1.user = t.responsable JOIN user u2 ON u2.user = t.rapporteur WHERE t.del = 0 order by t.id");
					$cpt = 0;
					foreach ($ticks as $row) {
						if ($cpt%2 == 0)
							echo "<tr>";
						else
							echo '<tr style="background-color: #f5f5f5">';
						echo '<td><a href="ticket.php?id='.$row['id'].'">'.$row['id'].'</td>';
						echo '<td>'.$row['nom'].'</td>';
						echo '<td>'.$row['statut'].'</td>';
						echo '<td>'.$row['application'].'</td>';
						echo '<td>'.$row['ep'].' '.$row['en'].'</td>';
						echo '<td>'.$row['ap'].' '.$row['an'].'</td>';
						echo '<td>'.$row['dcre'].'</td>';
						echo '<td>'.$row['dmaj'].'</td>';
						echo '<td><a href="del_tick.php?id='.$row['id'].'"><img src="./img/del.png" width="30px"></a></td>';
						echo "</tr>";
						$cpt++;
					}
				?>
			</tbody>
		</table>
	</section>
</body>
</html>