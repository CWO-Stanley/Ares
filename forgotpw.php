<!-- <meta http-equiv="refresh" content="0; URL=https://chattersworld.nl/ares2/forgotpw.php"> -->
<?php
/**
 * liverequest systeem
 * @author Prelution
 */
/**
 * This example shows making an SMTP connection with authentication.
 */

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';
require_once('includes/bootstrap.inc.php');
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(trim($_POST['userid']) != '') {
		$query = DB::Query("SELECT id, email, firstname, lastname FROM users WHERE username = '" . DB::Escape($_POST['userid']) . "' OR email = '" . DB::Escape($_POST['userid']) . "'");
		if(DB::NumRows($query) == 1) {
					$fetch = DB::Fetch($query);
					
					$newpass = md5(time() . $fetch['email'] . $_SERVER['REMOTE_ADDR'] . rand(100000, 999999));
					$link = 'https://ares.chattersworld.nl/newpassword.php?key=' . $newpass;
					$mail = new PHPMailer();
					//Tell PHPMailer to use SMTP
					$mail->isSMTP();
					//Enable SMTP debugging
					// SMTP::DEBUG_OFF = off (for production use)
					// SMTP::DEBUG_CLIENT = client messages
					// SMTP::DEBUG_SERVER = client and server messages
					$mail->SMTPDebug = SMTP::DEBUG_OFF;
					$mail->isHTML(true);
					// $mail->IsHTML(true);
					$mail->Host = 'mail.chattersworld.nl';
					//Set the SMTP port number - likely to be 25, 465 or 587
					$mail->Port = 587;
					//Whether to use SMTP authentication
					$mail->SMTPAuth = true;
					//Username to use for SMTP authentication
					$mail->Username = 'stanley@chattersworld.nl';
					//Password to use for SMTP authentication
					$mail->Password = '16July1984!@#';
					//Set who the message is to be sent from
					$mail->setFrom('info@chattersworld.nl', 'Verzoek Server Chattersworld.nl');
					//Set an alternative reply-to address
					// $mail->addReplyTo('info@chattersworld.nl', 'Verzoek Server Chattersworld.nl');
					// $mail->From = 'info@chattersworld.nl';
					// $mail->FromName = 'Verzoek Server Chattersworld.nl';
					$mail->AddAddress($fetch['email'], $fetch['firstname'] . ' ' . $fetch['lastname']);
					$mail->Subject = 'Wachtwoord reset van uw account voor Chattersworld Ares';
					$mail->Body = 'Beste ' . $fetch['firstname'] . ' ' . $fetch['lastname'] . ',<br /><br />
U (of iemand anders) heeft een nieuw wachtwoord aangevraagd voor het account gekoppeld aan dit e-mailadres.<br />
Wanneer u geen nieuw wachtwoord hebt aangevraagd, kunt u dit bericht negeren, u zult dan nog steeds kunnen inloggen zoals u gewend bent.<br />
Wanneer u wel een nieuw wachtwoord hebt aangevraagd, klik dan op de volgende link om het wachtwoord te bevestigen:
<a href="' . $link . '">' . $link . '</a><br /><br />
Met vriendelijke groet,<br />
Chattersworld Ares';
					$mail->AltBody = 'Beste ' . $fetch['firstname'] . ' ' . $fetch['lastname'] . ',

U (of iemand anders) heeft een nieuw wachtwoord aangevraagd voor het account gekoppeld aan dit e-mailadres.
Wanneer u geen nieuw wachtwoord hebt aangevraagd, kunt u dit bericht negeren, u zult dan nog steeds kunnen inloggen zoals u gewend bent.
Wanneer u wel een nieuw wachtwoord hebt aangevraagd, klik dan op de volgende link om het wachtwoord te bevestigen:
' . $link . '
Met vriendelijke groet,
Chattersworld Ares';
					if(!$mail->Send()) {
						$errors = 'Er is iets fout gegaan tijdens het plaatsen van uw recensie. Probeer het later opnieuw.';
					}else{
						$success = 'U ontvangt binnen enkele minuten een mail om uw wachtwoord te kunnen resetten.';
						DB::Query("UPDATE users SET newpass = '" . DB::Escape($newpass) . "' WHERE id = '" . DB::Escape($fetch['id']) . "'");
					}
		}else{
			$error = 'Er bestaat geen account met deze gegevens.';
		}
	}else{
		$error = 'Alle velden dienen te worden ingevuld.';
	}
}
require_once('template/TH4Y/forgotpw.php');
