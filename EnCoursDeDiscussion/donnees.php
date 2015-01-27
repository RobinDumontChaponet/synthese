<?php

include_once($_SERVER['SERVER_NAME']."~dumont28u/synthese/src/models/AncienDAO.class.php");

header("Content-Type: text/xml");

echo "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\" ?>";


$listeSuggestions = search($_GET["nom"], $_GET["prenom"], $_GET["promotion"], $_GET["diplomedut"], $_GET["typesspecialisations"], $_GET["specialisation"], $_GET["diplomepostdut"], $_GET["etablissementpostdut"], $_GET["travailactuel"]);

echo "<personnes>";

    for($i = 0; $i < $listeSuggestions.count(); $i++)
    {
        echo "<personne><nom>".$listeSuggestions[i][0]."</nom><prenom>".$listeSuggestions[i][1]."</prenom><promotion>".$listeSuggestions[i][2]."</promotion><diplomedut>".$listeSuggestions[i][3]."</diplomedut><typesspecialisations>".$listeSuggestions[i][4]."</typesspecialisations><specialisation>".$listeSuggestions[i][5]."</specialisation><diplomepostdut>".$listeSuggestions[i][6]."</diplomepostdut><etablissementpostdut>".$listeSuggestions[i][7]."</etablissementpostdut><travailactuel>".$listeSuggestions[i][8]."</travailactuel></personne>";
    }

echo "</personnes>"



?>
