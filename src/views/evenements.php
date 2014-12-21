<!--meta title="IUTbook | Profil" css="style/animations.css"-->

<section id="content">
	<?php if ($user == "Ancien") {?>
		Events pour Anciens
	<?php } else if ($user == "Admin" || $user == "Professeur") {?>
		Events pour admin/prof
	<?php } ?>
</section>