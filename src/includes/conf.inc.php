<?php

define('ROOT_PATH', dirname(dirname(__FILE__)));
define('CONTROLLERS_INC', ROOT_PATH.'/controllers/');
define('MODELS_INC', ROOT_PATH.'/models/');
define('VIEWS_INC', ROOT_PATH.'/views/');
define('DATA_PATH', ROOT_PATH.'/data/');

define('SELF', dirname($_SERVER['PHP_SELF']).'/');

// Nombre de caractères à afficher dans les longs <p> dans <li>
define('STR_TRONC', 380);

function __autoload($className) {
    include MODELS_INC.$className.'.class.php';
}

setlocale(LC_ALL, 'fr_FR.utf8', 'fr', 'fr_FR', 'fr_FR@euro', 'fr-FR', 'fra');

?>