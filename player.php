<?php
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Access-Control-Allow-Origin: *");
// header('content-type: application/json; charset=utf-8');
?>
<?php
require_once('includes/bootstrap.inc.php');
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Native Flash Radio V4</title>
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
		<meta property="og:image" content="https://horus.chattersworld.nl/dist/img/c4all-horus.png" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="Waar chatten, chatten is!" />
		<meta name="twitter:title" content="Ares | Chattersworld | De gratis verzoekserver met chatbox!!" />
		<link rel="canonical" href="https://chattersworld.nl/" />
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="CACHE-CONTROL" CONTENT="NO-CACHE">
    <link href="css/documentation.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/nativeflashradiov4.js?v=4.19.03.17"></script>
    <script language=JavaScript> var message="Sjips, werkt niet :("; function clickIE4(){ if (event.button==2){ alert(message); return false; } } function clickNS4(e){ if (document.layers||document.getElementById&&!document.all){ if (e.which==2||e.which==3){ alert(message); return false; } } } if (document.layers){ document.captureEvents(Event.MOUSEDOWN); document.onmousedown=clickNS4; } else if (document.all&&!document.getElementById){ document.onmousedown=clickIE4; } document.oncontextmenu=new Function("alert(message);return false") </script>
    <script language=JavaScript> var message="Sjips, werkt niet :("; function clickIE4(){ if (event.button==2){ alert(message); return false; } } function clickNS4(e){ if (document.layers||document.getElementById&&!document.all){ if (e.which==2||e.which==3){ alert(message); return false; } } } if (document.layers){ document.captureEvents(Event.MOUSEDOWN); document.onmousedown=clickNS4; } else if (document.all&&!document.getElementById){ document.onmousedown=clickIE4; } document.oncontextmenu=new Function("alert(message);return false") </script>

