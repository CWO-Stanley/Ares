<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');
?>
<title>Verzoekje aanvragen</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
   <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="assets/style.css">
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
		<meta property="og:site_name" content="Ares | Chattersworld" />
		<meta property="og:type" content="article" />
		<meta property="og:site_name" content="Ares | Chattersworld | De gratis verzoekserver met chatbox!" />
		<meta property="article:publisher" content="https://www.facebook.com/chattersworld/" />
		<meta property="fb:app_id" content="699740480138507" />
		<meta property="og:image" content="https://horus.chattersworld.nl/dist/img/c4all-horus.png" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="Waar chatten, chatten is!" />
		<meta name="twitter:title" content="Ares | Chattersworld | De gratis verzoekserver met chatbox!!" />
		<link rel="canonical" href="https://chattersworld.nl/" />
<body class="body">
	<fieldset style="max-width: 90%; margin: 0 auto; border:0;">
	
		<h1><center>
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
<script src="https://www.google.com/recaptcha/api.js?render=6Ld6Y4AUAAAAAH6uCWtHPw9psZxn8qZ7Rqy2ysWL"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6Ld6Y4AUAAAAAH6uCWtHPw9psZxn8qZ7Rqy2ysWL', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
	
</center>
		</h1>
		<div class="container main" ng-controller="RequestController as ctrl"> 
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
		$link = mysqli_connect("127.0.0.1", "user", "pass", "dbname");

$sql = ("SELECT nonstopverzoek FROM users WHERE id =" . ($_GET['id']));
$result = mysqli_query($link, $sql);
?>
<div class="jumbotron m-1">
<div class="md-form">
<i class="fa fa-music fa-2x prefix"></i><center>
<?php
if (mysqli_num_rows($result)==1) {
 // output data of each row
 	while($row = mysqli_fetch_assoc($result))
		
 echo nl2br(htmlspecialchars_decode($row["nonstopverzoek"]));
}
?></center><?php
		echo '</div></div><p><small> <center>(c)2013 - 2019<br>';
		echo 'Powered by <a href="https://chattersworld.nl" target="_blank">Chattersworld</a></center></small></p>';
	echo '</div>';
