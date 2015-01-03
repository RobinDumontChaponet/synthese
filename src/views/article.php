<!--meta title="Message" -->
<div id="content">
<?php if($post!=null) { ?>
	<h1>Article & commentaires</h1>
	<section>
		<article id="post">
			<?php if($_SESSION["syntheseUser"]->getPersonne()->getId()==$post->getPosteur()->getId() || $_SESSION["syntheseUser"]->getTypeProfil()->getId()==1)
				if(isset($_GET['action']) && $_GET['action']=="editer"){
                    echo '<a class="edit" href="article/'.$_GET['id'].'">Annuler la modification...</a>';
                }else{
                    echo '<a class="edit" href="article-editer/'.$_GET['id'].'">Éditer...</a>';
                }   
                echo '<a class="delete" href="article-supprimer/'.$_GET['id'].'">Supprimer</a>';
			?>
			<h3 class="message">
                <a href="profil/<?= $post->getPosteur()->getId(); ?>"><?= $post->getPosteur()->getPrenom().' <span class="nomPatronymique">'.$post->getPosteur()->getNom().'</span>';?></a><span class="date"> le <?= $post->getDate();?></span>
            </h3>
            <p class="commentaire">
                <?php if(isset($_GET['action']) && $_GET['action']=="editer"){ ?>
                    <form method="POST">
                        <textarea name="contenu"><?= $post->getContenu();?></textarea>
                        <input type="submit" name="modif" value="Editer">
                    </form>
                <?php }else{ ?>
                    <?= $post->getContenu();?>
                <?php } ?>
            </p>
		</article>
	</section>
    <section>
		<h2>Commenter l'article</h2>
		<form method="post" action="article-commenter/<?= $_GET['id']; ?>">
			<article>
				<dl>
					<dt><label for="contenu">Commentaire</label></dt>
					<dd class="message"><textarea name="contenu" placeholder="Écrivez votre commentaire..." <?php if(!isset($_GET['action'])){ ?>autofocus<?php } ?>></textarea></dd>
				</dl>
			</article>
			<input type="submit" name="publier" value="Commenter">
		</form>
    </section>
    <section>
        <h2>Liste des commentaires</h2>
        <ul>
        <?php foreach($post->getComs() as $com){ ?>
            <li id="gr<?= $com->getId(); ?>">
                <?php if($_SESSION["syntheseUser"]->getPersonne()->getId()==$com->getPers()->getId() || $_SESSION["syntheseUser"]->getTypeProfil()->getId()==1)
                    echo '<a class="edit" href="article-modifier-commentaire/'.$_GET['id'].'/'.$com->getId().'#gr'.$com->getId().'">Éditer...</a><a class="delete" href="commentaire-supprimer/'.$com->getId().'">Supprimer</a>';
	            ?>
                <h3 class="message">
                    <a href="profil/<?= $com->getPers()->getId(); ?>"><?= $com->getPers()->getPrenom().' <span class="nomPatronymique">'.$com->getPers()->getNom();?></span></a> <span class="date">le <?= $com->getDate();?></span>
                </h3>
                <p class="commentaire">
                    <?php if(isset($_GET['action']) && $_GET['action']=="modCom" && ($_SESSION["syntheseUser"]->getPersonne()->getId()==$com->getPers()->getId() || $_SESSION["syntheseUser"]->getTypeProfil()->getId()==1) && $_GET['com']==$com->getId()){ // si modif ?>
                        <form method="POST">
                            <textarea name="contenu" autofocus><?= $com->getContenu(); ?></textarea>
                            <input type="submit" name="modCom" value="Modifier">
                        </form>
                    <?php }else{ ?>
                        <?= $com->getContenu(); ?>
                    <?php } ?>
                </p>
            </li>
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