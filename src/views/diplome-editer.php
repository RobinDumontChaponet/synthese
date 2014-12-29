<!--meta title="<?php echo 'Diplôme : '.(($diplome != NULL)?$diplome->getLibelle():'Diplôme non trouvé'); ?>" css="style/animations.css"-->

<div id="content">
	<?php
	if (isset($diplome) && $diplome != NULL && $_SESSION['user_auth']['write']) { ?>
		<form action="diplome-editer/<?php echo $diplome->getId()?>" method="post">
			<ul>
				<li><label for="diplomeLibelle">Libelle du diplôme</label><input id="diplomeLibelle" name="diplomeLibelle" type="text" placeholder="Libelle du diplôme" value="<?php echo $diplome->getLibelle(); ?>"/></li>
				<li>
					<label for="domainLibelle">Domaine</label>
					<select id="domainLibelle" name="domainLibelle">
					<?php foreach ($domaines as $domaine) {
						echo '<option'.(($domaine->getId() == $diplome->getDomaine()->getId())?' selected':'').' value="'.$domaine->getId().'">'.$domaine->getLibelle().'</option>';
					}?>
					</select>
				</li>
				<li><label for="domainDescription">Description</label><input id="domainDescription" name="domainDescription" type="text" placeholder="Description" value="<?php echo $diplome->getDomaine()->getDescription(); ?>"/></li>
			</ul>
			<input type="submit" value="Enregistrer les modifications" />
		</form>
		<?php } else {?>
		<p class="warning">Ce diplôme n'existe pas</p>
	<?php }?>
</div>