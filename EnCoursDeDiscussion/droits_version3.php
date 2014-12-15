<?php

/* On va d'abord instancié un bojet disposeDe en fonction de la page à afficher et du type profil de la personne 
connectée. Cet objet disposeDe conteindra alors un tableau d'objets Droit. Chaque case de ce tableau contenant un 
des droits dont dispose la personne consultant la page */

include_once(CONSTANTE_DE_ROBIN_POUR_DOSSIER_DAO."/DisposeDeDAO.php");

$disposededao = new DisposeDeDAO();

$_SESSION["disposede"] = $disposededao->getByTypeProfilAndPage($_SESSION["syntheseUser"]->getTypeProfil(), $_GET["requ"]);

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

?>
