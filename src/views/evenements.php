<!--meta title="IUTbook | Profil" css="style/animations.css"-->

<section id="content">
	<?php if ($user == "Ancien") {?>
		<div>
			<h2>Événements inscrits</h2>
		</div>
		<div>
			<h2>Autres événements</h2>
		</div>
		<div>
			<h2>Événements passés</h2>
		</div>
	<?php } else if ($user == "Admin" || $user == "Professeur") {?>
		Events pour admin/prof
	<?php } ?>
</section>