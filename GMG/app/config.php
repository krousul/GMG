<?php
//se puede cambiar el default controller en uno lo quiere redirecionar
define('DEFAUL_CONTROLLER', 'index');
define('DEFAULT_LAYOUT', 'default');
define('DEFAULT_STRINGS', 'esp');

define('BASE_URL', 'http://localhost/FAIROZ/');
define('CLASSE', ROOT . 'models' . DS . 'class' . DS);
define('LAYOUT', BASE_URL . 'web/views/templates/' . DEFAULT_LAYOUT . '/layout/');
define('IMAGES', BASE_URL . 'web/views/templates/' . DEFAULT_LAYOUT . '/layout/img/abasto/');
define('TEMPLATES', ROOT . 'web'. DS . 'views'. DS . 'templates' . DS . DEFAULT_LAYOUT . DS);

define('XAJAX_CORE', ROOT . 'controllers'. DS . 'xajax'. DS . 'xajax_core'. DS . 'xajax.inc.php');
define('XAJAX_FUNC', ROOT . 'models'. DS . 'xajax'. DS);
define('XAJAX_JS', BASE_URL . 'controllers/xajax/');

//Configuracion de la BD a usar
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'fairoz');
define('DB_CHAR', 'utf8');
?>