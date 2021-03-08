<?php
/**
 * Verzoekserv systeem
 * @author Prelution
 */
 //Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php'; 
require_once('includes/bootstrap.inc.php');

?>
<?php
		
		?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Chattersworld Ares | Registeren</title>
		<link rel="icon" href="https://chattersworld.nl/wp-content/uploads/2018/10/cropped-c4all-1-32x32.png" sizes="32x32" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
		<meta name="language" content="Dutch" />
		<meta name="keywords" content="chatten, gezellig kletsen, Chattersworld, Radio chat, Gezellig, Chatten zonder registratie, 24/7 Verzoekjes, Live verzoek, Radio Chat, webcam, webcamchat, triviant," />
		<meta name="description"  content="Chattersworld De enige Chatserver waar je gratis kan chatten, chatten zonder registratie, chatten met webcams en dat allemaal gratis, gratis verzoekserver" />
		<meta name="google-site-verification" content="-hrJp-Kl7mtCVBOR5Dg45R52OfEAmnIceApYxPMluc4" />
		<meta name="robots" content="index,follow,noodp,noydir" />
		<meta name="description" content="Waar chatten, chatten is!"/>
		<meta property="og:locale" content="nl_NL" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="Ares | Chattersworld | De gratis verzoekserver met chatbox!" />
		<meta property="og:description" content="Chat voor Jong en Oud" />
		<meta property="og:url" content="https://chattersworld.nl/" />
		<meta property="og:site_name" content="#RadioRatjetoe | Chattersworld Chat" />
		<meta property="og:type" content="article" />
		<meta property="og:site_name" content="Ares | Chattersworld | De gratis verzoekserver met chatbox!" />
		<meta property="article:publisher" content="https://www.facebook.com/chattersworld/" />
		<meta property="fb:app_id" content="699740480138507" />
		<meta property="og:image" content="https://chattersworld.nl/webchat/img/cwobg.jpg" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="Waar chatten, chatten is!" />
		<meta name="twitter:title" content="Ares | Chattersworld | De gratis verzoekserver met chatbox!!" />
		<link rel="canonical" href="https://chattersworld.nl/" />
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="templates/default/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="templates/default/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="templates/default/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-73408859-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-73408859-2', { 'anonymize_ip': true });
</script>
<script src="https://www.google.com/recaptcha/api.js?render=6Ld6Y4AUAAAAAH6uCWtHPw9psZxn8qZ7Rqy2ysWL"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6Ld6Y4AUAAAAAH6uCWtHPw9psZxn8qZ7Rqy2ysWL', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
	<?php // Check if form was submitted:
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = '6Ld6Y4AUAAAAAFi3mHJoDQ2Pg2Mb8MduZ5GNwaH_';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {
        								
			if(trim($_POST['firstname']) == '' || trim($_POST['lastname']) == '' || trim($_POST['station']) == '' || trim($_POST['email']) == '' || trim($_POST['userid']) == '' || trim($_POST['password']) == '' || trim($_POST['password2']) == ''  || trim($_POST['address']) == '' || trim($_POST['city']) == '' || trim($_POST['postcode']) == '') {
				$errors =  'Alle velden dienen ingevuld te worden!';
										
									}else{
				if(DB::NumRows(DB::Query("SELECT id FROM users WHERE username = '" . DB::Escape($_POST['userid']) . "'")) == 0) {
					if($_POST['password'] == $_POST['password2']) {
						if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
							$activatie_code = md5(sha1(time() . $_SERVER['REMOTE_ADDR']));
							$query = DB::Query("INSERT INTO users (username, station, password, email, firstname, lastname, type, avatar, nonstopavatar, address, city, postcode, activated, activationkey, refresh, radio, canchange) VALUES
												('" . DB::Escape($_POST['userid']) . "', 
												 '" . DB::Escape($_POST['station']) . "', 
												 '" . DB::Escape(Users::Hash($_POST['password'])) . "', 
												 '" . DB::Escape($_POST['email']) . "', 
												 '" . DB::Escape($_POST['firstname']) . "', 
												 '" . DB::Escape($_POST['lastname']) . "', 
												 '2',
												 '/avatars/noavatar.png',
												 '/noavatar.png',
												 '" . DB::Escape($_POST['address']) . "', 
												 '" . DB::Escape($_POST['city']) . "',
												 '" . DB::Escape($_POST['postcode']) . "',
												 0,
												 '" . DB::Escape($activatie_code) . "',
												 '999',
												 '0',
												 'Ja');
											");
											DB::Query("UPDATE users SET radio=last_insert_id() WHERE id=last_insert_id()");


							if($query) {
								$activatie_link = 'https://ares.chattersworld.nl/activeren.php?email=' . urlencode($_POST['email']) . '&code=' . urlencode($activatie_code);
								
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
					$mail->Subject = 'Activatie van uw account voor Chattersworld Ares';
					$mail->Body = 'Beste ' . $_POST['firstname'] . ' ' . $_POST['lastname'] . ',<br />Bedankt voor de recente registratie op Chattersworld, om uw account te bevestigen moet je op de onderstaande link klikken: <br />
<a href="' . $activatie_link . '">' . $activatie_link . '</a><br />
<br />
Met vriendelijke groet,<br />
Chattersworld';
					$mail->AltBody = 'Beste ' . $_POST['firstname'] . ' ' . $_POST['lastname'] . ',
Bedankt voor de recente registratie op Chattersworld, om uw account te bevestigen moet je op de onderstaande link klikken: 
' . $activatie_link .  '

Met vriendelijke groet,
Chattersworld';
					if(!$mail->Send()) {
						$errors = 'Er is iets fout gegaan tijdens het activeren van uw account. Probeer het later opnieuw.';
					}else{
						$success = 'Het account is succesvol aangemaakt. U ontvangt binnen enkele minuten een mail om uw account te kunnen activeren, controleer ook uw spam box.';
					}
								
							}else{
								$errors = 'Er is iets fout gegaan tijdens het aanmaken van uw account.';
							}
						}else{
							$errors = 'Het ingevulde e-mailadres is niet geldig.';
						}
					}else{
						$errors = 'De wachtwoorden komen niet overeen!';
					}
				}else{
					$errors = 'Er bestaat al een account met deze gegevens.';
				}
			}
		
    } else {
        $errors = 'Captcha not valid!';// Not verified - show form error
    }

} ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="register-box" id="login-box">
            <div class="header">Ares Registratie formulier
			<img src="https://ares.chattersworld.nl/dist/img/cwo.png" height="300" class="img-circle" alt="User Image"></div>
            <form class="form-horizontal" enctype="multipart/form-data" role="form" action="" method="Post">
				<div class="body bg-gray">
				<?php
                        if(isset($_POST['userid'])) {
                            if(isset($errors)) {
                                echo '<div class="alert alert-danger">' . htmlentities($errors) . '</div>';
                            }

                            if(isset($success)) {
                                echo '<div class="alert alert-success">' . htmlentities($success) . '</div>';
								echo '<meta http-equiv="refresh" content="5; url=index.php" />';
                            }

                           
                        } ?>
                   <!-- Text input-->
                    <div class="form-group">
					<script type="text/javascript">

				function CheckSpace(event)
				{
					if(event.which ==32)
					{
						event.preventDefault();
						return false;
					}
				}
				</script>
                      <!-- <label class="col-md-4 control-label" for="userid">Gebruikersnaam</label>
                      <div class="col-md-4"> -->
                      Gebruikersnaam: <br/><input id="userid" name="userid" type="text" placeholder="Gebruikersnaam" value="<?php if(isset($radio) && trim($radio->username) != '') { echo $radio->username; } ?>" class="form-control" onkeypress="CheckSpace(event)">
                        
                      </div>
                    <!-- </div> -->
					 <!-- Password input-->
                    <div class="form-group">
                      <!-- <label class="col-md-4 control-label" for="password">Wachtwoord</label>
                      <div class="col-md-4"> -->
                        Wachtwoord: <br/><input id="password" name="password" type="password" placeholder="Wachtwoord" class="form-control">
                        
                      </div>
                    <!-- </div> -->

                    <!-- Password input-->
                    <div class="form-group">
                      <!-- <label class="col-md-4 control-label" for="password2">Wachtwoord herhalen</label>
                      <div class="col-md-4"> -->
                        Wachtwoord herhalen: <br/><input id="password2" name="password2" type="password" placeholder="Wachtwoord herhalen" class="form-control">
                        
                      </div>
                    <!-- </div> -->

                    <div class="form-group">
                      <!-- <label class="col-md-4 control-label" for="station">Radiostation</label>  
                      <div class="col-md-4"> -->
                      Radio station: <br/><input id="station" name="station" type="text" placeholder="Radiostation" value="<?php if(isset($radio) && trim($radio->station) != '') { echo $radio->station; } ?>" class="form-control">
                        
                      </div>
                    <!-- </div> -->
					<div class="form-group">
                      <!-- <label class="col-md-4 control-label" for="email">E-mailadres</label>  
                      <div class="col-md-4"> -->
                      Email adres: <br/><input id="email" name="email" type="text" placeholder="E-mailadres" value="<?php if(isset($radio) && trim($radio->email) != '') { echo $radio->email; } ?>" class="form-control">
                        
                      </div>
                    <!-- </div> -->
					  <!-- Text input-->
                    <div class="form-group">
                      <!-- <label class="col-md-4 control-label" for="firstname">Voornaam</label>  
                      <div class="col-md-4"> -->
                      Voornaam: <br/><input id="firstname" name="firstname" type="text" placeholder="Voornaam" value="<?php if(isset($radio) && trim($radio->firstname) != '') { echo $radio->firstname; } ?>" class="form-control">
                        
                      </div>
                    <!-- </div> -->

                    <!-- Text input-->
                    <div class="form-group">
                      <!-- <label class="col-md-4 control-label" for="lastname">Achternaam</label>  
                      <div class="col-md-4"> -->
                      Achternaam: <br/><input id="lastname" name="lastname" type="text" placeholder="Achternaam" value="<?php if(isset($radio) && trim($radio->firstname) != '') { echo $radio->lastname; } ?>" class="form-control">
                        
                      </div>

                    <div class="form-group">
                      <!-- <label class="col-md-4 control-label" for="station1">Adres</label>  
                      <div class="col-md-4"> -->
                      Straat: <br/><input id="station1" name="address" type="text" placeholder="Straatnaam" value="<?php if(isset($radio) && trim($radio->address) != '') { echo $radio->address; } ?>" class="form-control">
                        
                      </div>
                    <!-- </div> -->
					<div class="form-group">
                      <!-- <label class="col-md-4 control-label" for="station3">Postcode</label>  
                      <div class="col-md-4"> -->
                      Postcode: <br/><input id="station3" name="postcode" type="text" placeholder="Postcode" value="<?php if(isset($radio) && trim($radio->postcode) != '') { echo $radio->postcode; } ?>" class="form-control">
                        
                      </div>
                    <div class="form-group">
                      <!-- <label class="col-md-4 control-label" for="station2">Woonplaats</label>  
                      <div class="col-md-4"> -->
                      Woonplaats: <br/><input id="station2" name="city" type="text" placeholder="Woonplaats" value="<?php if(isset($radio) && trim($radio->city) != '') { echo $radio->city; } ?>" class="form-control">
                        
                      </div>
                   
					</div>
                   <!-- Button -->
                    <div class="footer">
                      <label class="col-md-4 control-label" for=""></label>
                      
                        <button type="submit" id="" name="" class="btn bg-olive btn-block">Registreer</button>
						<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                      
                    
                    </form>
                    <p><a href="forgotpw.php">Wachtwoord vergeten?</a></p>
					<p><a href="index.php">Inloggen</a></p>
					</div>
                </div>
				
            

        


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="templates/default/js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>