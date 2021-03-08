<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');
require_once('template/TH4Y/header.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<?php if($user->type == 1) { ?>
                                <?php if($user->status == 0) {
                                    // echo '<a href="index.php?liveswitch=1"><button type="button" class="btn btn-block btn-danger">Offline</button></a>';
                                }else{
                                    // echo '<a href="index.php?liveswitch=0"><button type="button" class="btn btn-block btn-success">Online</button></a>';
                                }
															$kick = DB::Query("SELECT radio FROM users WHERE id = " . DB::Escape($_SESSION['id']));
															if(DB::NumRows($kick) == 1) {
																$fetchkick = DB::Fetch($kick);
                                                            $query = DB::Query("SELECT id, radio, stream, port, password FROM stream_settings WHERE radio = " . $fetchkick['radio']);
															}
            if(DB::NumRows($query) == 1) {
                    $fetch = DB::Fetch($query);
            // echo '<br><br><a href="http://' . $fetch['stream'] . ':' . $fetch['port'] .'/admin.cgi?pass=' . $fetch['password'] .'&mode=kicksrc"><button type="button" class="btn btn-block btn-success">Kick Stream</button></a>';
            }    
                                                            }
                                ?>
								<?php if($user->type == 2) { ?>
                                <?php if($user->status == 0) {
                                    // echo '<a href="index.php?liveswitch=1"><button type="button" class="btn btn-block btn-danger">Offline</button></a>';
                                }else{
                                   // echo '<a href="index.php?liveswitch=0"><button type="button" class="btn btn-block btn-success">Online</button></a>';
                                }
                                                            $query = DB::Query("SELECT id, radio, stream, port, password FROM stream_settings WHERE radio = " . DB::Escape($_SESSION['id']));
            if(DB::NumRows($query) == 1) {
                    $fetch = DB::Fetch($query);
            // echo '<br><br><a href="http://' . $fetch['stream'] . ':' . $fetch['port'] .'/admin.cgi?pass=' . $fetch['password'] .'&mode=kicksrc"><button type="button" class="btn btn-block btn-success">Kick Stream</button></a>';
            }    
                                                            }
                                ?>
<?php
// Server Settings //
$ip = $fetch['stream']; // The IP or hostname of your server
$port = $fetch['port']; // The shoutcast port that listeners connect on
$pass = $fetch['password']; // This should be your ADMIN password, and may not be the same as the one your DJs use to connect
// Messages //
$success_message = "De stream is gekickt, u kan verbinden met de streamserver.";
$error_message = "De verbinding is geweigerd, controleer of de stream online is. De stream kicker werkt alleen met Shoutcast v1 en v2.";
// No need to edit below //
$fp = @fsockopen($ip, $port, $errno, $errstr, 4);
if (!$fp)
	{
	print $error_message;
	}
else
	{
	fputs($fp, "GET /admin.cgi?pass=$pass&mode=kicksrc&sid=1 HTTP/1.0\r\nUser-Agent: Mozilla\r\n\r\n");
	fclose($fp);
	print $success_message;
	}
?>
</section>
</div>
<?php 
require_once('template/TH4Y/footer.php'); 
?>