<?php

    if(isset($_GET['id'])){
        require_once(MODELS_INC."GroupeDAO.class.php");
        require_once(MODELS_INC."PostDAO.class.php");
        require_once(MODELS_INC."CommentaireDAO.class.php");
        //Récupération du groupe
        $gr=GroupeDAO::getById($_GET['id']);
        
        if(isset($_POST['publier'])){
            $nouveau=new Post(1,$_SESSION["syntheseUser"]->getPersonne(),date("Y-m-d H:i:s"),$_POST['contenu'],true,array());
            PostDAO::create($nouveau);
            PostDAO::publieGroupe($nouveau,$gr);
        }elseif(isset($_POST['addCom'])){
            $com=new Commentaire(1,$_SESSION["syntheseUser"]->getPersonne(),$_POST['idPost'],date("Y-m-d H:i:s"),$_POST['contenu']);   
            CommentaireDAO::create($com);
        }
        
        $posts=PostDAO::getByGroupe($gr);
        include(VIEWS_INC.'groupe.php');
    }else{
        echo "<!--meta title=\"groupe\" -->";
        echo"<center>Page introuvable</center>";
    }
?>