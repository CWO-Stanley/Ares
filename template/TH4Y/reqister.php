<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Chattersworld Verzoekserver | Inloggen</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="templates/default/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="templates/default/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="templates/default/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-54525897-1', 'auto');
      ga('send', 'pageview');

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
            <div class="header">Welkom bij
			<img src="dist/img/cwo.png" class="img-circle" alt="User Image"></div>
            <form class="form-horizontal" enctype="multipart/form-data" role="form" action="" method="Post">

                   <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="userid">Gebruikersnaam</label>  
                      <div class="col-md-4">
                      <input id="userid" name="userid" type="text" placeholder="Gebruikersnaam" value="<?php if(isset($radio) && trim($radio->username) != '') { echo $radio->username; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="col-md-4 control-label" for="station">Radiostation</label>  
                      <div class="col-md-4">
                      <input id="station" name="station" type="text" placeholder="Radiostation" value="<?php if(isset($radio) && trim($radio->station) != '') { echo $radio->station; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label" for="station1">Adres</label>  
                      <div class="col-md-4">
                      <input id="station1" name="address" type="text" placeholder="Adres" value="<?php if(isset($radio) && trim($radio->address) != '') { echo $radio->address; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label" for="station2">Woonplaats</label>  
                      <div class="col-md-4">
                      <input id="station2" name="city" type="text" placeholder="Woonplaats" value="<?php if(isset($radio) && trim($radio->city) != '') { echo $radio->city; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label" for="station3">Postcode</label>  
                      <div class="col-md-4">
                      <input id="station3" name="postcode" type="text" placeholder="Postcode" value="<?php if(isset($radio) && trim($radio->postcode) != '') { echo $radio->postcode; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>


                    <!-- Password input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="password">Wachtwoord</label>
                      <div class="col-md-4">
                        <input id="password" name="password" type="password" placeholder="Wachtwoord" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="password2">Wachtwoord herhalen</label>
                      <div class="col-md-4">
                        <input id="password2" name="password2" type="password" placeholder="Wachtwoord herhalen" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="email">E-mailadres</label>  
                      <div class="col-md-4">
                      <input id="email" name="email" type="text" placeholder="E-mailadres" value="<?php if(isset($radio) && trim($radio->email) != '') { echo $radio->email; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Voornaam</label>  
                      <div class="col-md-4">
                      <input id="firstname" name="firstname" type="text" placeholder="Voornaam" value="<?php if(isset($radio) && trim($radio->firstname) != '') { echo $radio->firstname; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Achternaam</label>  
                      <div class="col-md-4">
                      <input id="lastname" name="lastname" type="text" placeholder="Achternaam" value="<?php if(isset($radio) && trim($radio->firstname) != '') { echo $radio->lastname; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                   <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for=""></label>
                      <div class="col-md-4">
                        <button id="" name="" class="btn btn-primary">Opslaan</button>
                      </div>
                    </div>
                    </form>
                    <p><a href="forgotpw.php">Wachtwoord vergeten?</a></p>
                </div>
            

        </div>


        <!-- jQuery 2.0.2 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="templates/default/js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>