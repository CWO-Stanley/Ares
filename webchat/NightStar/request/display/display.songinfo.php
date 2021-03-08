<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>Radio Bijoux</title>
        <meta property="og:title" content="<?php echo $song->artist; ?> - <?php echo $song->title; ?> - @Nonstop Jukebox"/>
        <meta property="og:type" content="website"/>
   <meta property="og:url" content="http://www.nonstopjukebox.nl/web/songinfo.php?songID=<?php echo $song->ID; ?>"/>
   <meta property="og:image" content="<?php echo $song->picture; ?>"/>   
        <meta property="og:site_name" content="Nonstop JukeBoX"/>
        <meta property="fb:admins" content="XXXXXX000111222"/>
        <meta property="og:description"
                   content="Nonstop Jukebox - The Place to B! http://www.nonstopjukebox.com"/>
        <meta name="keywords" content="Nonstop Jukebox Webradio Netherlands Dutch Music" />
        <meta name="description" content="" />

<!-- start www.websiteadministrator.com.au php facebook like code-->
<div id="FaceBookLikeButton">
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
var fb = document.createElement('fb:like');
fb.setAttribute("href","http://www.nonstopjukebox.nl/playlist/display/display.songinfo.php?songID=<?php echo $currentSong->ID; ?>");
fb.setAttribute("layout","button_count");
fb.setAttribute("show_faces","false");
fb.setAttribute("width","100");
fb.setAttribute("font","arial");
document.getElementById("FaceBookLikeButton").appendChild(fb);
//]]>
</script>
</div><!-- end www.websiteadministrator.com.au php facebook like code-->	</body>
</html>
