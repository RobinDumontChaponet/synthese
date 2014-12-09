<?php
    require_once(MODELS_INC.'Ancien.class.php');
    require_once(MODELS_INC.'AncienDAO.class.php');

    $lst=AncienDAO::getAll();
    foreach($lst as $ancien){
        echo $ancien."<br>";
    }
    echo "<br>";
    echo AncienDAO::getById(1);
?>