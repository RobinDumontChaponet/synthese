<!--meta title="Créer un groupe" -->
<div id="content">
<?php

if(isset($valid) && !$valid)
	echo '<p class="error">Le nom doit être renseigné.</p>';

if(!isset($id)) {  // si aucun id, le groupe n'est pas crée?>
	<h1>Créer un groupe</h1><br>
	<form  method="post">
		<article>
			<dl>
				<dt><label for="nom" >Nom</label></dt>
				<dd class="promotion"><input type="text" id="nom" name="nom" required autofocus/></dd>
		</article>
		<input type="submit" name="addGroupe" value="Ajouter">
	</form>
<?php
} else { // si le groupe est crée
?>
	<h1>{Ici, nom du groupe}</h1>
	<section>
		<h2>Inviter un ami</h2>

		<article>



		</article>

	</section>
<?php } ?>
</div>