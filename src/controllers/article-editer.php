<?php
    if(isset($_POST['modif'])){
        if(trim($_POST['contenu'])!=""){
            $post->setContenu(trim($_POST['contenu']));
            PostDAO::update($post);
            header('Location: '.SELF.'article/'.$_GET['id'].'#post');
        }
    }
?>