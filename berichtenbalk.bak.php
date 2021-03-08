  <!DOCTYPE html>
    <html>
    <head>
    <meta http-equiv="refresh" content="300">
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
    <div style="color: #FFFFFF; font: normal 18px arial, sans-serif; background-color: #<?php if(isset($balkInfo) && trim($balkInfo['bg']) != '') { echo htmlentities($balkInfo['bg']); } ?>; border: #000000 0px solid; width: 70%; margin: 0 auto; padding: 4px 5px 3px 5px; -moz-border-radius: 17px; -webkit-border-radius: 17px; border-radius: 17px; -moz-box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.20); -webkit-box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.20); box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.20);">
    <marquee scrolldelay="80">
    <?php
     
     
           
           
                           
           
     
                   $query = DB::Query("SELECT * FROM berichtenbalk WHERE geaccepteerd = '1' AND radio = '" . DB::Escape($_GET['id']) . "'");
                           
           
    while($aFetch = DB::Fetch($query)) {
                                                                                   
                                            echo '<font color="yellow">Naam:&nbsp;&nbsp;&nbsp;&nbsp;</font><font color="#'.$naam.'">' . htmlentities($aFetch['gastnaam']) . '</font>&nbsp;&nbsp;&nbsp;&nbsp;<font color="yellow">Bericht:&nbsp;&nbsp;&nbsp;&nbsp;</font><font color="#'.$text.'">' . htmlentities($aFetch['bericht']) .'</font>&nbsp;&nbsp;|&nbsp;&nbsp;';
                                           }
                                                                                   
                                                                                   
    ?>
    <?php
    $query2 = DB::Query("SELECT reason, banDate FROM ipbans WHERE ip = '" . DB::Escape($_SERVER['REMOTE_ADDR']) . "' AND radio = '" . DB::Escape($_GET['id']) . "'");
                    if(DB::NumRows($query2) != 1) {
                            $bFetch = DB::Fetch($query2);
          ?>
    </div>
    </marquee>
	<center><a href="javascript:NewWindow('berichtaanmaken.php?id=<?php echo htmlspecialchars($_GET['id']); ?>','Bericht Aanmaken!','700','600','center','front');" title="Bericht Aanmaken">Bericht maken</a></center>

   <?php
	}
	?>


	</body>
    </html>