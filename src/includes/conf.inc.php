<?php

/*
 * Architecture-relative
 */
define('ROOT_PATH', dirname(dirname(__FILE__)));
define('CONTROLLERS_INC', ROOT_PATH.'/controllers/');
define('MODELS_INC', ROOT_PATH.'/models/');
define('VIEWS_INC', ROOT_PATH.'/views/');
define('DATA_PATH', ROOT_PATH.'/data/');
define('LOGS_PATH', ROOT_PATH.'/logs/');

define('SELF', dirname($_SERVER['PHP_SELF']).'/');

/** Autoload **/
function __autoload($className) {
    include MODELS_INC.$className.'.class.php';
}


/*
 * Data-relative
 */

/** Strings **/
// Nombre de caractères à afficher dans les longs <p> dans <li>
define('STR_TRONC', 380);

// Nombre de lignes à afficher dans les listes et tables paginées
define('LINES_PAGE', 15);

// Nombre de lignes à afficher dans les listes et tables de la page d'accueil.
define('LAST_ITEMS_COUNT', 10);


/** Images **/
define('THUMB_UPLOAD_MAX_WIDTH', 200);

define('THUMB_UPLOAD_MAX_HEIGHT', 230);

define('ORIGINAL_UPLOAD_MAX_WIDTH', 800);

define('ORIGINAL_UPLOAD_MAX_HEIGHT', 600);

define('IMAGE_EXT', 'jpg');

define('JPEG_QUALITY', 82);


/*
 * Locales
 */
setlocale(LC_ALL, 'fr_FR.utf8', 'fr', 'fr_FR', 'fr_FR@euro', 'fr-FR', 'fra');


/*
 * Debugging
 */

// Console.log
define('JS_DEBUG', 'send'); // send (to server), true (display) or false_

?>