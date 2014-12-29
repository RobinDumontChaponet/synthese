<!--meta title="<?php echo (($diplome != NULL)?$diplome->getLibelle():'Diplôme non trouvé'); ?>" css="style/animations.css"-->

<div id="content">
	<?php if ($diplome != NULL) {
		if ($user == "Ancien") { /* Ne peut pas modifier */ ?>
		<ol>
			<li><label for="diplomeLibelle">Libelle du diplôme :</label><input id="diplomeLibelle" type="text" placeholder="Libelle du diplôme" readonly="readonly" value="<?php echo $diplome->getLibelle(); ?>"/></li>
			<li><label for="domainLibelle">Domaine :</label><input id="domainLibelle" type="text" placeholder="Domaine" readonly="readonly" value="<?php echo $diplome->getDomaine()->getLibelle(); ?>"/></li>
			<li><label for="domainDescription">Description :</label><input id="domainDescription" type="text" placeholder="Description" readonly="readonly" value="<?php echo $diplome->getDomaine()->getDescription(); ?>"/></li>
		</ol>
		<?php } else if ($user == "Admin" || $user == "Professeur") { /*Peut modifier*/
		?>
		<form action="diplome/<?php echo $diplome->getId()?>" method="post">
			<ol>
				<li><label for="diplomeLibelle">Libelle du diplôme :</label><input id="diplomeLibelle" name="diplomeLibelle" type="text" placeholder="Libelle du diplôme" value="<?php echo $diplome->getLibelle(); ?>"/></li>
				<li>
					<label for="domainLibelle">Domaine :</label>
					<select id="domainLibelle" name="domainLibelle">
					<?php foreach ($domaines as $domaine) {
						echo '<option'.(($domaine->getId() == $diplome->getDomaine()->getId())?' selected':'').' value="'.$domaine->getId().'">'.$domaine->getLibelle().'</option>';
					}?>
					</select>
				</li>
				<li><label for="domainDescription">Description :</label><input id="domainDescription" name="domainDescription" type="text" placeholder="Description" value="<?php echo $diplome->getDomaine()->getDescription(); ?>"/></li>
			</ol>
			<input type="submit" value="Enregistrer les modifications" />
		</form>
		<?php }
	} else {?>
		<p class="warning">Ce diplôme n'existe pas</p>
	<?php }?>
</div>