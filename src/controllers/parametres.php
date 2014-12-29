<?php

require_once(MODELS_INC.'NewsletterDAO.class.php');
 $erreurs=array();
if(isset($_POST['mod'])){
    require_once('passwordHash.inc.php');
    require_once(MODELS_INC.'CompteDAO.class.php');
    if(!isset($_POST['ancienMdp']) || trim($_POST['ancienMdp'])==""){
        $erreurs['ancien']=1;
    }else{
        $valid=validate_password(trim($_POST['ancienMdp']),$_SESSION['syntheseUser']->getMdp());
        if($valid){
            if(isset($_POST['newMdp1']) && trim($_POST['newMdp1'])!=""){
                if(isset($_POST['newMdp2']) && trim($_POST['newMdp2'])!=""){
                    if(trim($_POST['newMdp1'])==trim($_POST['newMdp2'])){

                            $_SESSION['syntheseUser']->setMdp(create_hash(trim($_POST['newMdp1'])));
                            CompteDAO::update($_SESSION['syntheseUser']);
                            $ok=1;

                    }else{
                        $erreurs['corresp']=1;
                    }
                }else{
                    $erreurs['mqConfirm']=1;
                }
            }
            //gestion de la newsletter
            if(isset($_POST['newsletter'])){
                NewsletterDAO::add($_SESSION['syntheseUser']->getPersonne());
            }else{
                NewsletterDAO::remove($_SESSION['syntheseUser']->getPersonne());
            }
        }else{
            $erreurs['ancienIncor']=1;
        }
    }

}
$abo=NewsletterDAO::abo($_SESSION['syntheseUser']->getPersonne());
include(VIEWS_INC.'parametres.php');

?>
