<?php
require_once(MODELS_INC.'GroupeDAO.class.php');

if(isset($_GET['id'])){
    $groupe=GroupeDAO::getById($_GET['id']);
    if($_SESSION["syntheseUser"]->getPersonne()->getId()!=$post->getPosteur()->getId() && $_SESSION["syntheseUser"]->getTypeProfil()->getId()!=1){
        include(VIEWS_INC.'403.php');
    }

}else{
    $groupe=null;   
}

require_once(VIEWS_INC.'administrer-groupe.php');
?>