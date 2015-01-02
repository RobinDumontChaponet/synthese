<!--meta title="groupe" -->
<?php 
    if($gr!=null){
?>
<div id="content">
    <h1>Discussion de groupe : <?= $gr->getNom(); ?></h1>
    <br>
    <table>
    <!-- Formulaire pour ajouter des posts -->
    <tr>
        <td>Publier dans le groupe<br></td>
    </tr>
    <tr>
        <td>
            <form method="POST">
                <textarea name="contenu" style="width:90%;">Entrez votre contenu</textarea>
                <input type="submit" name="publier" value="Publier" style="float:right;">
            </form>
        </td>
    </tr>
    <tr>
        <td>Liste des Posts</td>
    </tr>
    <!-- liste des posts -->
    <?php
        foreach($posts as $post){
    ?>
        <tr>
            <td>
                    <!--  Post -->
                <div style="float:right;">
                    <?php if($_SESSION["syntheseUser"]->getPersonne()->getId()==$post->getPosteur()->getId() || $_SESSION["syntheseUser"]->getTypeProfil()->getId()==1){ // si Posteur ou Admin ?>
                        <a href="">Supprimer le post</a> <a href="">Modifier le post</a>
                    <?php } ?>                    
                </div>
                 <b><?= $post->getPosteur()->getNom()." ".$post->getPosteur()->getPrenom(); ?></b><br>
                <b><?= $post->getDate(); ?></b><br>
                 <?= $post->getContenu(); ?><br>
                 Commentaire :<br>
                 <form method="POST">
                    <input type="text" name="contenu" placeholder="Ajouter un commentaire">
                    <input type="hidden" name="idPost" value="<?= $post->getId(); ?>">
                    <input type="submit" value="Commenter" name="addCom">
                 </form><br>
                     <?php
                        foreach($post->getComs() as $com){
                    ?>
                        <!--  Commentaire -->
                     <?= $com->getPers()->getNom()." ".$com->getPers()->getPrenom(); ?><br>
                        <?= $com->getContenu(); ?><br>
                    <?php
                        }
                    ?>
            </td>
        </tr>
    <?php
        }
    ?>
    </table>
</div>
<?php 
    }else{
?>
    <p class="warning">Groupe Introuvable</p>
<?php
    }
?>