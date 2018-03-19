<?php
	/**
	 * Mose Exaple page nr 1
	 * 
	 * 
	 */
	class Home extends MosePage
	{

		function draw()
		{
			$content = "";
			return $content;
		}
		function __construct()
		{
			parent::__construct();
			$infoText = <<<HEREDOC
<h2>Welkom bij onzebank.</h2><br />
Dit is de internet bankier portal.<br />
U kunt <a href="http://.../">hier</a> terug gaan naar de standaard portal.
HEREDOC;
			$GLOBALS["info"]->write($infoText);
		}
	}
	new Home();	
?>
 	