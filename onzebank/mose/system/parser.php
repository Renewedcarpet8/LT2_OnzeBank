<?php
function parser($file,$var = array())
{
	$templatedir = "";
	if(defined("TEMPLATE_DIR"))
			$templatedir = TEMPLATE_DIR;
	
	$output = "";
	ob_start();
		include($templatedir . $file);    
	$output = ob_get_clean();
	return $output;
} 
?>