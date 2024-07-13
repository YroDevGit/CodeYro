<?php
/**
 * CodeYRO Mailer
 * Email config
 */
 //Configuration here...
 $protocol = 'smtp';
 $smtp_host = 'smtp.gmail.com'; //email host
 $smtp_port = 587; // or 465 for SSL
 $smtp_user = ""; //Your email address
 $smtp_pass = ""; //Your email password
 $mail_type = "html"; 
 $charset = "iso-8859-1";



















 










 












 //Don't modify anything below. might cause errors.
 define("cy_protocol", $protocol);
 define('cy_smtp_host', $smtp_host);
 define('cy_smtp_port', $smtp_port);
 define('cy_smtp_user', $smtp_user);
 define('cy_smtp_pass', $smtp_pass);
 define('cy_mail_type', $mail_type);
 define('cy_charset', $charset);
?>