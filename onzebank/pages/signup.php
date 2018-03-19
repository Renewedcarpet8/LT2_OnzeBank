<?php
	/**
	 * Mose Exaple page nr 1
	 * 
	 * 
	 */
	class SignUp extends MosePage
	{

		function draw()
		{
			if(!isset($_REQUEST["submit"]))
			{
				return $this->form();
			} else 
			{
				$email = $_REQUEST["email"];
				$content = parser("email.pht");
				$subject = "Aanvraag internet bankieren.";
				$this->mail($email, $subject, $content);
	
				$output = ""
					. "<h2>Aanvraag verzonden</h2>"
					. "Uw aanvraag is verzonden en ontvangen. Graag willen wij u hartelijk bedanken voor uw aanvraag.<br />\n"
					. "Binnen enkele minuten zult u een email ontvangen met daarin de andere informatie die nodig is om gebruik te kunnen maken van onze internet bankier service.<br />"
					. "&nbsp;<br />"
					. "- Het Onzebank webteam"
					;
				return $output;	
			}
		}
		function form()
		{
			$content = ""
				 . "<h2>Aanvragen internet bankieren</h2><br />"
				 . "<form action=\"?t=signup.php\" method=\"POST\">"
				 . "	<div class=\"label\"><label for=\"email\">E-mail adres</label></div>"
				 . "	<input type=\"text\" class=\"textField\" name=\"email\" id=\"email\" value=\"\">"
				 . "	<br />"
				 . ""
				 . "	<input type=\"submit\" class=\"submit\" name=\"submit\" value=\"Versturen\">"
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

		function mail($email_adres, $mail_subject,$mail_text)
		{
			$webmaster_email ="noreply@ciprix.net";
			$mail_reciever = stripslashes($email_adres);

			$mail_extra = 'From: ' . $webmaster_email . "\n";
			$mail_extra .= 'To: ' . $mail_reciever . "\n";
			$mail_extra .= 'Return-Path: ' . $webmaster_email . "\n"; 
			$mail_extra .= "MIME-Version: 1.0\r\n";
			$mail_extra .= "Content-type: text/plain; charset=iso-8859-1\r\n";
			$mail_extra .= "From: ".$webmaster_email."\r\n";
			$mail_extra .= "X-Priority: 1\r\n";

			mail($email_adres, $mail_subject, $mail_text, $mail_extra, "-f" . $webmaster_email);
		}
	}
	new SignUp();	
?>
 	