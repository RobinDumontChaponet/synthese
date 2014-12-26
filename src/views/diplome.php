<!--meta title="<?php echo (($diplome != NULL)?$diplome->getLibelle():'Diplôme non trouvé'); ?>" css="style/animations.css"-->

<section id="content">
	<?php if ($diplome != NULL) {
		if ($user == "Ancien") { /* Ne peut pas modifier */ ?>
		<ol>
			<li><label for="diplomeName">Libelle du diplôme :</label><input id="diplomeName" type="text" placeholder="Libelle du diplôme" readonly="readonly" value="<?php echo $diplome->getLibelle(); ?>"/></li>
			<li><label for="domainLibelle">Domaine :</label><input id="domainLibelle" type="text" placeholder="Domaine" readonly="readonly" value="<?php echo $diplome->getDomaine()->getLibelle(); ?>"/></li>
			<li><label for="domainDescription">Description :</label><input id="domainDescription" type="text" placeholder="Description" readonly="readonly" value="<?php echo $diplome->getDomaine()->getDescription(); ?>"/></li>
		</ol>
		<?php } else if ($user == "Admin" || $user == "Professeur") { /*Peut modifier*/?>
		<ol>
			<li><label for="diplomeName">Libelle du diplôme :</label><input id="diplomeName" type="text" placeholder="Libelle du diplôme" value="<?php echo $diplome->getLibelle(); ?>"/></li>
			<li><label for="domainLibelle">Domaine :</label><input id="domainLibelle" type="text" placeholder="Domaine" value="<?php echo $diplome->getDomaine()->getLibelle(); ?>"/></li>
			<li><label for="domainDescription">Description :</label><input id="domainDescription" type="text" placeholder="Description" value="<?php echo $diplome->getDomaine()->getDescription(); ?>"/></li>
		</ol>
		<?php }
	} else {?>
		<p class="warning">Ce diplôme n'existe pas</p>
	<?php }?>
</section>