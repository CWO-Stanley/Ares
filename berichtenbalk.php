  <!DOCTYPE html>
    <html>
    <head>
    <meta http-equiv="refresh" content="300">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<SCRIPT LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'>
 <!--
var win=null;
function NewWindow(mypage,myname,w,h,pos,infocus){
if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center' && pos!="random") || pos==null){myleft=0;mytop=20}
settings="width=" + w + ",height=" + h + ",top=" + mytop + ",left=" + myleft + ",scrollbars=yes,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no";win=window.open(mypage,myname,settings);
win.focus();}
// -->
</script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.w3-btn {margin-bottom:10px;}
#tickr-box 
	{
	background: #285E7A;
	max-width: 100%;
	padding: 3px;
	margin: 0px auto 0px auto;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	}


#tickr-scroll ul
	{
	margin: 0px;
	padding: 0px;
	border: 0px;
	vertical-align: baseline;
	list-style: none;
	}



#tickr-scroll li 
		{
		color: #FFFFFF;
		font: normal 18px arial, sans-serif;
		line-height: 26px;
		}

#tickr-scroll a 
	{
	color: #FFFFFF;
	text-decoration: none;
	}

#tickr-scroll a:hover 
	{
	color: #CCFF99;
	text-decoration: none;
	}

#tickr-scroll ul
	{
	padding: 0px 6px 0px 6px;
	-webkit-animation: tickr 12s cubic-bezier(1, 0, .5, 0) infinite;
	-moz-animation: tickr 12s cubic-bezier(1, 0, .5, 0) infinite;
	-ms-animation: tickr 12s cubic-bezier(1, 0, .5, 0) infinite;
	animation: tickr 12s cubic-bezier(1, 0, .5, 0) infinite;
	}

#tickr-scroll ul:hover {
	-webkit-animation-play-state: paused;
	-moz-animation-play-state: paused;
	-ms-animation-play-state: paused;
	animation-play-state: paused;
	}

@-webkit-keyframes tickr {
	0%   { margin-top: 0; }
	25%  { margin-top: -26px; }
	50%  { margin-top: -52px; }
	75%  { margin-top: -78px; }
	100% { margin-top: 0; }
	}
@-moz-keyframes tickr {
	0%   { margin-top: 0; }
	25%  { margin-top: -26px; }
	50%  { margin-top: -52px; }
	75%  { margin-top: -78px; }
	100% { margin-top: 0; }
	}
@-ms-keyframes tickr {
	0%   { margin-top: 0; }
	25%  { margin-top: -26px; }
	50%  { margin-top: -52px; }
	75%  { margin-top: -78px; }
	100% { margin-top: 0; }
	}
@keyframes tickr {
	0%   { margin-top: 0; }
	25%  { margin-top: -26px; }
	50%  { margin-top: -52px; }
	75%  { margin-top: -78px; }
	100% { margin-top: 0; }
	}




/***************
START MEDIA QUERIES FOR SMARTPHONE FONT SIZES
***************/

@media handheld and (max-width: 482px),
   screen and (max-device-width: 482px),
   screen and (max-width: 482px) 
	{


.tickr-title	 { font-size: 14px; }

#tickr-scroll li { font-size: 12px; }


	}
