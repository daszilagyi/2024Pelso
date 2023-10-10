<?php 

/**Load config */
require_once dirname(__FILE__) . '/config/config.php';
//load libraries
//load helpers
require_once dirname(__FILE__) . '/helpers/url_helper.php';
require_once dirname(__FILE__) . '/helpers/session_helper.php';

// autoload core libraries
spl_autoload_register(function($className){
    require_once dirname(__FILE__) . '/libraries/' . $className . '.php';

});