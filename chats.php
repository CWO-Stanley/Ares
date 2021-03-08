<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if(Users::LoggedIn() && $user->type == 3) {
	$user = new User($_SESSION['id']);
	require_once('template/TH4Y/header.php');
	$query = DB::Query("SELECT id, radio, radionaam, themecolor, themefontcolor, autoplay, streamtype, streampath, startvolume, streamgegevens, port, radiouid, apikey, kanaalnaam, visits, lastused, bgurl, icons, mic, webcam, prive   FROM chat_settings ORDER by lastused DESC");

	if(isset($_GET['delete']) && is_numeric($_GET['delete'])) {
		DB::Query("DELETE FROM chat_settings WHERE id = '" . DB::Escape($_GET['delete']) . "'");
		DB::Query("DELETE FROM chat_settings WHERE radio = '" . DB::Escape($_GET['delete']) . "'");
		$deleted = true;
	}

	require_once('template/TH4Y/chats.php');
	require_once('template/TH4Y/footer.php');
}else{
	header('Location: ' . $site_url);
}