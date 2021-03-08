<?php include("webchat/chatheader.php"); ?>
<?php include("webchat/css/style.php"); ?>
<!-- <link rel="stylesheet" href="css/footer.css" type="text/css" media="screen" /> -->
<?php include("webchat/camsconfig.php"); ?>
<style type="text/css">
	html { height: 100%; overflow: hidden; }
	body { height:100%;
            margin:0;
            padding:0;
            background:transparent;	
		      	<?php
if (isset($playerInfo) && trim($playerInfo['bgurl']) != '') {
    $bg = $playerInfo['bgurl'];    
}else{  
    $bg = "webchat/img/cwobg.jpg";
}
?>
<?php
if (isset($playerInfo) && trim($playerInfo['style']) == 'transparent') {
?>	
		      	background-image:url("<?php echo $bg; ?>");
<?php }else{ ?>
				  background-color:#000;
<?php } ?>
			      background-repeat: no-repeat;
			      background-size: 100% 100%;	
}			
 </style>
</head>
<body>
<div id="content">
<div id="top">
<div id="lightIRC" style="height:100%; text-align:center;">
<p><a href="https://www.adobe.com/go/getflashplayer">
<img src="https://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
</div>
 
<script type="text/javascript">
	
	<?php if(isset($playerInfo) && trim($playerInfo['mic']) != '') : ?>params.webcamVideoOnly = "<?php echo htmlspecialchars($playerInfo['mic']); ?>"; <?php endif; ?>
	
	
swfobject.embedSWF("lightIRC.swf", "lightIRC", "100%", "100%", "10.0.0", "expressInstall.swf", params, {wmode:"transparent"});
</script>
<?php include("webchat/footerstream.php"); ?>