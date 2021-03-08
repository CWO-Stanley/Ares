<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>#NightStar - Gezelligste chat</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script type="text/javascript" src="chat2.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div id="content">
<div id="top">
<div id="lightIRC" style="height:100%; text-align:center;">
<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
</div>

<script type="text/javascript">
<?php
    foreach($_GET as $key => $value) {
    echo "params.".htmlentities($key)." = \"".htmlentities($value)."\";\n";
    }
?>
<?php if(!empty($_GET['chan'])) : ?>params.autojoin = "<?php echo htmlspecialchars($_GET['chan']); ?>"; <?php endif; ?>
<?php if(!empty($_GET['style'])) : ?>params.styleURL = "css/<?php echo htmlspecialchars($_GET['style']); ?>.css"; <?php endif; ?>
<?php if(!empty($_GET['icons'])) : ?>params.iconPath = "icons/<?php echo htmlspecialchars($_GET['icons']); ?>/"; <?php endif; ?>
<?php if(!empty($_GET['mic'])) : ?>params.webcamVideoOnly = "<?php echo htmlspecialchars($_GET['mic']); ?>"; <?php endif; ?>
<?php if(!empty($_GET['lang'])) : ?>params.language = "<?php echo htmlspecialchars($_GET['lang']); ?>"; <?php endif; ?>
    swfobject.embedSWF("lightIRC.swf", "lightIRC", "100%", "100%", "10.0.0", "expressInstall.swf", params);
</script>
</div>

<div id="bottom">
<iframe src="radio.php" style="width:325px;" name="Radio" scrolling="no" frameborder="0"></iframe>
</div>
</body>
</html>