<!--meta title="Administrer le groupe" css="style/promotions.css"-->
<div id="content">

    <!-- SI groupe trouve -->
    <?php if($groupe!=null) { ?>

    <h1>Administrer le groupe</h1>
    <section>
        <h2>Modifier les paramètres du groupe</h2>
        <form method="post">
            <article>
                <dl>
                    <dt><label for="contenu">Nom</label></dt>
                    <dd class="message"><input type="text" name="nom" value="<?= $groupe->getNom(); ?>"></dd>
                </dl>
            </article>
            <input type="submit" name="modGroupe" value="Modifier"> <input type="submit" name="supprGroupe" value="Supprimer le groupe">
        </form>
    </section>

    <section id="etudiants">
		<h2>Liste des membres du groupe</h2>
		<?php if($lstMembre != array()) { ?>
		<ul class="magnets">
			<?php foreach($lstMembre as $pers)
				echo '<li><a href="profil/'.$pers->getId().'">'.$pers->getPrenom().' <span class="nomPatronymique">'.$pers->getNomPatronymique().'</span></a></li>';
			?>
		</ul>
		<?php
		} else {
			echo '<p class="sad">Il n\'y a personne dans ce groupe</p>';
		}
	?>

	</section>

    <?php } else {  ?>
    <p class="warning">Groupe introuvable</p>
    <?php } ?>
</div>