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
Als u al een bank rekening bij ons hebt kunt u sinds kort ook gebruik maken van internet bankieren.<br />
&nbsp;<br />
U hoeft daar alleen maar het volgende voor te doen.<br />
volg <a href="?t=signup.php">deze link</a> om u aan te melden voor internet bankieren<br />
HEREDOC;
			$GLOBALS["info"]->write($infoText);
		}
	}
	new Home();	
?>
 	