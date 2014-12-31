<!--meta title="Promotion" css="style/animations.css" css="style/promotions.css"-->
<div id="content">
	<h1>Promotion année <?php echo $promo->getAnnee();?></h1>
	<section>
		<p>ici on des news de la promo ici on des news de la promo ici on des news de la promo ici on des news de la promo ici on des news de la promo ici on des news de la promo ici on des news de la promo</p>
	</section>
	<section id="etudiants">
		<h2>Étudiants de la promotion</h2>
		<?php if($anciens != NULL) { ?>
		<ul>
			<?php foreach($anciens as $ancien)
				echo '<li><a href="profil/'.$ancien->getId().'">'.$ancien->getPrenom().' <span class="nomPatronymique">'.$ancien->getNomPatronymique().'</span></a></li>';
			?>
		</ul>
			<?php
			} else {
				echo '<p>Il n\'y a pas d\'étudiants dans cette promotion</p>';
			} ?>
	</section>
</div>