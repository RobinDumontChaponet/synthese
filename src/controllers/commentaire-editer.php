<?php
    if(isset($_POST['modCom']) && isset($_GET['id']) && isset($_GET['com'])){
        if(trim($_POST['contenu'])!=""){
            $com=CommentaireDAO::getById($_GET['com']);
            $com->setContenu(trim($_POST['contenu']));
            CommentaireDAO::update($com);
            header('Location: '.SELF.'article/'.$_GET['id'].'#gr'.$_GET['com']);
        }
    }
?>