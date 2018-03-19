<?php
$GLOBALS["mysql"] = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS);
$GLOBALS["db_pass"] = false;
if(!$GLOBALS["mysql"])
{
	echo "<p>Failed to connect with the database...</p>";
	exit();
} else 
{
	$GLOBALS["db_pass"] = (mysql_select_db(MYSQL_DB,$GLOBALS["mysql"]);
}
?>