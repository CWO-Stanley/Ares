<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<STYLE TYPE="text/css"> 
<!-- 
body {
overflow: hidden;
 /* IE10 Consumer Preview */ 
background-image: -ms-linear-gradient(top, #FFFFFF 0%, #AD4848 120%);

/* Mozilla Firefox */ 
background-image: -moz-linear-gradient(top, #FFFFFF 0%, #AD4848 120%);

/* Opera */ 
background-image: -o-linear-gradient(top, #FFFFFF 0%, #AD4848 120%);

/* Webkit (Safari/Chrome 10) */ 
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #FFFFFF), color-stop(1, #AD4848));

/* Webkit (Chrome 11+) */ 
background-image: -webkit-linear-gradient(top, #FFFFFF 0%, #AD4848 120%);

/* W3C Markup, IE10 Release Preview */ 
background-image: linear-gradient(to bottom, #FFFFFF 0%, #AD4848 120%);

	background-attachment: fixed;
	font: 14px Calibri;
	margin: 0;
	padding: 0;
	text-align: center;
}; 
--> 
</STYLE> 

<!--BEGIN WORD COUNTER-->
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
</script>
<!--EINDE WORD COUNTER-->


<title>Request Succesvol!</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<!-- Styling of the samPHPweb pages -->
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<!-- Request specific styling -->
		<link rel="stylesheet" type="text/css" href="styles/request.css" />
		<!-- Common Javascript functions -->
		<script type="text/javascript" src="js/common.js"></script>
		<!-- JQuery library to do cool Javascript stuff -->
		<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
		<!-- JQuery plugin for Cross-Browser compatible rounding of corners -->
		<script type="text/javascript" src="js/jquery.corner.js"></script>
	</head>

	<body>
		<!-- BEGIN:PAGE -->
		<div id="page">

			<h2 class="success">Request succesvol en komt er zo aan!</h2>

			<div id="pictureAndLinks">
				<?php if(SHOW_PICTURES && !empty($song->picture)) : ?>  <a href="<?php echo $song->buycd; ?>" target="_blank"><img class="picture" onload="showPicture(this, true)" src="<?php echo $song->picture; ?>" alt="Buy CD!" border=0 /></a><?php endif; ?>
			</div>
			<h4><?php if(!empty($song->artist)) : ?><?php echo $song->artist; ?> - <?php echo $song->title; ?> <?php endif; ?></h4>

			<dl>
                        <dt>Verzoekje</dt>
			<dd class="broad">
			<?php
					if ($song->isDedication):

                                        $rmessage = stripslashes($_REQUEST['rmessage']);

                                         


                                        $dedicationMessage = Text2Html(trim($rmessage));
                                       
					$dedicationName = stripslashes($_REQUEST['rname']);

					?>
					<div id="dedicationMessage">"<?php echo $dedicationMessage; ?>"</div>
                                        <br>
					<div id="dedicationName">Aangevraagd door <?php echo $dedicationName; ?></div>

					<?php else: ?>
						<form name="request_formulier" method="post">
						<?php InputHidden("requestID", $song->requestID, 0); ?>
						<?php InputHidden("songID", $song->ID, 0); ?>
							Je naam:<br/>
							<input type="text" name="rname" size="30"/><br/><br/>
							Je verzoek bericht:<br/>


                                                      <textarea name="rmessage" onKeyDown="limitText(this.form.rmessage,this.form.countdown,100);" onKeyUp="limitText(this.form.rmessage,this.form.countdown,100);"></textarea><br>
                                                     <font size="1">(Maximaal: 100 tekens)<br><br>
                                                    Je hebt nog <input readonly type="text" name="countdown" size="3" value="100"> tekens over.</font>
                                                    <br/><br/>					
                                        <input type="submit" value="Verstuur verzoek bericht!" name="B1" />
					</form> 
						<br />
						<font size="1">PS: Je aanvraag zal worden getoont op de "Now playing" pagina van deze website, wanneer de aangevraagde plaat wordt afgespeelt. Wanneer er een dj live is heb je kans dat je verzoekplaat wordt aangekondigt.</font>
					<?php endif; ?>
				</dd></dl>
		<!-- END:PAGE -->

	</body>
</html>