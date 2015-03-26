<!--meta title="Diplômes DUT" css="style/evenements.css"-->
<div id="content">
	<h1>Diplômes DUT</h1>
	<?php if ($_SESSION['user_auth']['write'])
		echo '	<a class="add" href="diplomeDUT-ajouter">Ajouter un nouveau Diplôme DUT</a> - <a href="departementsIUT">Accéder aux départements IUT</a>
		<script>backButton()</script>';
	?>
	<section>
	<?php
	if($diplomesDUT != NULL) {
		echo '<ul>';
		foreach($diplomesDUT as $diplomeDUT) { ?>
			<li>
				<a class="edit" href="diplomeDUT-editer/<?php echo $diplomeDUT->getId()?>">Modifier</a>
				<a class="delete" href="index.php?requ=diplomeDUT-supprimer&id=<?php echo $diplomeDUT->getId()?>">Supprimer</a>
				<h3><?php echo $diplomeDUT->getLibelle()?></h3>
				<dl>
					<dt>Département</dt>
					<dd class="departement"><?php echo $diplomeDUT->getDepartementIUT()->getNom();?></dd>
					<dt>Sigle</dt>
					<dd class="commentaire"><?php echo $diplomeDUT->getDepartementIUT()->getSigle();?></dd>
				</dl>
			</li>
		<?php }
		echo '</ul>';
	} else { ?>
		<p class="sad">Il n'y a aucun Diplômes DUT</p>
	<?php }?>
	</section>
</div>