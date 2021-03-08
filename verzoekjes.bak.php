<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');
?>
<title>Verzoekje aanvragen</title>
<style>
h1{
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:600px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 50px;
}


/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 10px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 14px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
</style>
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
<body style="background-color: transparent; font-family: Verdana;">
	<fieldset style="max-width: 500px; margin: 0 auto; border:0;">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- side -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9106844814451489"
     data-ad-slot="2999842055"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
		<h1>Verzoeknummer aanvragen</h1>
		<?php
		if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			echo 'Radio ID ontbreekt.</fieldset><div style="text-align: center"><br /><small>Powered by <a href="http://chattersworld.nl" target="_blank">Chattersworld</a></small></div></body>';
			exit();
		}

		if(DB::NumRows(DB::Query("SELECT id FROM users WHERE id = " . DB::Escape($_GET['id']) . " AND type = 2")) == 0) {
			echo 'Deze radio bestaat niet.</fieldset><div style="text-align: center"><br /><small>Powered by <a href="https://chattersworld.nl" target="_blank">Chattersworld</a></small></div></body>';
				
			exit();
		}

		

		if(DB::NumRows(DB::Query("SELECT username, avatar FROM users WHERE status = 1 AND radio = " . DB::Escape($_GET['id']) . " OR status = 1 AND id = " . DB::Escape($_GET['id']))) == 0) {
		$link = mysqli_connect("stats.gezelligkletsen.nl", "root", "16July1984!@", "verzoek");

$sql = ("SELECT nonstopverzoek FROM users WHERE id =" . ($_GET['id']));
$result = mysqli_query($link, $sql);
echo '<div class="tbl-header">';
    echo '<table cellpadding="0" cellspacing="0" border="0">';
      echo '<thead>';
        echo '<tr>';
          echo '<th>';
if (mysqli_num_rows($result)==1) {
 // output data of each row
 	while($row = mysqli_fetch_assoc($result))
		
 echo nl2br(htmlspecialchars_decode($row["nonstopverzoek"]));
}
echo '</tr>';
      echo '</thead>';
    echo '</table>';
  echo '</div></fieldset>';
  echo '<div style="text-align: center">';
		echo '<br />';
		echo '<small>Powered by <a href="https://chattersworld.nl" target="_blank">Chattersworld</a></small>';
	echo '</div>';
echo '</body>';
echo '</html>';
		exit();
		}
			
		$query = DB::Query("SELECT reason, banDate FROM ipbans WHERE ip = '" . DB::Escape($_SERVER['REMOTE_ADDR']) . "' AND radio = '" . DB::Escape($_GET['id']) . "'");
		if(DB::NumRows($query) != 0) {
			$bFetch = DB::Fetch($query);
			echo 'Je bent op ' . date("d-m-Y H:i:s", strtotime($bFetch['banDate'])) . ' geblokkeerd van dit verzoekformulier. <br /> Reden: ' . nl2br(htmlentities($bFetch['reason'])) .  '</fieldset><div style="text-align: center"><br /><small>Powered by <a href="https://chattersworld.nl" target="_blank">chattersworld.nl</a></small></div></body>';
			exit();
		}
		
		$ipCheck = DB::NumRows(DB::Query("SELECT id FROM requests WHERE ip = '" . DB::Escape($_SERVER['REMOTE_ADDR']) . "' AND radio =" . DB::Escape($_GET['id'])));
		if($ipCheck == 0) {
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				if(trim($_POST['name']) == '' || trim($_POST['artist']) == '' || trim($_POST['nr']) == '' || trim($_POST['altartist']) == '' || trim($_POST['altnr']) == '' || trim($_POST['message']) == '') {
					$bFetch = DB::Fetch($query);
					echo 'Alle velden dienen te worden ingevuld.</fieldset><div style="text-align: center"><br /><small>Powered by <a href="https://chattersworld.nl" target="_blank">chattersworld.nl</a></small></div></body>';
					exit();
				}
				$insertQuery = DB::Query("INSERT INTO requests (
																name, 
																ip, 
																radio,
																requestDate, 
																artist, 
																song, 
																altartist, 
																altsong,
																message
																) VALUES (
																'" . DB::Escape(htmlentities($_POST['name'])) . "',
																'" . DB::Escape(htmlentities($_SERVER['REMOTE_ADDR'])) . "',
																'" . DB::Escape(htmlentities($_GET['id'])) . "',
																NOW(),
																'" . DB::Escape(htmlentities($_POST['artist'])) . "',
																'" . DB::Escape(htmlentities($_POST['nr'])) . "',
																'" . DB::Escape(htmlentities($_POST['altartist'])) . "',
																'" . DB::Escape(htmlentities($_POST['altnr'])) . "',
																'" . DB::Escape(htmlentities($_POST['message'])) . "'
																);
				");
				if($insertQuery) {
					echo 'Uw verzoekje is succesvol ingediend.';
					DB::Query("UPDATE users SET numOfRequests = numOfRequests + 1 WHERE status = 1 AND radio = " . DB::Escape($_GET['id']));
				}else{
					echo 'Er is iets fout gegaan tijdens het indienen van uw verzoekje.';
				}
			}
		?>
		<form action="" method="POST">
		<div class="tbl-content">
			<table style="margin: 0 auto;">
				<tr>
					<td>Naam:</td>
					<td><input type="text" placeholder="Naam" name="name" /></td>
				</tr>
				<tr>
					<td>Artiest:</td>
					<td><input type="text" placeholder="Artiest" name="artist" /></td>
				</tr>
				<tr>
					<td>Nummer:</td>
					<td><input type="text" placeholder="Nummer" name="nr" /></td>
				</tr>
				<tr>
					<td>Alternatieve artiest:</td>
					<td><input type="text" placeholder="Alternatieve artiest" name="altartist" /></td>
				</tr>
				<tr>
					<td>Alternatief nummer:</td>
					<td><input type="text" placeholder="Alternatief nummer" name="altnr" /></td>
				</tr>
				<tr>
					<td>Bericht:</td>
					<td>
						<textarea style="width: 100%; height: 150px; resize: none;" name="message"></textarea>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="Indienen" /></td>
				</tr>
			</table>
			</div>
		</form>
		<?php } else{ ?>
		<div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th><strong>U heeft recent al een verzoekje aangevraagd. Wacht tot de DJ het verzoekje heeft afgehandeld.</strong></th>
        </tr>
      </thead>
    </table>
  </div>
		
		<?php }?>
	</fieldset>
	<div style="text-align: center">
		<br />
		<small>Powered by <a href="https://chattersworld.nl" target="_blank">Chattersworld</a></small>
		<br />
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- side -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9106844814451489"
     data-ad-slot="2999842055"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	</div>
</body>