<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', substr(realpath(dirname(__FILE__)) . DS, 0, -4));

define('URL_TEMPLATES', ROOT . 'views'. DS . 'templates' . DS );
define('URL_APP', ROOT . 'app'. DS );

/*--------------------------------------------------------------------*/

define('BASE_URL', 'http://localhost/GMG_LOCAL/');

define('URL_SECIONES', BASE_URL . 'views/seciones/');
define('URL_REDES', BASE_URL . 'views/redes_sociales/');
define('URL_CONF_GEN', BASE_URL . 'views/conf_general/');
define('URL_ADMIN', BASE_URL . 'views/administracion/');

define('CSS', BASE_URL . 'assets/css/');
define('JS', BASE_URL . 'assets/js/');
define('FONTS', BASE_URL .'assets/fonts/');
define('IMAGES', BASE_URL . 'assets/images/');

/*--------------------------------------------------------------------*/

//Configuracion de la BD a usar
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'fairoz');
define('DB_CHAR', 'utf8');
?>