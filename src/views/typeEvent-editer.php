<!--meta title="Modification du type d'évènement" css="style/evenements.css"-->
<div id="content">
<?php if ($typeEvent != NULL) { ?>
	<h1>Modification du type d'évènement</h1>
	<form action="typeEvent-editer/<?php echo $typeEvent->getId();?>" method="post">
		<article>
			<dl>
				<dt><label for="libelle">Nom</label></dt>
				<dd class="commentaire"><input id="libelle" name="libelle" type="text" placeholder="Nom du type d'évènement" value="<?php echo $typeEvent->getLibelle();?>" /></dd>
			</dl>
		</article>
		<input type="submit" value="Enregistrer les modifications" />
		<a class="getback "href="javascript:history.go(-1)">Retour</a>
	</form>
<?php
} else { ?>
	<a class="getback "href="javascript:history.go(-1)">Retour</a>
	<p class="warning">Ce type d'évènement ne peut être modifié car il n'existe pas</p>
<?php } ?>
</div>