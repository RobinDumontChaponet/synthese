<!--meta title="groupe" -->
<div id="content">
<?php if($gr!=null) { ?>
	<h1>Discussion du groupe "<?= $gr->getNom(); ?>"</h1>
	<section>
		<h2>Publier dans le groupe</h2>
		<form method="post">
			<article>
				<dl>
					<dt><label for="contenu">Message</label></dt>
					<dd class="message"><textarea name="contenu" placeholder="Écrivez votre message..."></textarea></dd>
				</dl>
			</article>
			<input type="submit" name="publier" value="Publier">
		</form>
    </section>
    <section>
        <h2>Liste des messages</h2>
        <ul>
	<?php
	foreach($posts as $post) {
	?>
		<li>
		<? if($_SESSION["syntheseUser"]->getPersonne()->getId()==$post->getPosteur()->getId() || $_SESSION["syntheseUser"]->getTypeProfil()->getId()==1) echo '<a class="edit" href="">Éditer...</a><a class="delete" href="">Supprimer</a>';
	?>
			<?= $post->getPosteur()->getPrenom().' <span class="nomPatronymique">'.$post->getPosteur()->getNom();?>
			<?= $post->getDate();?>
			<p><?= $post->getContenu();?></p>
			</li>
	<?php
	}
	?>
		</ul>
	</section>
</div>
<?php
} else {
?>
    <p class="warning">Groupe Introuvable</p>
<?php
}
?>