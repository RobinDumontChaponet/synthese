<!--meta title="<?= ($promo!=null)?'Promotion '.$promo->getAnnee():'La promotion n‘existe pas';?>" css="style/promotions.css"-->
<div id="content">
	<?php if($promo!=null) { ?>
	<h1>Promotion année <?php echo $promo->getAnnee();?></h1>
	<section>
		<p>Il y a actuellement <?= count($anciens); ?> anciens dans cette promotion.</p>
	</section>
	<section id="etudiants">
		<h2>Étudiants de la promotion</h2>
		<?php if($anciens != NULL) { ?>
		<ul class="magnets">
			<?php foreach($anciens as $ancien)
				echo '<li><a href="profil/'.$ancien->getId().'">'.$ancien->getPrenom().' <span class="nomPatronymique">'.$ancien->getNomPatronymique().'</span></a></li>';
			?>
		</ul>
		<?php
		} else {
			echo '<p class="sad">Il n\'y a pas d\'étudiants dans cette promotion</p>';
		}
	} else { ?>
		<p class="warning">La promotion n'existe pas</p>
	<?php
	}
	?>
	</section>
</div>