echo '</body>';
echo '</html>';
		exit();
		}
		$query = DB::Query("SELECT verzoekform FROM users WHERE verzoekform = 1 AND radio = '" . DB::Escape($_GET['id']) . "'");
		if(DB::NumRows($query) != 0) {
			$vFetch = DB::Fetch($query);
			if($vFetch['verzoekform'] == 1) {
			echo '<div class="jumbotron m-1"><div class="md-form"><i class="fa fa-music fa-2x prefix"></i><center>Verzoekbox is dicht, maar de DJ is nog live!</div></div><p><small> <center>(c)2013 - 2019<br>Powered by <a href="https://chattersworld.nl" target="_blank">Chattersworld</a></center></small></p></div></body></html>';
			exit();
			}
		}	
		$query = DB::Query("SELECT reason, banDate FROM ipbans WHERE ip = '" . DB::Escape($_SERVER['REMOTE_ADDR']) . "' AND radio = '" . DB::Escape($_GET['id']) . "'");
		if(DB::NumRows($query) != 0) {
			$bFetch = DB::Fetch($query);
			echo 'Je bent op ' . date("d-m-Y H:i:s", strtotime($bFetch['banDate'])) . ' geblokkeerd van dit verzoekformulier. <br /> Reden: ' . nl2br(htmlentities($bFetch['reason'])) .  '</fieldset><div style="text-align: center"><br /><small>Powered by <a href="https://chattersworld.nl" target="_blank">chattersworld.nl</a></small></div></body>';
			exit();
		}
		
		$ipCheck = DB::NumRows(DB::Query("SELECT id FROM requests WHERE ip = '" . DB::Escape($_SERVER['REMOTE_ADDR']) . "' AND radio =" . DB::Escape($_GET['id'])));
		if($ipCheck == 0) {
			if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = 'pubkey';
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {
			
				if(trim($_POST['name']) == '' || trim($_POST['artist']) == '' || trim($_POST['nr']) == '' || trim($_POST['altartist']) == '' || trim($_POST['altnr']) == '' || trim($_POST['message']) == '') {
					$bFetch = DB::Fetch($query);
					echo '<div class="md-form">Alle velden dienen te worden ingevuld.</div><div style="text-align: center"><br /><small>Powered by <a href="https://chattersworld.nl" target="_blank">chattersworld.nl</a></small></div></body>';
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
					$success =  '<font color="green">Uw verzoekje is succesvol ingediend.</font>';
					DB::Query("UPDATE users SET numOfRequests = numOfRequests + 1 WHERE status = 1 AND radio = " . DB::Escape($_GET['id']));
				}else{
					$success = '<font color="red">Er is iets fout gegaan tijdens het indienen van uw verzoekje.</font>';
				}
			
			} else {
        $success = 'Captcha is invalid!';
    }

}
		?>
		 
         
      
	<div class="jumbotron m-1"><p><center><h1>Vraag je verzoekje aan</h1></center></p>
	<?php
	if(isset($success) && $success) {
                    echo '<i class="fa fa-music fa-2x prefix"></i>'.$success.'<br />';
                    // echo '<meta http-equiv="refresh" content="1">';
                }
				?>
        <form action='' name='i-ReQuest' method=post>         
               <div class="md-form">
                    <i class="fa fa-user-circle fa-2x prefix"></i>
                    <input type="text" ng-model="form.artiest" name="artist" id="form1" class="form-control" required="required" autocomplete="off">
                    <label for="form1">Artiest</label>
               </div> 
                
               <div class="md-form">
                    <i class="fa fa-music fa-2x prefix"></i>
                    <input type="text" ng-model="form.nummer" name="nr" id="form2" class="form-control" required="required" autocomplete="off">
                    <label for="form2">Titel</label>
               </div>
                      
                       <div class="md-form">
                    <i class="fa fa-user-circle fa-2x prefix"></i>
                    <input type="text" ng-model="form.artiest2" name="altartist" id="form3" class="form-control" required="required" autocomplete="off">
                    <label for="form3">Alternatieve Artiest</label>
               </div> 
                
               <div class="md-form">
                    <i class="fa fa-music fa-2x prefix"></i>
                    <input type="text" ng-model="form.nummer2" name="altnr" id="form4" class="form-control" required="required" autocomplete="off">
                    <label for="form4">Alternatieve Titel</label>
               </div>
               
<div class="md-form">
                    <i class="fa fa-user-circle-o fa-2x prefix"></i>
                    <input type="text" ng-model="form.nummer" name="name" id="form5" class="form-control" required="required" autocomplete="off">
                    <label for="form5">Van</label>
               </div>
       
               
               
               <div class="md-form">
                    <i class="fa fa-comment fa-2x prefix"></i>
                    <textarea type="text" ng-model="form.messinger" name="message" id="form6" class="md-textarea faceText" autocomplete="off"></textarea>
                    <label for="form6">Je Groetje</label>
               </div>

               
             
 <input type=submit name='submit' value="Verstuur verzoekje" class="btn btn-success" />
 <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
			</form>
            </div> 
    <p><small> <center>(c)2013 - 2019<br>
            Powered by <a href="https://chattersworld.nl" target="_blank">Chattersworld</a></center></small></p>
       
 
   
</div>
		<?php } else{ ?>
		<i class="fa fa-music fa-2x prefix"></i>
          <strong>U heeft recent al een verzoekje aangevraagd. Wacht tot de DJ het verzoekje heeft afgehandeld.</strong>
		  </div> 
    <p><small> <center>(c)2013 - 2019<br>
            Powered by <a href="https://chattersworld.nl" target="_blank">Chattersworld</a></center></small></p>
        
		
		<?php }?>
	</fieldset>
	<div style="text-align: center">
		<br />
		
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
	<script src="assets/jquery.js"></script>    
<script src="assets/bootstrap.min.js"></script>
<script src="assets/materialize.min.js"></script>
<script type="text/javascript" src="assets/jquery.emojiFace.js"></script>
<script type="text/javascript">
$(function(){

	$('.faceText').emojiInit({
		fontSize:16,
        success : function(data){

		},
        error : function(data,msg){
		}
	});
});
</script>
</body>