<meta http-equiv="refresh" content="120">
<marquee>
<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	echo 'Radio ID ontbreekt.';
	exit();
}else{
	$query = DB::Query("SELECT stream, port FROM stream_settings WHERE radio = " . DB::Escape($_GET['id']));
	if(DB::NumRows($query) == 0) {
		echo 'Deze radio bestaat niet of de stream instellingen zijn niet ingesteld.';
		exit();
	}else{
		$fetch = DB::Fetch($query);
		$radio = new Shoutcast($fetch['stream'], $fetch['port']);
		if($radio->connected()) { 
			echo '<strong>Huidig nummer:&nbsp;&nbsp;&nbsp;</strong>' . $radio->song(); 
		}else{ 
			echo 'Radio is offline'; 
		}
	}
}
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	echo 'Radio ID ontbreekt.';
	exit();
}else{
	$query = DB::Query("SELECT stream, port FROM stream_settings WHERE radio = " . DB::Escape($_GET['id']));
	if(DB::NumRows($query) == 0) {
		echo 'Deze radio bestaat niet of de stream instellingen zijn niet ingesteld.';
		exit();
	}else{
		$fetch = DB::Fetch($query);
		$radio = new Shoutcast($fetch['stream'], $fetch['port']);
		if($radio->connected()) { 
			echo '<strong>Huidig nummer:&nbsp;&nbsp;&nbsp;</strong>' . $radio->song(); 
		}else{ 
			echo 'Radio is offline'; 
		}
	}
}
?>
</marquee>