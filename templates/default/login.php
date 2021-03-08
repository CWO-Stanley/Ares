<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Liverequest.nl - Inloggen</title>
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
            <div class="header">Welkom bij Liverequest.nl</div>
            <form action="index.php" method="post">
                <div class="body bg-gray">

                        <?php
                        if(isset($_POST['userid'])) {
                            if(isset($errors)) {
                                echo '<div class="alert alert-danger">' . htmlentities($errors) . '</div>';
                            }

                            if(isset($success)) {
                                echo '<div class="alert alert-success">U bent succesvol ingelogd op het liverequest.nl paneel.<br />U wordt zodadelijk doorgestuurd.</div>';
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
                </div>
            

        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="templates/default/js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>