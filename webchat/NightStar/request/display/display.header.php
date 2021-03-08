<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title><?php echo STATION_NAME; ?> - powered by SAM Broadcaster</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<!-- General styles of the samPHPweb pages -->
		<link rel="stylesheet" type="text/css" href="styles/style.css" />

		<!-- Common Javascript functions -->
		<script type="text/javascript" src="js/common.js"></script>
		<?php if (ALLOW_REQUESTS) : ?>
		<!-- Javascript for request and songinfo actions -->
		<script type="text/javascript">
			/**
			 * Open a popup window to send a song request to SAM
			 */
			function request(songID)
			{
				<?php if(PRIVATE_REQUESTS): ?>
					requestPrivate(songID);
				<?php else: ?>
					var samhost = "<? echo SAM_HOST; ?>";
					var samport = "<? echo SAM_PORT; ?>";
					requestAudioRealm(songID, samhost, samport);
				<?php endif; ?>
			}
		</script>
		<?php endif; ?>
		<!-- AddThis javascript -->
		<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=spacialaudio"></script>
		<!-- JQuery library to do cool Javascript stuff -->
		<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
		<!-- JQuery plugin for Cross-Browser compatible rounding of corners -->
		<script type="text/javascript" src="js/jquery.corner.js"></script>

	</head>

	<body>

		<!-- BEGIN:PAGE -->
<div id="page">

