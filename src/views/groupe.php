<!--meta title="<?= ($groupe!=null)?'Groupe > '.$groupe->getNom():'Groupe introuvable'; ?>"-->
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
                <?php if($_SESSION["syntheseUser"]->getPersonne()->getId()==$post->getPosteur()->getId() || $_SESSION["syntheseUser"]->getTypeProfil()->getId()==1) echo '<a class="edit" href="article-editer/'.$post->getId().'">Éditer...</a><a class="delete" href="article-supprimer/'.$post->getId().'">Supprimer</a>';
                ?>
                <h3 class="message">
                    <a href="profil/<?= $post->getPosteur()->getId(); ?>"><?= $post->getPosteur()->getPrenom().' <span class="nomPatronymique">'.$post->getPosteur()->getNom();?></span></a><span class="date"> le <?= $post->getDate();?></span>
            </h3>
        <p class="commentaire">
            <?= substr($post->getContenu(), 0, STR_TRONC).((mb_strlen($post->getContenu())>STR_TRONC)?'<span class="troncat"><a href="article/'.$post->getId().'">... Lire la suite</a></span>':''); ?>
        </p>
        <?php if($post->getComs()!=array()){
                    if(count($post->getComs())>1){ ?>
        <a href="article/<?= $post->getId();?>">Voir les Commentaires</a>
        <?php }else{ ?>
        <a href="article/<?= $post->getId();?>">Voir le Commentaire</a>
        <?php } ?>
        <?php }else{ ?>
        <a href="article/<?= $post->getId();?>">Commenter</a>
        <?php } ?>
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