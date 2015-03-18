<!--meta title="<?php echo 'Diplôme : '.(($diplome != NULL)?$diplome->getLibelle():'Diplôme non trouvé'); ?>" css="style/evenements.css"-->
<div id="content">
	<h1>Modification du diplôme</h1>
	<?php if (isset($diplome) && $diplome != NULL && $_SESSION['user_auth']['write']) { ?>
	<form action="diplome-editer/<?php echo $diplome->getId()?>" method="post">
		<article>
			<h3 class="diplome"><input id="diplomeLibelle" name="diplomeLibelle" type="text" placeholder="Pas de libelle..." value="<?php echo $diplome->getLibelle(); ?>" autofocus/></h3>
			<dl>
				<dt><label for="domainLibelle">Domaine</label></dt>
				<dd class="domaine"><select id="domaineLibelle" name="domaineLibelle"><?php foreach ($domaines as $domaine) {echo '<option'.(($domaine->getId() == $diplome->getDomaine()->getId())?' selected':'').' value="'.$domaine->getId().'">'.$domaine->getLibelle().'</option>';}?></select><a class="domaines" href="domaines">Voir tout les domaines</a></dd>
				<dt><label for="domainDescription">Description</label></dt>
				<dd class="description"><textarea id="domainDescription" name="domainDescription" placeholder="Pas de description..."><?php echo $diplome->getDomaine()->getDescription(); ?></textarea></dd>
			</dl>
		</article>
		<input type="submit" value="Enregistrer les modifications" />
		<a class="getback "href="javascript:history.go(-1)">Retour</a>
	</form>
	<?php } else {?>
	<p class="warning">Ce diplôme n'existe pas</p>
	<a class="getback "href="javascript:history.go(-1)">Retour</a>
	<?php }?>
</div>