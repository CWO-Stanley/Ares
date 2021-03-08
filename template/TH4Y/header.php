<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Chattersworld Ares | Dashboard</title>
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
		<meta property="og:site_name" content="Chattersworld Ares | De verzoekserver met chatbox" />
		<meta property="og:type" content="article" />
		<meta property="og:site_name" content="Ares | Chattersworld | De gratis verzoekserver met chatbox!" />
		<meta property="article:publisher" content="https://www.facebook.com/chattersworld/" />
		<meta property="fb:app_id" content="699740480138507" />
		<meta property="og:image" content="https://chattersworld.nl/webchat/img/cwobg.jpg" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="Waar chatten, chatten is!" />
		<meta name="twitter:title" content="Ares | Chattersworld | De gratis verzoekserver met chatbox!!" />
		<link rel="canonical" href="https://chattersworld.nl/" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
    <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="component/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="component/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="component/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="component/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="component/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="component/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="component/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php
                if($user->type == 2) {
                    $radioId = $_SESSION['id'];
                }else{
                    $radioId = $user->radio;
					
                }
                ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-73408859-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-73408859-2', { 'anonymize_ip': true });
</script>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '311596215978856');
  fbq('track', 'Chattersworld');
</script>
<script>
$(window).scroll(function(){
    if ($(window).scrollTop() >= 1) {
        $('nav.fixed').addClass('fixed-header');
        
    }
    else {
        $('nav.fixed').removeClass('fixed-header');
        
    }
});
</script>
</head>
<body class="hold-transition skin-blue sidebar-mini" onunload="reset_login();">
<div class="wrapper">

  <header class="main-header">
  <nav class="fixed">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Ares</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Chattersworld</b>Ares</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
		  <li>
      	  
<script src="//widget.time.is/t.js"></script>
<script>
time_is_widget.init({Voorburg_z700:{}});
</script>
</li>
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
		  <li class="dropdown user user-menu">
		  <?php
		  $checkstatus = DB::Query("SELECT status FROM users WHERE id = " . DB::Escape($_SESSION['id']));
		  if(DB::NumRows($checkstatus) == 1) {
			  $fetchstatus = DB::Fetch($checkstatus);
		  }
		  if($fetchstatus['status'] == 1) { ?>
		  <?php
	$form = DB::Query("SELECT verzoekform, status FROM users WHERE id = " . DB::Escape($_SESSION['id']));
	if(DB::NumRows($form) == 1) {
																$fetchform = DB::Fetch($form);
	}
	
	if($fetchform['verzoekform'] == 0) {
?>
		  <a href="index.php?verzoekform=1" class="btn btn-block btn-danger">Sluit verzoek formulier</a>
	<?php }else{ ?>
	<a href="index.php?verzoekform=0" class="btn btn-block btn-success">Open verzoek formulier</a>
	<?php } ?>
            
			<ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
			  
					
										</li>
										</ul>
										</li>
		  
		  <?php }else{ ?>
		  <?php if($user->status == 0) {
                                    echo '<li class="dropdown user user-menu"><a href="golive2.php" class="btn btn-block btn-danger">Verzoekserver offline, ga online</a><ul class="dropdown-menu"><li class="user-header"></li></ul></li>';
                                }
								?>
		  <?php }?>
		  <li class="dropdown user user-menu">
		  <?php
	$refresh = DB::Query("SELECT refresh FROM users WHERE id = " . DB::Escape($_SESSION['id']));
	if(DB::NumRows($refresh) == 1) {
																$fetchrefresh = DB::Fetch($refresh);
	}
?>
		  <script>
			  var timeleft = <?php echo $fetchrefresh['refresh'] ?>;
