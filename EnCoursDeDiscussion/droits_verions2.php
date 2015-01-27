<?php

/*
C'est la version avec laquelle je suis le plus d'accrod. Cette version respecte ce qu'il y a dans la base de données contrairement à l'autre.
En effet, dans cette version, on customise l'affichage d'une page selon les droits qu'a un certain typeprfil sur cette page. C'est donc
exactement ce qu'il y a dans la base de données
*/

/*
EXPLICATION DE L'ALGO
    Dans ce cas, on partira de deux données. La page ciblée et le type profil. Grâce à ces deux données, on obtient les droits de ce typeprofil
    sur cette page. En fonction de ces droits, on va savoir quoi afficher ou non dans la page. Cette modification d'affichage se fera grâce à des
    conditions php autour des élements à afficher selon les droits.
*/

$_SESSION["droits"] = getDroitsByPageAndTypeProfil($libellePage, $_SESSION["typeProfil"]["idProfil"]);

/*
La fonction getDroitsByPageAndTypeProfil devra renvoyer un tableau avec autant de droits que de cases.
En php, on peut le faire avec push. En effet, en utilisant push, les tableaux se comportent comme des piles.
Si un exception est levée, Mathieu, stp, renvoie un null pour mon test.
Par conséquent, on aura les verifications suivantes
*/

if($_SESSION["droits"] != NULL)
{
    $nbCases = count($_SESSION["droits"]);

    if($nbCases == 0) //On est actuellement dans le dossier controlers/
    {
        include_once(dirname(__FILE__)."/../views/404.php"); //Cela signifie que l'utilisateur n'a aucun droit sur la page, meme pas consultation
    }else{
        include_once(dirname(__FILE__)."/../views/pageAConsulter.php");
    }

}else{
    throw new Exception("Impossible d'avoir les droits pour cet utilisateur !")
}

/*
Dans la page à consulter, ce sera simple. Pour mieux illustrer l'idée, travaillons directement sur un exemple
*/
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Page test</title>
        <meta charset="UTF-8" />
    </head>

    <body>

        <!-- Mon titre que tout le monde peut voir -->
        <h1>Mon titre</h1>

        <!-- Mon bouton supprimer que pour les admins par exemple -->
        <?php if($_SESSION["droits"][0] == 1) ?>
            <input type="button" value="Supprimer" />
        <?php } ?>

        <!-- Ma photo que seul l'étudiant peut modifier parce que c'est son profil -->
        <?php if($_SESSION["droits"][1] == 1) ?>
            <input type="button" value="Modifier" />
        <?php } ?>

        <!--
        Ainsi, nous comprenons que la case 0 du tableau $_SESSION["droits"] contient 1 si le droit de suppression est accordé au type profil qui visite
        la page 0 sinin, la case 1 $_SESSION["droits"] contient 1 si le droit de modification de la page est accordé au type profil qui visite, 0 sinon         et ainsi de suite
        la page
        -->






    </body>

</html>
