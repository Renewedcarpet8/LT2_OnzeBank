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
Onzebank is een website gemaakt voor het security thema van de Hanzehogeschool Groningen<br />
&nbsp;<br />
Voor vragen of contact informatie zult u op <a href="http://www.hanze.nl/">www.hanze.nl</a> terecht kunnen.<br />
HEREDOC;
			$GLOBALS["info"]->write($infoText);
		}
	}
	new Home();	
?>
 	