var downloadTimer = setInterval(function(){
  document.getElementById("countdown").innerHTML = timeleft + " seconden tot automatisch verversen";
  timeleft -= 1;
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").innerHTML = "Finished"
  }
}, 1000);
</script><a href="#" class="dropdown-toggle"><span id="countdown"></span></a>
            
			<ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
			  
					
										</li>
										</ul>
										</li>
		  <li class="dropdown user user-menu">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		  <img src="dist/img/c4all-ares.png" class="user-image" alt="User Image">
            Gebruikers online</a>
			<ul class="dropdown-menu">
              <!-- User image -->
              <li>
			  <?php if($user->type == 3) { ?>
			  <table class="table table-striped"><tbody>
										<tr>
										<th>Profiel</th>
										<th>Gebruikersnaam</th>
										<th>Naam</th></tr>
						<?php
                                        $query = DB::Query("SELECT * FROM users WHERE loggedin = 1 ORDER by id DESC");
										
										
                                        while($rFetch = DB::FetchObject($query)) {
                                        ?>
                                        
                                            <tr>
											<td><img src="<?php echo $site_url; ?><?php echo nl2br($rFetch->avatar); ?>" height="20" /></td>
											<td> <?php echo nl2br($rFetch->username); ?></td>
											<td> <?php echo nl2br($rFetch->firstname); ?></td></tr>
                                            
                                            
                                        
                                        <?php } ?>
										</tbody></table>
			  <?php } ?>
			  <?php if($user->type == 2 || $user->type == 1) { ?>
			  <table class="table table-striped"><tbody>
										<tr>
										<th>Profiel</th>
										<th>Gebruikersnaam</th>
										<th>Naam</th></tr>
			  <?php
                                        $users = DB::Query("SELECT radio FROM users WHERE id = " . DB::Escape($_SESSION['id']));
										$fetchusers = DB::Fetch($users);
										$query = DB::Query("SELECT * FROM users WHERE loggedin = 1 AND radio = '" . $fetchusers['radio'] . "' ORDER by id DESC");
                                        while($rFetch = DB::FetchObject($query)) {
                                        ?>
                                        
                                            <tr>
											<td><img src="<?php echo $site_url; ?><?php echo nl2br($rFetch->avatar); ?>" height="20" /></td>
											<td><p><?php echo nl2br($rFetch->username); ?></p></td>
											<td> <p><?php echo nl2br($rFetch->firstname); ?></p></td></tr>
                                            
                                            
                                        
                                        <?php } ?>
										</tbody></table>
					<?php } ?>
					
										</li>
										</ul>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<?php $query = DB::Query("SELECT avatar FROM users WHERE id = " . DB::Escape($_SESSION['id'])); if(DB::NumRows($query) == 1) {
	$fetch = DB::Fetch($query);
	echo '<img src="' . $site_url . '' . $fetch['avatar'] . '" class="user-image" alt="User Image"/>';
}
?>
              <span class="hidden-xs"><?php echo htmlentities($user->firstname); ?> <?php echo htmlentities($user->lastname); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php $query = DB::Query("SELECT avatar FROM users WHERE id = " . DB::Escape($_SESSION['id'])); if(DB::NumRows($query) == 1) {
	$fetch = DB::Fetch($query);
	echo '<img src="' . $site_url . '' . $fetch['avatar'] . '" class="user-image" alt="User Image"/>';
}
?>
                <p>
                  <?php echo htmlentities($user->firstname); ?> <?php echo htmlentities($user->lastname); ?>
                  </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="edit<?php echo $type; ?>.php" class="btn btn-default btn-flat">Profiel</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Log uit</a>
                </div>
              </li>
            </ul>
          </li>
		  <?php if($user->type == 2 || $user->type == 1) { ?>
		  <li class="dropdown user user-menu">
            <a href="instellingen.php" class="dropdown-toggle">
              <span class="hidden-xs fa fa-cog fa-fw"></span>
            </a>
		  
          </li>
		  <?php } ?>
          <!-- Control Sidebar Toggle Button -->
         </ul>
      </div>
    </nav>
	</nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php $query = DB::Query("SELECT avatar, radio FROM users WHERE id = " . DB::Escape($_SESSION['id'])); if(DB::NumRows($query) == 1) {
	$fetch = DB::Fetch($query);
	echo '<img src="' . $site_url . '' . $fetch['avatar'] . '" class="img-circle" alt="User Image"/>';
}
?>
        </div>
        <div class="pull-left info">
          <p><?php echo htmlentities($user->firstname); ?> <?php echo htmlentities($user->lastname); ?></p>
           </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
     <ul class="sidebar-menu">
	 
	 <li>
	 <center><?php if($user->type == 2 || $user->type == 1) { ?><p style="color:white;">U bent nu:<?php } ?><br>
						
                            

    <?php if($user->type == 1) { ?>
                                <?php if($user->status == 0) {
                                    echo '<a href="golive2.php"><button type="button" class="btn btn-block btn-danger">Offline, ga online</button></a>';
                                }else{
                                    echo '<a href="index.php?liveswitch=0"><button type="button" class="btn btn-block btn-success">Online ga offline</button></a>';
                                }
															$kick = DB::Query("SELECT radio, kick FROM users WHERE id = " . DB::Escape($_SESSION['id']));
															if(DB::NumRows($kick) == 1) {
																$fetchkick = DB::Fetch($kick);
                                                            $query = DB::Query("SELECT id, radio, stream, port, password FROM stream_settings WHERE radio = " . $fetchkick['radio']);
															}
            if(DB::NumRows($query) == 1) {
                    $fetch = DB::Fetch($query);
					if ($fetchkick['kick'] == 'Ja') {
            echo '<br><br><a href="kicker.php"><button type="button" class="btn btn-block btn-success">Kick Stream</button></a>';
					}
            }    
                                                            }
                                ?><br />
								
								<?php if($user->type == 2) { ?>
                                <?php if($user->status == 0) {
                                    echo '<a href="golive2.php"><button type="button" class="btn btn-block btn-danger">Offline, ga online</button></a>';
                                }else{
                                    echo '<a href="index.php?liveswitch=0"><button type="button" class="btn btn-block btn-success">Online, ga offline</button></a>';
                                }
                                                            $query = DB::Query("SELECT id, radio, stream, port, password FROM stream_settings WHERE radio = " . DB::Escape($_SESSION['id']));
            if(DB::NumRows($query) == 1) {
                    $fetch = DB::Fetch($query);
            echo '<br><br><a href="kicker.php"><button type="button" class="btn btn-block btn-success">Kick Stream</button></a><br />';
            }    
                                                            }
                                ?>
								<?php if($user->type == 2 || $user->type == 1) { ?>
							<?php echo '<iframe src="https://ares.chattersworld.nl/djdisplay.php?id=' . $fetch['radio'] . '" frameBorder="0" height="200" width="200" scrollbar="0"></iframe>'; ?>
								<?php } ?>

							</p></center>
							</li>
							<br>
							<br>
							 <li class="treeview">
							 
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
                        <?php if($type == 'radio' || $type == 'dj') { ?>
						<li class="treeview">
          <a href="ipbans.php">
            <i class="fa fa-share"></i> <span>Ban beheer</span>
            </a>
                </li>
                        
                        <?php } ?>
                        <?php if($type == 'radio') { ?>
						 <li class="treeview">
          <a href="djs.php">
            <i class="fa fa-headphones"></i>
            <span>DJ beheer</span>
			</a>
			</li>
			<li class="treeview">
          <a href="radioberichten.php">
            <i class="fa fa-envelope"></i> <span>Berichtenbalk berichten</span>
           </a>
        </li>
                       <li class="treeview">
          <a href="embedcode.php">
            <i class="fa fa-edit"></i> <span>Insluitcode's</span>
           </a>
        </li></ul>
		<ul class="sidebar-menu" data-widget="tree">
                     <li class="treeview">
						<a href="#">
            <i class="fa fa-cog"></i>
            <span>Instellingen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
                        <li>
                            <a href="streamsettings.php"><i class="fa fa-play"></i>
                                <span>Stream instellingen</span>
                            </a>
                        </li>
						<li>
                            <a href="nonstopsettings.php"><i class="fa fa-eject"></i>
                                <span>Non-Stop instellingen</span>
                            </a>
                        </li>
							<li>
                             <a href="playersettings.php"><i class="fa fa-volume-up"></i>
                                <span>Player instellingen</span>
                            </a> 
                        </li>
						<li>
                             <a href="editberichtenbalk.php"><i class="fa fa-envelope"></i>
                                <span>Berichtenbalk instellingen</span>
                            </a> 
                        </li>
						
							<li>
                             <a href="https://horus.chattersworld.nl/" target="_blank"><i class="fa fa-comments"></i>
                                <span>Chatbox instellingen</span>
                            </a> 
                        </li>
						</ul>
						</li>
						<?php } ?>
						<li>
                             <a href="help.php"><i class="fa fa-question-circle"></i>
                                <span>Help en Ondersteuning</span>
                            </a> 
                        </li>
						
						<?php if($type == 'admin') { ?>
						<li>
                            <a href="bans.php"><i class="fa fa-shield"></i>
                                <span>IP Banbeheer</span>
                            </a>
                        </li>
                        <li>
                            <a href="radios.php"><i class="fa fa-podcast"></i>
                                <span>Radio's</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="admins.php"><i class="fa fa-user"></i>
                                <span>Administrators</span>
                            </a>
                        </li>
						<li>
                            <a href="chats.php"><i class="fa fa fa-comments"></i>
                                <span>Chatboxen</span>
                            </a>
                        </li>
						<li>
                            <a href="berichten.php"><i class="fa fa fa-envelope"></i>
                                <span>Berichtenbalk</span>
                            </a>
                        </li>
						
                        <?php } ?>
                    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>