<?php
require_once(MODELS_INC.'GroupeDAO.class.php');
$droit=1;
if(isset($_GET['id'])){
    $groupe=GroupeDAO::getById($_GET['id']);
    if($_SESSION["syntheseUser"]->getPersonne()->getId()!=$groupe->getCreateur()->getId() && $_SESSION["syntheseUser"]->getTypeProfil()->getId()!=1){
        include(VIEWS_INC.'403.php');
        $droit=0;
    }else{
        if(isset($_POST['modGroupe'])){
            if(trim($_POST['nom'])!=""){
                if($groupe!=null){
                    $groupe->setNom(trim($_POST['nom']));
                    GroupeDAO::update($groupe);
                }
            }
        }elseif(isset($_POST['supprGroupe'])){
            GroupeDAO::delete($groupe);
            header('Location: '.SELF.'groupes');
        }
    }

}else{
    $groupe=null;
}
if($droit!=0){
    $lstMembre=GroupeDAO::getMembres($groupe);
    require_once(VIEWS_INC.'groupe-administrer.php');
}
?>