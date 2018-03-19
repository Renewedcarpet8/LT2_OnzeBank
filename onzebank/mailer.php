<?

function mailsender($email_adress,$mail_subject,$mail_text)
{
$webmaster_email ="noreply@ciprix.net";
$mail_reciever = stripslashes($email_adres);

$mail_extra .= 'From: ' . $webmaster_email . "\n";
$mail_extra .= 'To: ' . $mail_reciever . "\n";
$mail_extra .= 'Return-Path: ' . $webmaster_email . "\n"; 
$mail_extra .= "MIME-Version: 1.0\r\n";
$mail_extra .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$mail_extra .= "From: ".$webmaster_email."\r\n";
$mail_extra .= "X-Priority: 1\r\n";
$mail_extra .= "Date: ".date ("D, j M Y H:i:s 0")."\r\n";

mail($email_adress, 
     $mail_subject, 
     $mail_text, 
     $mail_extra, 
     "-f".$webmaster_email);
     
 }
?>