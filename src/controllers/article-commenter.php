<?php
if(isset($_GET['id'])){
    // Controle si droit de commenter
    require_once(MODELS_INC."PostDAO.class.php");
    require_once(MODELS_INC."CommentaireDAO.class.php");
    if(trim($_POST['contenu'])!=""){
        $com=new Commentaire(1,$_SESSION["syntheseUser"]->getPersonne(),$_GET['id'],date("Y-m-d H:i:s"),trim($_POST['contenu']));
        CommentaireDAO::create($com);
        header('Location: '.SELF.'article/'.$_GET['id'].'#gr'.$com->getId());
    }
}

?>