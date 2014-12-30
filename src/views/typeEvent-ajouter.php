<!--meta title="Ajout d'un type d'évènement" css="style/animations.css" css="style/evenements.css"-->
<div id="content">
	<?php if ($_SESSION['user_auth']['write']) { ?>
		<form action="typeEvent-ajouter" method="post">
		<h1>Ajout d'un type d'évènement</h1>
		<ul>
			<li>
				<label for="libelle">Nom du type d'évènement</label>
				<input id="libelle" name="libelle" type="text" placeholder="Nom du type d'évènement" />
			</li>
		</ul>
		<input type="submit" value="Ajouter le type d'évènement" />
		</form>
	<?php }?>
</div>