<?php
	echo '<nav class="menu" id="menu">
		<img src="./img/back.png" alt="retour" width="35px" style="float: right;" onclick="moins()" id="moins">
		<img src="./img/forward.png" alt="retour" width="35px" style="position: relative; left: 50%" onclick="plus()" id="plus">
		<ul style="top: 15px"  class="elem">
			<li  class="elem">
				Accueil
			</li>
			<li  class="elem">
				<img src="./img/fleche.png" alt="masquer" width="12px" id="img_tick" onclick="onglet"> Tickets
				<ul  class="elem" id="tick" style="margin-top: 2px">
					<li  class="elem">Tous les Tickets</li>
					<li  class="elem">Mes Tickets</li>
					<li  class="elem">Signalés par moi</li>
				</ul>
			</li>
			<li  class="elem">
				<img src="./img/fleche.png" alt="masquer" width="12px" id="img_util"> Utilisateur
				<ul class="elem" id="util" style="margin-top: 2px">
					<li class="elem">Mon profil</li>
					<li class="elem">Tous les utilisateurs
				</ul>
			</li>
			<li class="elem">
				Déconnexion
			</li>
		</ul>
	</nav>';
?>