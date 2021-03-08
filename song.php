<!doctype html>

<?php
/**
 * liverequest systeem
 * @author Prelution
 */
// header("refresh: 120;");
require_once('includes/bootstrap.inc.php');

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	echo 'Radio ID ontbreekt of is onjuist.';
	exit();
}else{
	$query = DB::Query("SELECT stream, port, text, bg, bg1 FROM stream_settings WHERE radio = " . DB::Escape($_GET['id']));
	if(DB::NumRows($query) == 0) {
		echo 'Deze radio bestaat niet of de stream instellingen zijn niet ingesteld.';
		exit();
	}else{
		$fetch = DB::Fetch($query);
		
		$radio = new Shoutcast($fetch['stream'], $fetch['port']);
		if($radio->connected()) { 
			//echo '<strong>Huidig nummer:</strong><br />' . $radio->song(); 

			 
			
		}else{ 
			echo 'Radio is offline'; 
		}
	}
}
?>

<?php
	$tekst = $fetch['text'];
	$bg = $fetch['bg'];
	$bg1 = $fetch['bg1'];
?>
<html>
<script>
						var timer = setTimeout(function() {
							window.location='song.php?id=<?php echo htmlentities($_GET['id']); ?>'
						}, 120000);
					</script>
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
<head>

<style>
body,td,th {
	color: #<?php echo $tekst; ?>;
}
</style>

</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" cellpadding="0" cellspacing="0" >
  <tr>
    <td height="20" bgcolor="#<?php echo $bg; ?>" class=""><strong><font  size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;<strong>Huidig nummer:</strong></font></strong></td>
    <td width="20" height="20" bgcolor="#<?php echo $bg; ?>" class=""><img src="dist/img/icon.png" width="20" height="20" border="0"></td>
  </tr>
  <tr> 
    <td height="20" colspan="3" bgcolor="#<?php echo $bg1; ?>" class="">
        <marquee behavior="scroll" direction="left" scrollamount="2">
        <font size="2" face="Arial, Helvetica, sans-serif" >
		<?php echo $radio->song(); ?> </font>
        </marquee>
  
        
        </td>
  </tr>
</table>
</body>
</html>