<?php 
include "bdd.php";
$res = $bdd->query("SELECT * FROM `ticket`");

?>
    <!DOCTYPE html>
<html lang="fr">
<head>
	<title>tickets</title>
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise.min.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-utils/concise-utils.min.css">
	<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-ui/concise-ui.min.css">
    <link rel="stylesheet" type="text/css" href="./css/page_view_tickets.css">
	<meta charset="utf-8">
</head>
<body container>
	<h1 class="_bb1 _mts">Liste de tickets</h1>
	<div class="row">
			<table style="width: 100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Code</th>
						<th>Etat</th>
						<th>Responsable</th>
						<th>Raporteur</th>
						<th>Date de création</th>
                        <th>Date de mise à jour</th>		
					</tr>
				</thead>
				
        <?php
        $couleur=0;
        foreach($res as $ticket)
        {
            $couleur+=1;
            $var=$couleur%2;
            
            echo'
            <tr class="id'.$var.'">
                <td><a href=tickets.php>'.$ticket['id'].'</a></td>
                <td>'.$ticket['code_projet'].'</td>
                <td>'.$ticket['etat'].'</td>
                <td>'.$ticket['responsable'].'</td>
                <td>'.$ticket['rapporteur'].'</td>
                <td>'.$ticket['drec'].'</td>
                <td>'.$ticket['dmep'].'</td>
                

            </tr>';
        }
        ?>
        <tbody>        
        </body>

