 <?php
 	session_start();
  	if (!isset($_SESSION['user']))
    	header('Location: index.php');
	include 'connexion.php';
	$res = $bdd->query("SELECT e.statut etat, count(t.etat) nb FROM etat e JOIN ticket t ON e.id = t.etat WHERE t.del = 0 GROUP BY e.statut UNION SELECT e.statut etat, 0 nb FROM etat e WHERE e.id NOT IN (SELECT DISTINCT etat FROM ticket WHERE del = 0)");
	$total = 0;
	$couleur = array('1' => "purple", '2' => "blue", '3' => "deepskyblue", '4' => "green", '5' => "yellow", '6' => "orange", '7' => "red");
	$cpt = 1;
	?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Statistique</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise.min.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-ui/concise-ui.min.css">
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="./js/fonctions.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
    	echo "<script type=\"text/javascript\">
      google.charts.load(\"current\", {packages:[\"corechart\"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([";
        echo "['Etat', 'Nombre', { role: \"style\" } ],
        ";
        foreach ($res as $value) {
        	echo "['".$value['etat']."', ".$value['nb'].", \"".$couleur[$cpt]."\"],
        	";
        	$total += $value['nb'];
        	$cpt++;
        }
        echo "['Total', ".$total.", \"black\"]]);
        ";
        echo "var options = {
          title: 'Nombre de tickets par état',
          legend: { position: 'none' },
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      </script>";
    ?>
</head>
<body>
	<?php include 'menu.php'; ?>
	<section>
		<h1 class="_bb1 _mts">Statistique</h1>
		<div id="chart_div" style="width: 100%; height: 500px;"></div>
	</section>
</body>
</html