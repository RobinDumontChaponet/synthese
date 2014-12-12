<?php

/*
Dans cette version, on admet qu'on a plusieurs versions d'un même page.
Par exemple, pour la page profil, on a une page profilEtudiant.php qui contient seulement ce que l'étudiant peut faire.
On a une autre page profilAdmin dans laquelle on a des boutons en plus (Des boutons de modifications ou de suppression qu'un eleve n'a pas le droit
d'utiliser).
Je pense que cette façon de faire ne correspond pas du tout au schema E/A car dans le schema E/A, sur une seule page, on a des droits selon 
les types profil. Dans cette façon de faire, on a pas besoin de gerer les droits. En effet, la connaissance du type profil suffit pour rediriger
l'utilisateur vers la page qui lui est destinée
*/

/*
EXPLICATION DE L'ALGO
    Dans ce cas, l'algo est simple, quand une page est demandée, on verifie le profil et on redirige l'étudiant
*/

if(isset($_SESSION["typeProfil"]))
{
    include_once(dirname(__FILE__)."/views/nomdePage".$_SESSION["typeProfil"]["libelle"]);
}else{
    include_once(dirname(__FILE__)."/views/404.php");
}

/*
Ceci implique tout naturellement qu'il nous faut, dès qu'une personne se connecte, instancier un objet type profil et le placer dans la
super globale $_SESSION["typeprofil"]

Comme ceci :
*/

$_SESSION["typeProfil"] = $getTypeProfilByIdCompte($idCompte);


?>
