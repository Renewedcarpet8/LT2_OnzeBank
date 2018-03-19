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
function db_num_rows($link)
{
	return mysql_num_rows($link);
}

function db_fetch_array($link)
{
	return mysql_fetch_array($link);
}
function db_query($query)
{
	return mysql_query($query);
}
?>