<!--meta title="<?= ($gr!=null)?'Groupe > '.$gr->getNom():'Groupe introuvable'; ?>"-->
<div id="content">
<?php if($groupe!=null) { ?>
	<h1>Discussion du groupe "<?= $groupe->getNom();?>"</h1>
	<section>
		<h2>Publier dans le groupe</h2>
		<form method="post">
			<article>
				<dl>
					<dt><label for="contenu">Article</label></dt>
					<dd class="message"><textarea name="contenu" placeholder="Écrivez votre message..."></textarea></dd>
				</dl>
			</article>
			<input type="submit" name="publier" value="Publier">
		</form>
    </section>
    <section>
        <h2>Liste des articles</h2>
        <ul>
	<?php
	foreach($posts as $post) {
	?>
			<li>
		<? if($_SESSION["syntheseUser"]->getPersonne()->getId()==$post->getPosteur()->getId() || $_SESSION["syntheseUser"]->getTypeProfil()->getId()==1) echo '<a class="edit" href="message-editer">Éditer...</a><a class="delete" href="message-supprimer">Supprimer</a>';
	?>
				<h3 class="message"><?= $post->getPosteur()->getPrenom().' <span class="nomPatronymique">'.$post->getPosteur()->getNom();?></span> <span class="date">le <?= $post->getDate();?></span></h3>
				<p class="commentaire"><?= $post->getContenu();?></p>
				<a href="message/<?= $post->getId();?>">Commentaire(s)</a>
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
    <p class="warning">Groupe introuvable</p>
<?php
}
?>