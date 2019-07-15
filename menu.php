<?php
	echo '<nav class="menu" id="menu">
		<img src="./img/back.png" alt="retour" width="35px" style="float: right; cursor: pointer" onclick="moins()" id="moins">
		<img src="./img/forward.png" alt="retour" width="35px" style="position: relative; left: 50%; cursor: pointer" onclick="plus()" id="plus">
		<ul style="top: 15px"  class="elem">
			<li  class="elem">
				Tickets
				<ul  class="elem" id="tick">
					<li  class="elem"><a href="tous_ticket.php" style="color: white">Tous les Tickets</a></li>
					<li  class="elem"><a href="new_tick.php" style="color: white">Créer un ticket</a></li>
				</ul>
			</li>
			<li  class="elem">
				Utilisateur
				<ul class="elem" id="util">
					<li class="elem"><a href="profil.php?user='.$_SESSION['user'].'" style="color: white">Mon profil</a></li>
					<li class="elem"><a href="create_user.php" style="color: white">Créer un utilisateur</a></li>
				</ul>
			</li>
			<li class="elem">
				Client
				<ul class="elem">
					<li><a href="tous_client.php" style="color: white">Tous les clients</a></li>
					<li><a href="create_client.php" style="color: white">Créer un client</a></li>
				</ul>
			</li>
			<li class="elem">
				<a href="stat.php" style="color: white"> Statistique</a>
			</li>
			<li class="elem">
				<a href="deco.php" style="color: white">Déconnexion</a>
			</li>
		</ul>
	</nav>';
?>