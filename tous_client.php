<!DOCTYPE html>
<?php
  session_start();
  if (!isset($_SESSION['user']))
    header('Location: index.php');
	include 'connexion.php';
?>
<html>
<head>
	<title>clients - Tick & Tac</title>
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
		<h1 class="_bb1 _mts _mbs">Vue Globale</h1>
		<table style="width: 100%; text-align: center;">
			<thead style="background-color: rgb(220,220,220)">
				<tr style="text-align: center;">
					<th>ID</th>
					<th>Nom</th>
					<th>Supprimer</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$ticks = $bdd->query("SELECT * FROM client WHERE del = 0 order by id");
					$cpt = 0;
					foreach ($ticks as $row) {
						if ($cpt%2 == 0)
							echo "<tr>";
						else
							echo '<tr style="background-color: #f5f5f5">';
						echo '<td><a href="#">'.$row['id'].'</td>';
						echo '<td>'.$row['nom'].'</td>';
						echo '<td><a href="del_client.php?id='.$row['id'].'"><img src="./img/del.png" width="30px"></a></td>';
						echo "</tr>";
						$cpt++;
					}
				?>
			</tbody>
		</table>
	</section>
</body>
</html>