<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if($user->type >= 2) {
	$query = DB::Query("SELECT id, radio, stream, port, password, text, bg, bg1  FROM stream_settings WHERE radio = " . DB::Escape($_SESSION['id']));
	if(DB::NumRows($query) == 1) {
		$streamInfo = DB::Fetch($query);
	}else{
		$streamInfo = array(
								'id' => '',
								'radio' => '',
								'stream' => '',
								'port' => '',
								'password' => '',
								'text' => '',
								'bg' => '',
								'bg1' => '',
							);
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(trim($_POST['ip']) == '' || trim($_POST['port']) == '' ){

		}else{
			DB::Query("DELETE FROM stream_settings WHERE radio = " . DB::Escape($_SESSION['id']));
			DB::Query("INSERT INTO 
						stream_settings (radio, stream, port, password, text, bg, bg1) 
						VALUES 
						('" . DB::Escape($_SESSION['id']) . "', 
						 '" . DB::Escape(htmlentities($_POST['ip'])) . "',
						 '" . DB::Escape(htmlentities($_POST['port'])) . "',
						 '" . DB::Escape(htmlentities($_POST['password'])) . "',
						 '" . DB::Escape(htmlentities($_POST['text'])) . "',
						 '" . DB::Escape(htmlentities($_POST['bg'])) . "',
						 '" . DB::Escape(htmlentities($_POST['bg1'])) . "'
						 )");
			$success = true;
		}
	}
	

		require_once('template/TH4Y/header.php');
		require_once('template/TH4Y/streamsettings1.php');
		require_once('template/TH4Y/footer.php');
}else{
	header('Location: ' . $site_url);
}