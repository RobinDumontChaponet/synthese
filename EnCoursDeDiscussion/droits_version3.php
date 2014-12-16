<?php

/* On va d'abord instancié un bojet disposeDe en fonction de la page à afficher et du type profil de la personne 
connectée. Cet objet disposeDe conteindra alors un tableau d'objets Droit. Chaque case de ce tableau contenant un 
des droits dont dispose la personne consultant la page */

include_once(CONSTANTE_DE_ROBIN_POUR_DOSSIER_DAO."/DisposeDeDAO.php");
include_once(CONSTANTE_DE_ROBIN_POUR_DOSSIER_DAO."/PageDAO.php");

$disposededao = new DisposeDeDAO();
$pagedao = new PageDAO();

$page = $pagedao->getByNom($_GET["requ"]);
$_SESSION["disposede"] = $disposededao->getByTypeProfilAndPage($_SESSION["syntheseUser"]->getTypeProfil(), $page);


/* On verifie ensuite si le tableau est vide. Si le tableau est vide, cela veut dire que l'utilisateur
n'a pas le droit de consulter la page. Sinon, on affiche les éléments en fonction de ses droits */

if($_SESSION["disposede"] != NULL)
{
    $nbCases = count($_SESSION["disposede"]);
    
    if($nbCases == 0) //On est actuellement dans le dossier controlers/
    {
        include_once(CONSTANTES_DE_ROBIN_POUR_AFFICHER."/404.php"); //Cela signifie que l'utilisateur n'a aucun droit sur la page, meme pas consultation
    }else{
        include_once(CONSTANTES_DE_ROBIN_POUR_AFFICHER."/pageAConsulter.php");
    }
    
}else{
    throw new Exception("Impossible d'avoir les droits pour cet utilisateur !")
}


/* Ensuite, il va s'agir d'afficher chaque bloque de code selon que l'utilisateur soit autorisé ou non de les 
visualiser. Plus précisemment, dans la variable $_SESSION["disposede"], nous aurons une instance de la classe
DisposeDe qui contient elle même un tableau de droits. Nous allons alors vérifier si dans ce tableau se
trouve le droit que requiert le bloc de code à afficher pour être afficher, si oui, alors on l'affiche,
si non, on ne l'affiche pas*/

//Exemple de bloc affichable sous condition

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8" />
    </head>
    
    <body>
        <?php if(in_array("lire", $_SESSION["disposede"]->getDroits)){ ?>
            <!-- Mon bloc à afficher -->
        <?php } ?>
    </body>

    <!-- REMARQUE : les chaines de caracteres lire, ecrire etc correspondant à des droits peuvent
    biensur etre remplacés par des constantes pour ne pas se tromper dans l'orthographe et minimiser
    les erreurs-->
</html>

?>
