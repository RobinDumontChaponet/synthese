<!--meta title="Message" -->
<div id="content">
<?php if($post!=null) { ?>
	<h1>Article & commentaires</h1>
	<section>
		<article>
			<?php if($_SESSION["syntheseUser"]->getPersonne()->getId()==$post->getPosteur()->getId() || $_SESSION["syntheseUser"]->getTypeProfil()->getId()==1)
				echo '<a class="edit" href="">Éditer...</a><a class="delete" href="">Supprimer</a>';
			?>
			<h3 class="message"><?= $post->getPosteur()->getPrenom().' <span class="nomPatronymique">'.$post->getPosteur()->getNom().'</span>';?> <span class="date">le <?= $post->getDate();?></span></h3>
			<p class="commentaire"><?= $post->getContenu();?></p>
		</article>
	</section>
    <section>
		<h2>Commenter l'article</h2>
		<form method="post">
			<article>
				<dl>
					<dt><label for="contenu">Commentaire</label></dt>
					<dd class="message"><textarea name="contenu" placeholder="Écrivez votre commentaire..."></textarea></dd>
				</dl>
			</article>
			<input type="submit" name="publier" value="Commenter">
		</form>
    </section>
    <section>
        <?php foreach($post->getComs() as $com){ ?>
            <?php if($_SESSION["syntheseUser"]->getPersonne()->getId()==$com->getPers()->getId() || $_SESSION["syntheseUser"]->getTypeProfil()->getId()==1)
                echo '<a class="edit" href="message-editer">Éditer...</a><a class="delete" href="message-supprimer">Supprimer</a>';
	       ?>
            <?= $com->getPers()->getPrenom().' <span class="nomPatronymique">'.$com->getPers()->getNom();?>
            <?= $com->getDate();?>
            <?= $com->getContenu(); ?>
        <?php } ?>
    </section>
</div>
<?php
} else {
?>
    <p class="warning">Article introuvable</p>
<?php
}
?>