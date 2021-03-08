<?php
/**
 * liverequest systeem
 * @author Prelution
 */
//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';
require_once('includes/bootstrap.inc.php');

if(Users::LoggedIn() && $user->type == 2) {


	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$success = false;
		$error = '';
		if(trim($_POST['userid']) == '' || trim($_POST['password']) == '' || trim($_POST['password2']) == '' || trim($_POST['email']) == '' || trim($_POST['firstname']) == '' || trim($_POST['lastname']) == '') {
			$error = 'U dient alle velden in te vullen.';
		}elseif(DB::NumRows(DB::Query("SELECT id FROM users WHERE username = '" . DB::Escape($_POST['userid']) . "'")) != 0) {
			$error = 'Er bestaat al een gebruiker met deze gebruikersnaam.';
		}elseif($_POST['password'] == $_POST['password2'] && DB::NumRows(DB::Query("SELECT id FROM users WHERE username = '" . DB::Escape($_POST['userid']) . "'")) == 0) {

				if($_FILES['avatar']['name'] != ''){
						$filename = htmlspecialchars($_FILES['avatar']['name']);

						$extension =  pathinfo($filename, PATHINFO_EXTENSION);
						$extension = strtolower($extension);
						list($width, $height, $type, $attr) = getimagesize($_FILES['avatar']['tmp_name']);

						if ($width > 300 || $height > 300) {
						    $error = 'Je avatar mag niet groter dan 150px breed en 150px hoog zijn!';
						}else if ($_FILES['avatar']['size'] > 500000 ) {
						    $error = 'Je avatar is te groot.';    
						}else if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
							$error = 'Je avatar exentie mag enkel een JPG, PNG of GIF zijn en mag niet groter dan 80kb zijn!';
						}else{
						$image_name = strtolower($_POST['userid']) . '.' . $extension;

						$newname = "avatars/".$image_name;

						$copied = copy($_FILES['avatar']['tmp_name'], $newname);

						if (!$copied)
						{
							$error = 'Er ging wat mis tijdens het uploaden, je gegevens zijn niet opgeslagen.';
						}

						//DB::Query("UPDATE users SET avatar='/".DB::Escape($newname)."' WHERE id = '" . DB::Escape($user->id)."'");
					   }

					}else{ $newname = "avatars/noavatar.png"; }
				if($error == '') {
					$query = DB::Query("SELECT * FROM users WHERE id = " . DB::Escape($_SESSION['id']));
					$fetch = DB::Fetch($query);
					$mail = new PHPMailer;
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
					$mail->AddAddress($_POST['email'], $_POST['firstname'] . ' ' . $_POST['lastname']);
					$mail->Subject = 'Aanmelding van uw account voor Chattersworld Ares';
					$mail->Body = 'Beste ' . $_POST['firstname'] . ' ' . $_POST['lastname'] . ',<br /><br />
					
Het station <b>' . $fetch['station'] . '</b> heeft je zojuist aangemeld als DJ.<br /><br />
					
Uw gebruikersnaam: <b>' . $_POST['userid'] . '</b><br />
Uw wachtwoord: <b>' . $_POST['password'] . '</b><br /><br />
					
Met deze gegevens kunt u inloggen op <a href="https://ares.chattersworld.nl">Chattersworld Ares</a><br /><br />
					
					
Met vriendelijke groet,<br />
Chattersworld';
					if(!$mail->Send()) {
						$errors = 'Er is iets fout gegaan tijdens het plaatsen van uw recensie. Probeer het later opnieuw.';
					}else{
					
					DB::Query("INSERT INTO users (username, password, email, firstname, lastname, radio, kick, station, refresh, type, canchange, avatar) VALUES 
						('" . DB::Escape($_POST['userid']) . "', 
						 '" . DB::Escape(Users::Hash($_POST['password'])) . "', 
						 '" . DB::Escape($_POST['email']) . "', 
						 '" . DB::Escape($_POST['firstname']) . "', 
						 '" . DB::Escape($_POST['lastname']) . "', 
						 '" . DB::Escape($_SESSION['id']) . "',
						 '" . DB::Escape($_POST['kick']) . "',
						 '" . $fetch['station'] . "',
						 '999',
						 '1',
						 '" . DB::Escape($_POST['canchange']) . "',
						 '/".DB::Escape($newname)."');
					");
$success = true;
				}
				}
				$error = '';
			}
			
		}

	$user = new User($_SESSION['id']);
	require_once('template/TH4Y/header.php');

	//$query = DB::Query("SELECT id, username, email, firstname, lastname FROM admins");
	
	require_once('template/TH4Y/djform3.php');
	require_once('template/TH4Y/footer.php');
}else{
	header('Location: ' . $site_url);
}