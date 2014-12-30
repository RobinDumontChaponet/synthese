<!--meta title="<?php echo (($diplome != NULL)?'Diplôme : '.$diplome->getLibelle():'Diplôme non trouvé'); ?>" css="style/animations.css"-->
<div id="content">
	<?php if ($diplome != NULL) { ?>
		<section>
			<h2>Détails du diplôme</h2>
			<dl>
				<dt id="diplomeLibelle">Libelle du diplôme</dt>
				<dd><?php echo $diplome->getLibelle(); ?></li>
				<dt id="domainLibelle">Domaine</dt>
				<dd><?php echo $diplome->getDomaine()->getLibelle(); ?></dd>
				<dt id="domainDescription">Description</dt>
				<dd><?php echo $diplome->getDomaine()->getDescription(); ?></dd>
			</ul>
		</section>
		<?php if ($_SESSION['user_auth']['write'])
			echo '<a href="diplome-editer/'.$_GET['id'].'">Editer le diplôme</a>';
	} else {?>
		<p class="warning">Ce diplôme n'existe pas</p>
	<?php }?>
</div>