<!--meta title="Postes" css="style/evenements.css"-->
<div id="content">
<?php if ($postes != NULL) { ?>
	<h1>Postes</h1>
	<a class="add" href="poste-ajouter">Ajouter un nouveau poste</a>
	<a class="getback "href="javascript:history.go(-1)">Retour</a>
	<section>
		<ul>
			<?php foreach ($postes as $poste) {
			echo '<li class="poste">';
			if ($_SESSION['user_auth']['write']) {
				echo '<a class="edit" href="poste-editer/'.$poste->getId().'">Modifier</a><a class="delete" href="index.php?requ=poste-supprimer&id='.$poste->getId().'">Supprimer</a>';
			} ?>
				<h3><?php echo $poste->getLibelle();?></h3>
			</li>
			<?php } ?>
		</ul>
	</section>
<?php
} else { ?>
	<a class="add" href="poste-ajouter">Ajouter un nouveau poste</a>
	<a class="getback "href="javascript:history.go(-1)">Retour</a>
	<p class="warning">Aucun postes</p>
<?php } ?>
</div>