<?php
if(!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liverequest.nl - Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="templates/default/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="templates/default/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="templates/default/css/ionicons.min.css" rel="stylesheet" type="text/css" />
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
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Liverequest.nl
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo htmlentities($user->firstname); ?> <?php echo htmlentities($user->lastname); ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <p>
                                        <?php echo htmlentities($user->firstname); ?> <?php echo htmlentities($user->lastname); ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="edit<?php echo $type; ?>.php" class="btn btn-default btn-flat">Mijn gegevens</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Uitloggen</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left info">
                            <p>Welkom <?php echo htmlentities($user->firstname); ?>,</p>
                            <?php if($user->type == 1 || $user->type == 2) { ?>
                            <?php if($user->status == 0) {
                                echo '<a href="index.php?liveswitch=1"><i class="fa fa-circle text-danger"></i> Offline</a>';
                            }else{
                                echo '<a href="index.php?liveswitch=0"><i class="fa fa-circle text-success"></i> Live</a>';
                            }
                            ?>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="index.php">
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <?php if($type == 'radio' || $type == 'dj') { ?>
                        <li>
                            <a href="ipbans.php">
                                <span>Ban Beheer</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($type == 'radio') { ?>
                        <li>
                            <a href="djs.php">
                                <span>DJ Beheer</span>
                            </a>
                        </li>
                        <li>
                            <a href="embedcode.php">
                                <span>Insluitcode's</span>
                            </a>
                        </li>
                        <li>
                            <a href="streamsettings.php">
                                <span>Stream instellingen</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php if($type == 'admin') { ?>
                        <li>
                            <a href="radios.php">
                                <span>Verzoekservers</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="admins.php">
                                <span>Administrators</span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
