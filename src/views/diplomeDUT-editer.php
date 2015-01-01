<!--meta title="Modification du type d'évènement" css="style/evenements.css"-->
<div id="content">
<?php if ($diplomeDUT != NULL) { ?>
	<h1>Modification d'un Diplôme DUT</h1>
	<form action="diplomeDUT-editer/<?php echo $diplomeDUT->getId();?>" method="post">
		<article>
			<dl>
				<dt><label for="libelle">Libelle</label></dt>
				<dd><input id="libelle" name="libelle" type="text" value="<?php echo $diplomeDUT->getLibelle();?>" placeholder="Nom du Diplôme DUT" autofocus/></dd>
				<dt><label for="departementIUT">Département IUT</label></dt>
				<dd>
					<select name="departementIUT">
					<?php foreach($departementsIUT as $departementIUT)
						echo '<option'.(($departementIUT->getId() == $diplomeDUT->getDepartementIUT()->getId())?' selected':'').' value="'.$departementIUT->getId().'">'.$departementIUT->getNom().'</option>';
					?>
					</select>
				</dd>
			</dl>
		</article>
		<input type="submit" value="Enregistrer les modifications" />
	</form>
<?php
} else {
?>
	<p class="warning">Ce Diplôme DUT ne peut être modifié car il n'existe pas</p>
<?php } ?>
</div>