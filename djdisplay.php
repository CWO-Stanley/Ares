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
		<meta property="og:image" content="https://horus.chattersworld.nl/dist/img/c4all-horus.png" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="Waar chatten, chatten is!" />
		<meta name="twitter:title" content="Ares | Chattersworld | De gratis verzoekserver met chatbox!!" />
		<link rel="canonical" href="https://chattersworld.nl/" />
<script src="assets/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:1000,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1000,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Orientation: 2,
                $NoDrag: true
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 150;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .jssora061 {display:block;position:absolute;cursor:pointer;}
        .jssora061 .a {fill:none;stroke:#fff;stroke-width:360;stroke-linecap:round;}
        .jssora061:hover {opacity:.8;}
        .jssora061.jssora061dn {opacity:.5;}
        .jssora061.jssora061ds {opacity:.3;pointer-events:none;}
    </style>

<BODY oncontextmenu="return false" onselectstart="return false" ondragstart="return false" style="padding:0px; margin:0px; background-color:transparent;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">
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

if(DB::NumRows($query) == 1) {
	$fetch = DB::Fetch($query); ?>
	<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:150px;height:150px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="dist/img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:150px;height:150px;overflow:hidden;">
            <div>
                <img data-u="image" src="<?php echo '' . $site_url . '' . $fetch['avatar'] . ''; ?>" />
                <div u="thumb">Nu: <?php echo '' . $fetch['username'] . ''; ?></div>
            </div>
            <div>
			<?php 
			$nextdj = DB::Query("SELECT avatar FROM users WHERE username = '" . DB::Escape($fetch['nextdj']) . "'");
			$nonfetch = DB::Fetch(DB::Query("SELECT username, nonstopavatar FROM users WHERE type = 2 AND id = " . DB::Escape($_GET['id'])));
			$nextfetch = DB::Fetch($nextdj);
				if($fetch['nextdj'] == 'Nonstop Muziek') { $next = 'avatars'.$nonfetch['nonstopavatar'].''; }else{ $next = $nextfetch['avatar']; }
			?>
                <img data-u="image" src="<?php echo '' . $site_url . '' . $next . ''; ?>" />
				<div u="thumb">Straks: <?php echo '' . $fetch['nextdj'] . ''; ?></div>
            </div></div>
	

	
<?php }else{
	$fetch = DB::Fetch(DB::Query("SELECT username, nonstopavatar FROM users WHERE type = 2 AND id = " . DB::Escape($_GET['id'])));
	if(trim($fetch['nonstopavatar']) != '') { ?>
		<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:150px;height:150px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="dist/img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:150px;height:150px;overflow:hidden;">
            <div>
                <img data-u="image" src="<?php echo '' . $site_url . 'avatars' . $fetch['nonstopavatar'] . ''; ?>" />
                <div u="thumb">Nu: Nonstop Muziek</div>
            </div>
			<div>
                <img data-u="image" src="<?php echo '' . $site_url . 'avatars' . $fetch['nonstopavatar'] . ''; ?>" />
                <div u="thumb">Straks: Nonstop Muziek</div>
            </div>
            </div>
	<?php }else{
		echo '<center><img src="avatars/noavatar.png" width="150" height="150" /><br /><font color="white">Nu live:&nbsp;&nbsp;Nonstop Muziek</marquee></center>';
	}
}
?>
<!-- Thumbnail Navigator -->
        <div u="thumbnavigator" style="position:absolute;bottom:0px;left:0px;width:150px;height:30px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);">
            <div u="slides">
                <div u="prototype" style="position:absolute;top:0;left:0;width:150px;height:30px;">
                    <div u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;height:100%;font-family:arial,helvetica,verdana;font-weight:normal;line-height:30px;font-size:10px;padding-left:10px;box-sizing:border-box;"></div>
                </div>
            </div>
        </div>
		</div>
<script type="text/javascript">jssor_1_slider_init();</script>
</body>