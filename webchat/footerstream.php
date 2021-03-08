<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="webchat/js/nativeflashradiov4.js?v=4.19.03.17"></script>
<ul id="footer">
<li id="footer_home">
<a href="https://www.chattersworld.nl/" target="_blank"><img src="webchat/img/footer_home.png" title="Klik hier voor de hoofdpagina" /></a></li>
<li id="footer_home">
<a href="https://mobilechat.chattersworld.nl/chat.php?id=<?php if(isset($playerInfo) && trim($playerInfo['radio']) != '') { echo htmlentities($playerInfo['radio']); } ?>" target="_blank"><img src="webchat/img/cell-phone-icon-18-256.png" height="32" width="16" title="Klik hier voor de hoofdpagina" /></a></li>
<?php if(!empty($_GET['id'])) : ?>
<li id="footer_home">
<a href="javascript:NewWindow('<?php echo $site_url; ?>verzoekjes.php?id=<?php echo htmlspecialchars($_GET['id']); ?>','Verzoekje doen!','1200','500','center','front');" title="Verzoekje doen">
<img src="webchat/img/uitleg.png" title="Klik hier om een verzoekje aan te vragen" /></a></li>
<?php endif; ?>
<?php if(isset($playerInfo) && trim($playerInfo['streamgegevens']) != '') { ?>
<li id="footer_home">
<a href="javascript:NewWindow('https://chattersworld.nl/webplayer/index.php?chan=<?php echo htmlentities($playerInfo['radionaam']); ?>&radio=<?php echo htmlentities($playerInfo['streamgegevens']); ?>:<?php echo htmlentities($playerInfo['port']); ?>&type=<?php echo htmlspecialchars($playerInfo['streamtype']); ?>','Webplayer','800','1100','center','front');" title="Chattersworld webplayer voor <?php echo htmlspecialchars($playerInfo['radionaam']); ?>">
<img src="webchat/img/radio.png" title="Klik hier voor de hoofdpagina" /></a></li></ul>
<?php } ?>
<div id="add" class="footer">
<div id="BbfWjPzRoMSm">
  U laat onze advertenties niet toe
</div>

<script type="text/javascript" src="webchat/js/adblock.js?ver=1.6.2"></script>
<script type="text/javascript">

if(!document.getElementById('ehaOmEGYitqn')){
  document.getElementById('BbfWjPzRoMSm').style.display='block';
}

</script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- side -->
<ins class="adsbygoogle"
     style="display:inline-block;height:57px"
     data-ad-client="ca-pub-9106844814451489"
     data-ad-slot="2999842055"
     data-ad-format="rectangle"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<?php if(isset($playerInfo) && trim($playerInfo['streamgegevens']) != '') { ?>
<div id="playerbottom" class="footer">
<div id="djdisplay">
<div id="flashradio" class="socialfooter" style="height:57x; width:100%;-webkit-border-radius: 0px;-moz-border-radius: 0px; border-radius: 0px; border: 0px #81BEF7 none; -webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), to(rgba(250, 250, 250, 0.1)));">
  <font color="white">Hier staat de V4 RadioPlayer van Chattersworld.nl, als u dit niet ziet, gebruikt u een browser die niet compatible is met deze HTML5 RadioPlayer.</font>
</div>
</div>
<script>
$("#flashradio").flashradio({
			token: "ZGlidXVmc3R4cHNtZS9vbQE=",
			themecolor: "#<?php if(isset($playerInfo) && trim($playerInfo['themecolor']) != '') { echo htmlentities($playerInfo['themecolor']); } ?>", 
			themefontcolor: "#<?php if(isset($playerInfo) && trim($playerInfo['themefontcolor']) != '') { echo htmlentities($playerInfo['themefontcolor']); } ?>",
			streamurl: "http://<?php if(isset($playerInfo) && trim($playerInfo['streamgegevens']) != '') { echo htmlentities($playerInfo['streamgegevens']); } ?><?php if(isset($playerInfo) && trim($playerInfo['port']) != '') { echo ":".$playerInfo['port']; } ?>",
			titlefontname:"Roboto", 
			titlegooglefontname:"Roboto:100",
			songfontname:"Oswald",
			songgooglefontname:"Oswald:400:latin,latin-ext",
			streamtype:"<?php if(isset($playerInfo) && trim($playerInfo['streamtype']) != '') { echo htmlentities($playerInfo['streamtype']); } ?>",
			streamid: "",
			mountpoint: "",
			streampath: "<?php if(isset($playerInfo) && trim($playerInfo['streampath']) != '') { echo htmlentities($playerInfo['streampath']); } ?>",
			scroll: "auto", 
			autoplay: "<?php if(isset($playerInfo) && trim($playerInfo['autoplay']) != '') { echo htmlentities($playerInfo['autoplay']); } ?>", 
			debug: "true", 
			affiliatetoken: "1000lIPN",
			useanalyzer: "fake",
			radioname: "<?php if(isset($playerInfo) && trim($playerInfo['radionaam']) != '') { echo htmlentities($playerInfo['radionaam']); } ?>",
			radiocover :"https://www.chattersworld.nl/images/c4all.png",
			
			songinformationinterval:"5000",
			radiouid: "<?php if(isset($playerInfo) && trim($playerInfo['radiouid']) != '') { echo htmlentities($playerInfo['radiouid']); } ?>", 
			apikey: "<?php if(isset($playerInfo) && trim($playerInfo['apikey']) != '') { echo htmlentities($playerInfo['apikey']); } ?>",
			analyzertype: "4",
			corsproxy: "php",
			usestreamcorsproxy: "false"
		});
</script>
<?php } ?>
<script type="text/javascript" id="cookieinfo"
	src="//cookieinfoscript.com/js/cookieinfo.min.js"
	data-message="Deze chat plaatst cookies om uw webervaring zo plezierig mogelijk te maken. Door verder te gaan gaat u akkoord met ons privacyregelement."
	data-close-text="Ik ga akkoord"
	data-linkmsg="Meer informatie"
	data-cookie="ChattersWorld"
	data-moreinfo="https://www.chattersworld.nl/privacybeleid">
</script>
</body>
</html>