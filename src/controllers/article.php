<?php
    require_once(MODELS_INC."PostDAO.class.php");
    require_once(MODELS_INC."CommentaireDAO.class.php");

    if(isset($_GET['id'])){
        //Récupération du groupe
        $post=PostDAO::getById($_GET['id']);
        if(isset($_GET['action']) && $_GET['action']=="editer"){
            include(CONTROLLERS_INC.'article-editer.php');   
        }elseif(isset($_GET['action']) && $_GET['action']=="modCom"){
            include(CONTROLLERS_INC.'commentaire-editer.php');
        }
    }else{
        $posts=null;
    }
        include(VIEWS_INC.'article.php');

?>