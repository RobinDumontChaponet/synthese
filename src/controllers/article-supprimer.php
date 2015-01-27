<?php
if(isset($_GET['id'])){
    require(MODELS_INC."PostDAO.class.php");
    $post=PostDAO::getById($_GET['id']);
    if($post!=null){
        if($_SESSION['user_auth']['write'] && $post->getPosteur()->getId()==$_SESSION["syntheseUser"]->getPersonne()->getId()){
            $gr=PostDAO::getGroupeByPost($post);
            PostDAO::delete($post);
            header('Location: '.SELF.'groupe/'.$gr->getId());
        }else{
            include(VIEWS_INC.'403.php');
        }
    }
}

?>