/***************
END MEDIA QUERIES
***************/
</style>
    </head>
    <body>
    <?php
     
    require_once('includes/bootstrap.inc.php');
	
	
			 if($_SERVER['REQUEST_METHOD'] == 'POST') {
            {
                            DB::Query("INSERT INTO berichtenbalk (radio, gastnaam, gastemail, bericht, ipadres)
                                                   VALUES
                                                   ('" . DB::Escape($_GET['id']) . "',
                                                    '" . DB::Escape(htmlentities($_POST['gastnaam'])) . "',
                                                    '" . DB::Escape(htmlentities($_POST['gastemail'])) . "',
                                                    '" . DB::Escape(htmlentities($_POST['bericht'])) . "',
                                                    '" . DB::Escape(htmlentities($_SERVER['REMOTE_ADDR'])) . "'
                                                   
                                                    )");
                            $success = true;
                    }
            }
     
                    $query = DB::Query("SELECT id, radio, bg, naam, bericht  FROM berichtenbalkkleur WHERE radio = " . DB::Escape($_GET['id']));
            if(DB::NumRows($query) == 1) {
                    $playerInfo = DB::Fetch($query);
            }else{
                    $playerInfo = array(
                                                                    'id' => '',
                                                                    'radio' => '',
                                                                    'bg' => '',
                                                                    'naam' => '',
                                                                    'bericht' => '',
                                                                                                                                   
                                                            );
            }
    ?><?php
        $query1 = DB::Query("SELECT * FROM berichtenbalkkleur WHERE radio = " . DB::Escape($_GET['id']));
            if(DB::NumRows($query1) == 1) {
                    $balkInfo = DB::Fetch($query1);
                                                $bg = $balkInfo['bg'];
                                                $text = $balkInfo['bericht'];
                                                $naam = $balkInfo['naam'];
                                        }
                                        ?>
<style>
.tickr-title 
	{
	color: #<?php if(isset($balkInfo) && trim($balkInfo['teksttitle']) != '') { echo htmlentities($balkInfo['teksttitle']); } ?>;
	font: bold 18px arial, sans-serif;
	 
	padding: 5px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	}
	.tickr-title a
	{
	color: #<?php if(isset($balkInfo) && trim($balkInfo['teksttitle']) != '') { echo htmlentities($balkInfo['teksttitle']); } ?>;
	font: bold 18px arial, sans-serif;
	background: #18394A; 
	padding: 5px;
	text-decoration: none;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	}
	.tickr-title a:hover 
	{
	color: #CCFF99;
	text-decoration: none;
	}
	#tickr-scroll 
	{
	background: #<?php if(isset($balkInfo) && trim($balkInfo['bg']) != '') { echo htmlentities($balkInfo['bg']); } ?>;
	height: 30px;
	vertical-align: middle;
	margin: 3px auto 0px auto;
	overflow: hidden;
	padding: 0px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	}
</style>
										<div id="tickr-box"><table>
										<tr><td width="8%">
<div class="tickr-title">
<?php
    $query2 = DB::Query("SELECT reason, banDate FROM ipbans WHERE ip = '" . DB::Escape($_SERVER['REMOTE_ADDR']) . "' AND radio = '" . DB::Escape($_GET['id']) . "'");
                    if(DB::NumRows($query2) != 1) {
                            $bFetch = DB::Fetch($query2);
          ?>
<a href="javascript:NewWindow('berichtaanmaken.php?id=<?php echo htmlspecialchars($_GET['id']); ?>','Bericht Aanmaken!','700','600','center','front');" title="Bericht Aanmaken" style="height: 27px; background: #<?php if(isset($balkInfo) && trim($balkInfo['titlekleur']) != '') { echo htmlentities($balkInfo['titlekleur']); } ?>;">Bericht maken</a>
</div></td><td width="90%" style="vertical-align:middle;">
<div id="tickr-scroll">
    <!-- <div style="color: #FFFFFF; font: normal 18px arial, sans-serif; background-color: #<?php if(isset($balkInfo) && trim($balkInfo['bg']) != '') { echo htmlentities($balkInfo['bg']); } ?>; border: #000000 0px solid; width: 70%; margin: 0 auto; padding: 4px 5px 3px 5px; -moz-border-radius: 17px; -webkit-border-radius: 17px; border-radius: 17px; -moz-box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.20); -webkit-box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.20); box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.20);"> -->
    <marquee scrollamount="5">
    <?php
     
     
           
           
                           
           
     
                   $query = DB::Query("SELECT * FROM berichtenbalk WHERE geaccepteerd = '1' AND radio = '" . DB::Escape($_GET['id']) . "'");
                           
           
    while($aFetch = DB::Fetch($query)) {
                                                                                   
                                            echo '<font color="#'.$naam.'">' . htmlentities($aFetch['gastnaam']) . '</font>&nbsp;&nbsp;&nbsp;&nbsp;<font color="yellow">->&nbsp;&nbsp;&nbsp;&nbsp;</font><font color="#'.$text.'">' . htmlentities($aFetch['bericht']) .'</font>&nbsp;&nbsp;&nbsp;&nbsp;';
                                           }
                                                                                   
                                                                                   
    ?></marquee>
    
    </div></td></tr></table>
	</div>
    
	

   <?php
	}
	?>


	</body>
    </html>