<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if($user->type >= 2) {
	$query = DB::Query("SELECT id, radio, radionaam, themecolor, themefontcolor, autoplay, streamtype, streampath, startvolume, streamgegevens, port, radiouid, apikey  FROM player_settings WHERE radio = " . DB::Escape($_SESSION['id']));
	if(DB::NumRows($query) == 1) {
		$playerInfo = DB::Fetch($query);
	}else{
		$playerInfo = array(
								'id' => '',
								'radio' => '',
								'radionaam' => '',
								'themecolor' => '',
								'themefontcolor' => '',
								'autoplay' => '',
								'streamtype' => '',
								'streampath' => '',
								'startvolume' => '',
								'streamgegevens' => '',
								'port' => '',
								'radiouid' => '',
								'apikey' => '',
								
							);
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(trim($_POST['streamgegevens']) == '' || trim($_POST['port']) == '' ){

		}else{
			$query = DB::Query("SELECT id, radio, radionaam, themecolor, themefontcolor, autoplay, streamtype, streampath, startvolume, streamgegevens, port, radiouid, apikey FROM player_settings WHERE radio = " . DB::Escape($_SESSION['id']));
			if(DB::NumRows($query) == 1) {
				DB::Query("UPDATE player_settings SET radio = '" . DB::Escape($_SESSION['id']) . "', radionaam = '" . DB::Escape($_POST['radionaam']) . "', autoplay = '" . DB::Escape($_POST['autoplay']) . "', streamtype = '" . DB::Escape($_POST['streamtype']) . "', startvolume = '" . DB::Escape($_POST['startvolume']) . "', themecolor = '" . DB::Escape($_POST['themecolor']) . "', themefontcolor = '" . DB::Escape($_POST['themefontcolor']) . "', streamgegevens = '" . DB::Escape($_POST['streamgegevens']) . "', port = '" . DB::Escape($_POST['port']) . "', radiouid = '" . DB::Escape($_POST['radiouid']) . "', apikey = '" . DB::Escape($_POST['apikey']) . "' WHERE radio = '" . DB::Escape($_SESSION['id']) . "'");
			}else{
			// DB::Query("DELETE FROM player_settings WHERE radio = " . DB::Escape($_SESSION['id']));
			DB::Query("INSERT INTO player_settings (radio, radionaam, autoplay, streamtype, startvolume, themecolor, themefontcolor, streamgegevens, port, radiouid, apikey ) VALUES 
						('" . DB::Escape($_SESSION['id']) . "', 
						 '" . DB::Escape(htmlentities($_POST['radionaam'])) . "',
						 '" . DB::Escape(htmlentities($_POST['autoplay'])) . "',
						 '" . DB::Escape(htmlentities($_POST['streamtype'])) . "',
						 '" . DB::Escape(htmlentities($_POST['startvolume'])) . "',
						 '" . DB::Escape(htmlentities($_POST['themecolor'])) . "',
						 '" . DB::Escape(htmlentities($_POST['themefontcolor'])) . "',
						 '" . DB::Escape(htmlentities($_POST['streamgegevens'])) . "',
						 '" . DB::Escape(htmlentities($_POST['port'])) . "',
						 '" . DB::Escape(htmlentities($_POST['radiouid'])) . "',
						 '" . DB::Escape(htmlentities($_POST['apikey'])) . "'
						 )"
						 );
			
		}
		$success = true;
		}
	}
	if(isset($_GET['delete']) && is_numeric($_GET['delete'])) {
		// DB::Query("DELETE FROM chat_settings WHERE id = '" . DB::Escape($_GET['delete']) . "'");
		DB::Query("DELETE FROM player_settings WHERE radio = '" . DB::Escape($_GET['delete']) . "'");
		header('Location: playersettings.php');
		$deleted = true;
	}
	

		require_once('template/TH4Y/header.php');
		require_once('template/TH4Y/playersettings.php');
		require_once('template/TH4Y/footer.php');
}else{
	header('Location: ' . $site_url);
}