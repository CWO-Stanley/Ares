<!DOCTYPE html>
    <html>
    <head>
    <meta http-equiv="refresh" content="300">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<script language="javascript" src="assets/mootools.svn.js" type="text/javascript"></script>
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
<style type="text/css">

#NewsTicker{
	border:solid 1px #cccccc;
	background:#;
	
	margin:0 auto;
}
	#NewsTicker h1{
		padding:6px; margin:0; border:0;
		background:#dfe9d5;
		color:#000000;
		font: normal 16px arial, sans-serif;
		
	}
	#NewsVertical {
	width: 100%;
	height: 20;
	display: block;
	overflow: hidden;
	position: relative;
	}
	#controller{
	padding:6px;
	font-size:18px;
	color:#666;
	}
	#play_scroll_cont{display:none;}
/* --------------- */
/* Ticker Vertical */
	#TickerVertical {
		width: 100%;
		height: 20;
		display: block;
		list-style: none;
		margin: 0;
		padding: 0;
	}
	#TickerVertical li {
		display: block;
		width: 100%;
		color: #333333;
		text-align: left;
		valign: top;
		font-size: 18px;
		
		margin: 0;
		padding: 0px;
		float: left;
	}
		#TickerVertical li .NewsTitle{
			display: block;
			color: #000000;
			font-size: 18px;
			
			margin-bottom:6px;
		}
		#TickerVertical li .NewsTitle a:link,
		#TickerVertical li .NewsTitle a:Visited {
			display: block;
			color: #000000;
			font-size: 18px;
			
			margin-bottom:6px;
			text-decoration:none;
		}
		#TickerVertical li .NewsTitle a:hover {
			text-decoration:underline;
		}
		
		#TickerVertical li .NewsImg{
			float:left;
			margin-right:10px;
		}
		#TickerVertical li .NewsFooter{
			display: block;
			color: #000000;
			font-size: 18px;
			margin:6px 0 14px 0;
		}
	/***************
START MEDIA QUERIES FOR SMARTPHONE FONT SIZES
***************/

@media handheld and (max-width: 482px),
   screen and (max-device-width: 482px),
   screen and (max-width: 482px) 
	{


.tickr-title	 { font-size: 12px; }

#tickr-scroll li { font-size: 12px; }


	}
/***************
END MEDIA QUERIES
***************/
.tickr-title {font-size: 14px; }
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
	background: #<?php if(isset($balkInfo) && trim($balkInfo['titlekleur']) != '') { echo htmlentities($balkInfo['titlekleur']); } ?>; 
	padding: 5px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	}
	.tickr-title a
	{
	color: #<?php if(isset($balkInfo) && trim($balkInfo['teksttitle']) != '') { echo htmlentities($balkInfo['teksttitle']); } ?>;
	font: bold 15px arial, sans-serif;
	background: #009a38; 
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
	height: 27px;
	margin: 3px auto 0px auto;
	display: block;
	overflow: hidden;
	position: relative;
	padding: 0px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	}
	
</style>
 
	<div class="tickr-title">


		<table width="100%" border="0">
		  <tbody>
		    <tr>
			<td width="8%"><center><?php
    $query2 = DB::Query("SELECT reason, banDate FROM ipbans WHERE ip = '" . DB::Escape($_SERVER['REMOTE_ADDR']) . "' AND radio = '" . DB::Escape($_GET['id']) . "'");
                    if(DB::NumRows($query2) != 1) {
                            $bFetch = DB::Fetch($query2);
          ?>
              <a href="javascript:NewWindow('berichtaanmaken.php?id=<?php echo htmlspecialchars($_GET['id']); ?>','Bericht Aanmaken!','700','620','center','front');" title="Bericht Aanmaken">Bericht maken</a></center></td>
		      <td width="90%"><div id="tickr-scroll">
    <!-- <div style="color: #FFFFFF; font: normal 18px arial, sans-serif; background-color: #<?php if(isset($balkInfo) && trim($balkInfo['bg']) != '') { echo htmlentities($balkInfo['bg']); } ?>; border: #000000 0px solid; width: 70%; margin: 0 auto; padding: 4px 5px 3px 5px; -moz-border-radius: 17px; -webkit-border-radius: 17px; border-radius: 17px; -moz-box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.20); -webkit-box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.20); box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.20);"> -->
    
				 
  <ul id="TickerVertical">
    <?php
 
     
                   $query = DB::Query("SELECT * FROM berichtenbalk WHERE geaccepteerd = '1' AND radio = '" . DB::Escape($_GET['id']) . "'");
                           
           
    while($aFetch = DB::Fetch($query)) {
                                                                                   
                                            echo '<li><center><font color="#'.$naam.'">' . htmlentities($aFetch['gastnaam']) . '</font>    <font color="Yellow"> -> </font><font color="#'.$text.'">' . htmlentities($aFetch['bericht']) .'</font></center></li>';
                                           }
                                                                                   
                                                                                   
	  ?></ul></div>
		</td>
		      
	        </tr>
	      </tbody>
    </table>
</div>									
	
    
	

   <?php
	}
	?>

<script language="javascript" type="text/javascript" src="assets/newsticker.js">
		</script>
	</body>
    </html>