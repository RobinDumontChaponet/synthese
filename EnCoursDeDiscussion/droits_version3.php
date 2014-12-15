<?php

/* On va d'abord instancié un bojet disposeDe en fonction de la page à afficher et du type profil de la personne 
connectée. Cet objet disposeDe conteindra alors un tableau d'objets Droit. Chaque case de ce tableau contenant un 
des droits dont dispose la personne consultant la page */

include_once(CONSTANTE_DE_ROBIN_POUR_DOSSIER_DAO."/DisposeDeDAO.php");

$disposededao = new DisposeDeDAO();

$diposede = $disposededao->getByTypeProfilAndPage($_SESSION["syntheseUser"]->getTypeProfil(), $_GET["requ"]);

?>
