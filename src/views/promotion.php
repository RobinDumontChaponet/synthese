<!--meta title="IUTbook | Promotion" css="style/animations.css"-->

<section id="content">
	<h1 style="color:lightBlue">Page de la promotion année <?php echo $promo->getAnnee();?></h1>
	<div>
		<p>ici on des news de la promo ici on des news de la promo ici on des news de la promo ici on des news de la promo ici on des news de la promo ici on des news de la promo ici on des news de la promo</p>
	</div>
	<fieldset>
		<legend style="color:lightBlue">Liste des étudiants de la promotion</legend>
		<ol>
			<?php
			if($anciens != NULL) {
				foreach($anciens as $ancien) {
					echo '<li><a href="profil/'.$ancien->getId().'">'.$ancien->getNomPatronymique().' '.$ancien->getPrenom().'</a></li>';
				}
			} else {
				echo '<p>Il n\'y a pas d\'étudiants dans cette promotion</p>';
			}?>
		</ol>
	</fieldset>

</section>