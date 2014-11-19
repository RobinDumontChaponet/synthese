<?php
    require_once("models/Ancien.class.php");
    require_once("models/AncienDAO.class.php");
    
    $lst=AncienDAO::getAll();
    foreach($lst as $ancien){
        echo $ancien."<br>";   
    }
    echo "<br>";
    echo AncienDAO::getById(1);
?>