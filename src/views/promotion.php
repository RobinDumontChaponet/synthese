<!--meta title="Promotion" css="style/animations.css" css="style/promotion.css"-->
<div id="content">
	<h1>Promotion année <?php echo $promo->getAnnee();?></h1>
	<section>
		<p>ici on des news de la promo ici on des news de la promo ici on des news de la promo ici on des news de la promo ici on des news de la promo ici on des news de la promo ici on des news de la promo</p>
	</section>
	<section id="students">
		<h2>Étudiants de la promotion</h2>
		<ul>
			<?php
			if($anciens != NULL) {
				foreach($anciens as $ancien) {
					echo '<li><a href="profil/'.$ancien->getId().'">'.$ancien->getNomPatronymique().' '.$ancien->getPrenom().'</a></li>';
				}
			} else {
				echo '<p>Il n\'y a pas d\'étudiants dans cette promotion</p>';
			}?>
		</ul>
	</section>

</div>