<script>
document.onkeydown = function(e) {
        if (e.ctrlKey && 
            (e.keyCode === 67 || 
             e.keyCode === 86 || 
             e.keyCode === 85 || 
             e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
};
$(document).keypress("u",function(e) {
  if(e.ctrlKey)
  {
return false;
}
else
{
return true;
}
});
</script>

<style>
img{
 border: 0px;
}
.noselect {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
body {
	font-family: 'Roboto', Arial, sans-serif;
	font-size: 16px;
	color: rgba(0,0,0,.95);
	background: #ccc;
	padding: 0;
	margin: 0;	
	min-height:800px;
}
h2{
 color:#f9ad19;
}
.logo-wpr {
	display: inline-block;
}
.logo {
	width: 109px;
	height: 33px;
	background: url("../img/logo.png");
	background-size: 100% 100%;
	vertical-align: middle;
	display: inline-block;
}
.logo-txt {	
	font-size: 22px;
	padding-left: 3px;
	display: inline-block;
	vertical-align: middle;
}
.buttons-wpr {
	display: inline-block;
	float: right;
}
.panel-wpr {
	height: 82px;
	position: fixed;
	color: #fff;
	top: 0;
	left: 0;
	right: 0;
	z-index: 200;
}
.panel-wpr-bg {
   background-color: #1c1c1f;	
	box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
	transition: all ease 0.5s;
}
.panel {	
	max-width: 940px;
	color: #fff;
	margin: 0 auto;
	padding: 23px 0;
}
.panel-wpr-bg .btn-r {
	border: 1px solid #ffffff;
	background-color: transparent;
	color:#ffffff;
}
.panel-wpr-bg .btn-r:hover {
	background-color: #f9ad19;
	border: none;
}
.panel-wpr-bg .btn-buy {
	background-color: #f9ad19;
	border: 1px solid #f9ad19;
}
.panel-wpr-bg .btn-buy:hover {
	background-color: transparent;
	color: #ffffff;
	border: 1px solid #ffffff;
}
.panel-wpr-bg .logo {
	width: 109px;
	height: 33px;
	background-size: 100% 100%;
	vertical-align: middle;
	display: inline-block;
}
.banner-wpr{
	position: relative;
	top: 130px;
	margin: 0 30px;
	z-index: 102;
}
.banner {
	font-size: 16px;
	color: rgba(255,255,255,.7);
	max-width: 940px;	
	margin: 0 auto;	
}
.banner .box {
	max-width: 640px;
	text-align: center;
	margin: 0 auto;
}
.banner .title {	
	font-size: 48px;
	font-weight: 500;
	color: rgba(255,255,255,.95);
}
.banner .txt {
	line-height: 24px;
	font-size: 18px;
	text-transform: uppercase;
}
.banner p {
	margin: 10px 0;
}
.header-bg {
	height: 444px;
	background: #000;	
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	z-index: 99;
}
.header-bg2 {
	height: 444px;
	background: url("../img/home.jpg");	
	position: absolute;
	background-size: cover!important;
   background-position: 50% 50%!important;
	top: 0;
	left: 0;
	right: 0;
	opacity: 0.16;
	z-index: 100;
}
.main-wpr {
	background: #fff;
	position: relative;
	padding: 20px 0;
	margin: 200px 30px 30px 30px;
	border-radius: 6px;
	box-shadow: 0 16px 24px 2px rgba(0, 0, 0, .14), 0 6px 30px 5px rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(0, 0, 0, .2);
	z-index: 101;	
}
.main {
	max-width: 940px;
	color: #999;
	margin: 0 auto;
}
.main p {
	text-align: center;
	line-height: 24px;	
}
.main a {
	text-decoration: none;
	color: inherit;
}
.main .overview-txt {
	padding: 0 160px 50px 160px;
}
.features {
	width: 33%;
	color: #333;
	text-align: center;
	background: rgba(0,0,0,.0);
	margin-bottom: 40px;
	display: inline-block;
}
.features .title {
	font-size: 18px;
	font-weight: 500;
	padding: 10px 0;
}
.features p {
	font-size: 14px;
	color: #999;
	line-height: 20px;
    padding: 0 20px;
}
.features i {
	font-size: 48px;
}
.demo-colors {
	text-align: center;
	padding: 0px 0;
}
.features .red {
	color: #F44336;
}
.features .purple {
	color: #9C27B0;
}
.features .deeppurple {
	color: #673AB7;
}
.features .indigo {
	color: #3F51B5;
}
.features .blue {
	color: #2196F3;
}
.features .cyan {
	color: #00BCD4;
}
.features .teal {
	color: #009688;
}
.features .green {
	color: #4CAF50;
}
.features .lime {
	color: #CDDC39;
}
.features .orange {
	color: #FF9800;
}
.features .brown {
	color: #795548;
}
.features .bluegrey {
	color: #607D8B;
}
.btn-r {
	font-size: 16px;
	font-weight: 500;
	border: 1px solid #aaa;
	border-radius: 5px;
	margin-left: 12px;
	padding: 8px 16px;	
	display: inline-block;
	cursor: pointer;
	transition: all ease 0.5s;
}
.btn-r:hover {
	background-color: #222;
}
.btn-r a,
.btn-r a:hover,
.btn-r a:visited,
.btn-r a:focus {
	color: inherit;
	text-decoration: none;
}
.btn-buy {
	background-color: #FF5722;
	border: 1px solid #FF5722;
}
.btn-buy:hover {
	background-color: #F4511E;
}
h1 {
	font-size: 36px;
	font-weight: 500;
	color: #333;
	text-align: center;
	margin-top: 60px;
	margin-bottom: 60px;
}
table {
    font-size: 14px;
    border-collapse: collapse;
    width: 100%;
	color: #333;
	margin-bottom: 80px;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
.td-set {
	width: 140px;
}
tr:nth-child(even) {
    background-color: #eee;
}
.usage p {
	text-align: left;
	color: #333;
}
.usage .code {
	font-size: 14px;
	color: #999;
	padding: 12px 16px;
	border-left: 3px solid #FF5722;
	margin: 20px 0;
}
.foot {
	max-width:940px;
	height:60px;
	margin:0 auto;
	text-align:right;
	position:relative;
	color:#333;
	font-size:14px}
.foot a {
	text-decoration:none;
	color:inherit;
	font-weight:600
}
@media only screen and (max-width: 768px) {
	.header-bg {
		height: 424px;
	}
	.header-bg2 {
		height: 424px;	
	}
	.panel-wpr {
		height: 142px;
		position: fixed;
		color: #fff;
		top: 0;
		left: 0;
		right: 0;
		z-index: 200;
	}
	
	.logo-wpr {
		display: block;
		margin-left: 20px;
    }
	.buttons-wpr {
		display: block;
		float: none;
		text-align: center;
		margin-top: 20px;
	}
	
	.banner-wpr{
		position: relative;
		top: 160px;
		margin: 0 30px;
		z-index: 102;
	}
	.banner .box {
		max-width: 500px;
	}
	.banner .title {	
		font-size: 30px;
		font-weight: 500;
		color: rgba(255,255,255,.95);
	}	
	.main-wpr {
		background: #fff;
		position: relative;
		top: 180px;
		padding: 20px 0;
		margin: 0 10px 60px 10px;
		border-radius: 6px;	
		z-index: 101;	
	}
	
	.main .overview-txt {
	padding: 0 20px 50px 20px;	
	}
	.features {
	width: 100%;
	color: #333;
	text-align: center;
	background: rgba(0,0,0,.0);
	margin-bottom: 34px;
	display: block;
	}

	.features .title {
	font-size: 18px;
	font-weight: 500;
	padding: 5px 0;
	}
	.btn-color {
	width: 16px;
	height: 16px;
	margin-right: 4px;
	margin-left: 4px;
	margin-bottom: 6px;
	}
	.abtn-color {
	width: 16px;
	height: 16px;
	margin-right: 4px;
	margin-left: 4px;
	margin-bottom: 6px;
	}
	.demo-colors {
		padding: 0 8px;
	}
	.btn-r {
	font-size: 16px;
	font-weight: 500;
	border: 1px solid #aaa;
	border-radius: 5px;
	margin-left: 12px;
	padding: 8px 16px;	
	display: inline-block;
	float: none;
	cursor: pointer;
	transition: all ease 0.5s;
	}
h1 {
	font-size: 36px;
	font-weight: 500;
	color: #333;
	text-align: center;
	margin-bottom: 40px;
}


}
</style>
	
</head>
	
<body class="noselect" topmargin="10" ondragstart="return false" onselectstart="return false">
<?php
/**
 * liverequest systeem
 * @author Prelution
 */




if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	echo 'Radio ID ontbreekt.';
	exit();
}
$query = DB::Query("SELECT id, radio, radionaam, themecolor, themefontcolor, autoplay, streamtype, streampath, startvolume, streamgegevens, port, radiouid, apikey  FROM player_settings WHERE radio = " . DB::Escape($_GET['id']));
	if(DB::NumRows($query) == 1) {
		$playerInfo = DB::Fetch($query);
	}else{
		header('Location: index.php');
	}
	?>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script src="player/js/nativeflashradiov4.js"></script>
<div id="flashradio" style="height:60px; width:100%;">
  <font color="white">Hier staat de V4 RadioPlayer van localhost, als u dit niet ziet, gebruikt u een browser die niet compatible is met deze HTML5 RadioPlayer.</font> 
</div>
<script>
$("#flashradio").flashradio({
			token: "ZGlidXVmc3R4cHNtZS9vbQE=",
			themecolor: "#<?php if(isset($playerInfo) && trim($playerInfo['themecolor']) != '') { echo htmlentities($playerInfo['themecolor']); } ?>", 
			themefontcolor: "#<?php if(isset($playerInfo) && trim($playerInfo['themefontcolor']) != '') { echo htmlentities($playerInfo['themefontcolor']); } ?>",
			streamurl: "<?php if(isset($playerInfo) && trim($playerInfo['streamgegevens']) != '') { echo htmlentities($playerInfo['streamgegevens']); } ?>:<?php if(isset($playerInfo) && trim($playerInfo['port']) != '') { echo htmlentities($playerInfo['port']); } ?>",
			titlefontname:"Roboto", 
			titlegooglefontname:"Roboto:100",
			songfontname:"Oswald",
			songgooglefontname:"Oswald:400:latin,latin-ext",
			streamtype:"<?php if(isset($playerInfo) && trim($playerInfo['streamtype']) != '') { echo htmlentities($playerInfo['streamtype']); } ?>",
			streamid: "",
			mountpoint: "",
			scroll: "auto", 
			autoplay: "<?php if(isset($playerInfo) && trim($playerInfo['autoplay']) != '') { echo htmlentities($playerInfo['autoplay']); } ?>", 
			debug: "true", 
			affiliatetoken: "1000lIPN",
			useanalyzer: "fake",
			radioname: "<?php if(isset($playerInfo) && trim($playerInfo['radionaam']) != '') { echo htmlentities($playerInfo['radionaam']); } ?>",
			radiocover :"https://horus.chattersworld.nl/dist/img/c4all.png",
			
			songinformationinterval:"5000",
			radiouid: "<?php if(isset($playerInfo) && trim($playerInfo['radiouid']) != '') { echo htmlentities($playerInfo['radiouid']); } ?>", 
			apikey: "<?php if(isset($playerInfo) && trim($playerInfo['apikey']) != '') { echo htmlentities($playerInfo['apikey']); } ?>", 
			analyzertype: "4",
			corsproxy: "php",
			usestreamcorsproxy: "false"
		});
</script>