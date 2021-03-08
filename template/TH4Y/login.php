<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Chattersworld Ares | Inloggen</title>
		<link rel="icon" href="https://ares.chattersworld.nl/dist/img/c4all-ares.png" sizes="32x32" />
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

        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-73408859-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-73408859-2', { 'anonymize_ip': true });
</script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Chattersworld Ares<br />Login
			<img src="dist/img/c4all-ares.png" class="img-circle" alt="User Image"></div>
            <form action="index.php" method="post">
                <div class="body bg-gray">

                        <?php
                        if(isset($_POST['userid'])) {
                            if(isset($errors)) {
                                echo '<div class="alert alert-danger">' . htmlentities($errors) . '</div>';
                            }

                            if(isset($success)) {
                                echo '<div class="alert alert-success">U bent succesvol ingelogd op Chattersworld Verzoek paneel.<br />U wordt zodadelijk doorgestuurd.</div>';
                            }

                           
                        }
                        if(isset($_GET['activated'])) {
                                echo '<div class="alert alert-success">Uw account is succesvol geactiveerd. U kunt nu inloggen.</div>';
                            }
                        ?>

                    <div class="form-group">
                        <input type="text" name="userid" class="form-control" placeholder="Gebruikersnaam"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Wachtwoord"/>
                    </div>          
		  </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Inloggen</button>  
                    </form>
                    <p><a href="forgotpw.php">Wachtwoord vergeten?</a></p>
					<p>Geen verzoekserver bij Chattersworld? <br /><a href="register">Maak dan hier een account!</a></p>
                </div>
            

        </div>


        <!-- jQuery 2.0.2 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="templates/default/js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>