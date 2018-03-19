<?php
define("HTTPS_LINK","http://school.ciprix.net/onzebank-sec/");
define("MOSE","./mose/");
define("CLASSPATH","./classes/");
define("PAGEPATH","./pages/");
define("TEMPLATE_DIR","./templates/");

// general database info
define("USE_DB",true);
define("USE_DB_TYPE","test");

// mysql database connection information
define("MYSQL_USER","");
define("MYSQL_PASS","");
define("MYSQL_DB","");
define("MYSQL_HOST","localhost");

define("USE_LOGIN",true);

/**
 * Below these lines please do not edit to prevent wrong circumstances
 * 
 * Editing may result in wrong modules being loaded or weird errors.
 */

if(USE_DB && USE_LOGIN)
	define("LOGIN_ENABLED",true);
else
	define("LOGIN_ENABLED",false);



?>