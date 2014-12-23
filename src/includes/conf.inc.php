<?php

define('ROOT_PATH', dirname(dirname(__FILE__)));
define('CONTROLLERS_INC', ROOT_PATH.'/controllers/');
define('MODELS_INC', ROOT_PATH.'/models/');
define('VIEWS_INC', ROOT_PATH.'/views/');
define('DATA_PATH', ROOT_PATH.'/data/');

function __autoload($className) {
    include MODELS_INC.$className.'.class.php';
}

?>