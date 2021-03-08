<?php
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
// header('content-type: application/json; charset=utf-8');
?>
<?php
if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}
?>
<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');


if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	echo 'Radio ID ontbreekt.';
	exit();
}
$query = DB::Query("SELECT id, radio, radionaam, themecolor, themefontcolor, autoplay, streamtype, streampath, startvolume, streamgegevens, port, radiouid, apikey, kanaalnaam, bgurl, style, icons, mic, webcam, prive FROM chat_settings WHERE radio = " . DB::Escape($_GET['id']));

	if(DB::NumRows($query) == 1) {
		$playerInfo = DB::Fetch($query);
		header('HTTP/1.1 301 Moved Permanently');
		header('Location: https://horus.chattersworld.nl/chat.php?id=' . $playerInfo['id']);
		// echo '<meta http-equiv="refresh" content="0; URL=https://horus.chattersworld.nl/chat.php?id=' . $playerInfo['id'] . '">';
		//DB::Query("UPDATE chat_settings SET visits = visits + 1, lastused = NOW() WHERE radio = " . DB::Escape($_GET['id']));
	}else{
		header('Location: index.php');
	}
$query1 = DB::Query("SELECT reason, banDate FROM ipbans WHERE ip = '" . DB::Escape($_SERVER['REMOTE_ADDR']) . "' AND radio = '" . DB::Escape($_GET['id']) . "'");
		if(DB::NumRows($query1) != 0) {
			$bFetch = DB::Fetch($query1);
			echo '<title>Ooops! Het ziet er naar uit dat u gebant bent!</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
   <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="assets/style.css">
	  <link rel="icon" href="https://ares.chattersworld.nl/dist/img/c4all-ares.png" sizes="32x32" />
			<h1><center>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- side -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9106844814451489"
     data-ad-slot="2999842055"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></center>
		</h1>
		<div class="container main" ng-controller="RequestController as ctrl">
			
			<div class="jumbotron m-1">
<div class="md-form">
<i class="fa fa fa-comments"></i><center>U bent op ' . date("d-m-Y H:i:s", strtotime($bFetch['banDate'])) . ' geblokkeerd van '.nl2br(htmlentities($playerInfo['kanaalnaam'])).'. <br /> Reden: ' . nl2br(htmlentities($bFetch['reason'])) .  '<br />Neem contact op met de chateigenaar!</div></div><p><small> <center>(c)2013 - 2019<br>Powered by <a href="https://chattersworld.nl" target="_blank">Chattersworld</a></center></small></p></div></body></html>';
			exit();
		}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<meta name="language" content="Dutch" />
<meta name="keywords" content="chatten, gezellig kletsen, Chattersworld, Radio chat, Gezellig, Chatten zonder registratie, 24/7 Verzoekjes, Live verzoek, Radio Chat, webcam, webcamchat, triviant," />
<meta name="description"  content="Chattersworld De enige Chatserver waar je gratis kan chatten, chatten zonder registratie, chatten met webcams en dat allemaal gratis, Chattersworld Ares Verzoekserver, maak hem nu gratis aan!" />
<meta name="google-site-verification" content="-hrJp-Kl7mtCVBOR5Dg45R52OfEAmnIceApYxPMluc4" />
<meta name="robots" content="index,follow,noodp,noydir" />
<meta name="description" content="Waar chatten, chatten is!"/>
<meta property="og:locale" content="nl_NL" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php if(isset($playerInfo) && trim($playerInfo['kanaalnaam']) != '') : ?>#<?php echo htmlspecialchars($playerInfo['kanaalnaam']); ?><?php endif; ?> | Chattersworld | Waar chatten, chatten is!" />
<meta property="og:description" content="Chat voor Jong en Oud" />
<meta property="og:url" content="https://ares.chattersworld.nl/" />
<meta property="og:site_name" content="<?php if(isset($playerInfo) && trim($playerInfo['kanaalnaam']) != '') : ?>#<?php echo htmlspecialchars($playerInfo['kanaalnaam']); ?><?php endif; ?> | Chattersworld Ares Chat" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php if(isset($playerInfo) && trim($playerInfo['kanaalnaam']) != '') : ?>#<?php echo htmlspecialchars($playerInfo['kanaalnaam']); ?><?php endif; ?> | Chattersworld Ares" />
<meta property="og:site_name" content="<?php if(isset($playerInfo) && trim($playerInfo['kanaalnaam']) != '') : ?>#<?php echo htmlspecialchars($playerInfo['kanaalnaam']); ?><?php endif; ?> | Chattersworld Ares" />
<meta property="article:publisher" content="https://www.facebook.com/chattersworld/" />
<meta property="fb:app_id" content="699740480138507" />
<meta property="og:image" content="https://chattersworld.nl/webchat/img/cwobg.jpg" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="Waar chatten, chatten is!" />
<meta name="twitter:title" content="Chattersworld Ares | Waar chatten, chatten is!" />
<link rel="canonical" href="https://chattersworld.nl/" />
<title>Chattersworld.nl <?php if(isset($playerInfo) && trim($playerInfo['kanaalnaam']) != '') : ?>#<?php echo htmlspecialchars($playerInfo['kanaalnaam']); ?><?php endif; ?> :: Zoals Chatten hoort te zijn</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<link rel="icon" href="https://ares.chattersworld.nl/dist/img/c4all-ares.png" sizes="32x32" />
<SCRIPT LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'>
 <!--
var win=null;
function NewWindow(mypage,myname,w,h,pos,infocus){
if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center' && pos!="random") || pos==null){myleft=0;mytop=20}
settings="width=" + w + ",height=" + h + ",top=" + mytop + ",left=" + myleft + ",scrollbars=yes,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no";win=window.open(mypage,myname,settings);
win.focus();}
// -->
</script>
<!-- Mobile redirect script by https://pagecrafter.com -->
<script type="text/javascript" src="https://chattersworld.nl/webchat/js/redirection-mobile.js"></script><script type="text/javascript">// <![CDATA[
 SA.redirection_mobile ({
 mobile_url : "mobilechat.chattersworld.nl/chat.php?id=<?php if(!empty($_GET['id'])) : ?><?php echo htmlspecialchars($_GET['id']); ?><?php endif; ?>",
 });

// ]]></script>