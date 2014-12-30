<!--meta title="<?php echo (($diplome != NULL)?'Diplôme : '.$diplome->getLibelle():'Diplôme non trouvé'); ?>" css="style/animations.css"-->
<div id="content">
	<?php if ($diplome != NULL) { ?>
		<ul>
			<li><label for="diplomeLibelle">Libelle du diplôme</label><input id="diplomeLibelle" name="diplomeLibelle" type="text" placeholder="Libelle du diplôme" value="<?php echo $diplome->getLibelle(); ?>"/></li>
			<li><label for="domainLibelle">Domaine</label><input id="domainLibelle" name="domainLibelle" type="text" placeholder="Domaine" value="<?php echo $diplome->getDomaine()->getLibelle(); ?>"/></li>
			<li><label for="domainDescription">Description</label><input id="domainDescription" name="domainDescription" type="text" placeholder="Description" value="<?php echo $diplome->getDomaine()->getDescription(); ?>"/></li>
		</ul>
		<?php if ($_SESSION['user_auth']['write'])
			echo '<a href="diplome-editer/'.$_GET['id'].'">Editer le diplôme</a>';
	} else {?>
		<p class="warning">Ce diplôme n'existe pas</p>
	<?php }?>
</div>