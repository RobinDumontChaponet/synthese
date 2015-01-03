<?php
    require_once("includes/conf.inc.php");
    require_once("models/Ancien.class.php");
    require_once("models/AncienDAO.class.php");

var_dump(AncienDAO::search(null, null, null, 2, null, null, null, null, null));
?>