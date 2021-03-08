<?php
require_once('includes/bootstrap.inc.php');
?>
<link href='https://fonts.googleapis.com/css?family=Baloo' rel='stylesheet'>
<meta http-equiv="refresh" content="180">
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
<style>
body {
    font-family: 'Baloo';
	font-size: 9px;
	top: 0;
}
 

h2 {
  position: absolute;
  bottom: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.75);
  padding: 4px 8px;
  color: white;
  margin: 0;
  font: 14px Baloo;
}

.opp h2 {
  background: rgba(255, 255, 255, 0.75);
  color: black;
}


</style>
<BODY oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<?php
/**
 * liverequest systeem
 * @author Prelution
 */



if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	echo 'Radio ID ontbreekt.';
	exit();
}else if(DB::NumRows(DB::Query("SELECT id FROM users WHERE id = " . DB::Escape($_GET['id']) . " AND type = 2")) == 0) {
	echo '<font color="white">Deze radio bestaat niet.</font>';
	exit();
}
$query = DB::Query("SELECT username, avatar, nextdj FROM users WHERE status = 1 AND radio = " . DB::Escape($_GET['id']) . " OR status = 1 AND id = " . DB::Escape($_GET['id']));
$nextdj = DB::Query("SELECT username, avatar FROM users WHERE nextdj = 1 AND radio = " . DB::Escape($_GET['id']) . " OR status = 1 AND id = " . DB::Escape($_GET['id']));
if(DB::NumRows($query) == 1) {
	$fetch = DB::Fetch($query);
	echo '<style>
	.module {
  background: url(' . $site_url . '' . $fetch['avatar'] . ');
  background-repeat: no-repeat;
  background-size: 150px 150px;
  
  width: 150px;
  height: 150px;
  position: relative;
  overflow: hidden;
  margin: 0px;
  top: 0;
}
</style>';
	

	echo '<center><div class="module"><header><h2><marquee direction="slide">Nu live:&nbsp;&nbsp;' . $fetch['username'] . '            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Straks:&nbsp;&nbsp;' . $fetch['nextdj'] . '</marquee></h1></header></div></center>';
}else{
	$fetch = DB::Fetch(DB::Query("SELECT username, nonstopavatar FROM users WHERE type = 2 AND id = " . DB::Escape($_GET['id'])));
	if(trim($fetch['nonstopavatar']) != '') {
		echo '<style>
	.module {
  background: url(' . $site_url . 'avatars' . $fetch['nonstopavatar'] . ');
  background-repeat: no-repeat;
  background-size: 150px 150px;
  
  width: 150px;
  height: 150px;
  position: relative;
  overflow: hidden;
  margin: 0px;
  top: 0;
}
</style>';
		echo '<center><div class="module"><header><h2><marquee direction="slide">Nu live:&nbsp;&nbsp;Nonstop Muziek</marquee></h2></header></div></center>';
	}else{
		echo '<center><img src="avatars/noavatar.png" width="150" height="150" /><br /><font color="white">Nu live:&nbsp;&nbsp;Nonstop Muziek</marquee></center>';
	}
}
?>
</body>