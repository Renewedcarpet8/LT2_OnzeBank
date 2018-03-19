<?php
	/**
	 * Mose Exaple page nr 1
	 * 
	 * 
	 */
	class Activate extends MosePage
	{

		function draw()
		{
			if(!isset($_REQUEST["submit"]))
			{
				return $this->form();
			} else 
			{
				$output = ""
					. "<h2>Activering voltooid</h2>"
					. "De activering van internet bankieren voor uw bankrekening is voltooid.<br />"
					. "- Het Onzebank webteam"
					;
				return $output;	
			}
		}
		function form()
		{
			$content = ""
				 . "<h2>Internet bankieren activeren</h2><br />"
				 . "<form method=\"post\" action=\"?t=activate.php\">"
				 . "	<div class=\"label\"><label for=\"uname\">Rekening nummer</label></div>"
				 . "	<input type=\"text\" class=\"textField\" id=\"uname\" name=\"uname\" value=\"\">"
				 . "	&nbsp;<br />"
				 . "	<div class=\"label\"><label for=\"reknum\">Rekening nummer</label></div>"
				 . "	<input type=\"text\" class=\"textField\" id=\"reknum\" name=\"reknum\" value=\"\">"
				 . "	&nbsp;<br />"
				 . "	<div class=\"label\"><label for=\"code\">Activatie code</label></div>"
				 . "	<input type=\"text\" class=\"textField\" id=\"code\" name=\"code\" value=\"\">"
				 . "	&nbsp;<br />"
				 . "	<input type=\"submit\" name=\"submit\" class=\"submit\" value=\"Activeren\"><br />"
				 . "</form>"
				 ;
			return $content;
		}
		function __construct()
		{
			parent::__construct();
			$infoText = <<<HEREDOC
<h2>Informatie</h2><br />
HEREDOC;
			$GLOBALS["info"]->write($infoText);
		}
	}
	new Activate();	
?>
 	