<?php
    require_once(MODELS_INC."PostDAO.class.php");
    if(isset($_GET['id'])){
        //Récupération du groupe
        $post=PostDAO::getById($_GET['id']);
    }else{
        $posts=null;
    }
        include(VIEWS_INC.'message.php');

?>