<?php
// database
if(USE_DB === true)
{
	if(!include(MOSE . "system/db/" . USE_DB_TYPE . ".php"))
	{
		$GLOBALS["db_pass"] = false;
		exit("unable to open database module");
	}
} else
{
	$GLOBALS["db_pass"] = true;
}

// other
include(MOSE . "/system/menu.php");
include(MOSE . "/system/parser.php");
include(MOSE . "/system/content.php");
include(MOSE . "/system/Mose.php");
include(MOSE . "/system/MosePage.php");

$GLOBALS["stop"]= false;
$GLOBALS["opdracht"] = "home.php";
if(isset($_REQUEST["t"]))
	$GLOBALS["opdracht"] = $_REQUEST["t"];

if(LOGIN_ENABLED)
	include("system/login.php");

$files = scandir("./" . CLASSPATH);
foreach($files as $field => $value)
{
	if((!$GLOBALS["stop"]) && (substr($value,-4,4) == ".php"))
		include(CLASSPATH . $value);
}

include(PAGEPATH . $GLOBALS["opdracht"]);

?>