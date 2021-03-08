<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>


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
			<h1><?php if(!empty($song->artist)) : ?><?php echo $song->artist; ?> - <?php echo $song->title; ?> <?php endif; ?></h1>

			<dl>
                        <dt>Verzoekje</dt>
			<dd class="broad">
			<?php
					if ($song->isDedication):

                                        $rmessage = stripslashes($_REQUEST['rmessage']);

                                        $rmessage = eregi_replace('tering', '***',$rmessage);
                                        $rmessage = eregi_replace('neuken', '****',$rmessage);
                                        $rmessage = eregi_replace('kanker', '***',$rmessage);
                                        $rmessage = eregi_replace('vagina', '****',$rmessage);
                                        $rmessage = eregi_replace('tievus', '****',$rmessage);
                                        $rmessage = eregi_replace('tyfus', '***',$rmessage);
                                        $rmessage = eregi_replace('klootzak', '***',$rmessage);
                                        $rmessage = eregi_replace('pedo', '***',$rmessage);
                                        $rmessage = eregi_replace('klote', '***',$rmessage);
                                        $rmessage = eregi_replace('pik', '*',$rmessage);
                                        $rmessage = eregi_replace('kut', '*',$rmessage);
                                        $rmessage = eregi_replace('lul', '*',$rmessage);
                                        $rmessage = eregi_replace('godverdomme', '********',$rmessage);
                                        $rmessage = eregi_replace('homo', '**',$rmessage);
                                        $rmessage = eregi_replace('flikker', '*****',$rmessage);
                                        $rmessage = eregi_replace('nicht', '**',$rmessage);
                                        $rmessage = eregi_replace('hoer', '**',$rmessage);
                                        $rmessage = eregi_replace('likker', '***',$rmessage);
                                        $rmessage = eregi_replace('suck', '**',$rmessage);
                                        $rmessage = eregi_replace('fuck', '**',$rmessage);  


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
<p>
<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
<label for='message'>Type bovenstaande code over :</label><br>
<input id="6_letters_code" name="6_letters_code" type="text"><br>
<small>Niet leesbaar? klik <a href='javascript: refreshCaptcha();'>hier</a> om te verversen</small>
</p>

					
                                        <input type="submit" value="Verstuur verzoek bericht!" name="B1" />
					</form>
						<br />
						<font size="1">PS: Je aanvraag zal worden getoont op de "Now playing" pagina van deze website, wanneer de aangevraagde plaat wordt afgespeelt. Wanneer er een dj live is heb je kans dat je verzoekplaat wordt aangekondigt.</font>
					<?php endif; ?>
				</dd></dl>
		<!-- END:PAGE -->

	</body>
</html>