<?php

    if((isset($_POST['listeAdressesMel'])))
    {
        include(VIEWS_INC.'messages.php');
    }else
    {
        $msgErrAdresse = "Sélectionner des anciens !";
        include(VIEWS_INC.'recherche.php');
    }

?>
