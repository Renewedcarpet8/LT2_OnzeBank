<?php
$GLOBALS["mysql"] = true;
$GLOBALS["db_pass"] = true;

function db_num_rows($link)
{
	return 0;
}

function db_fetch_array($link)
{
	return array("id" => "1","name" => "test system", "password" => md5("test"), "sessionid" => session_id());
}
function db_query($query)
{
	return true;
}
?>