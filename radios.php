<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if(Users::LoggedIn() && $user->type == 3) {
	$user = new User($_SESSION['id']);
	require_once('template/TH4Y/header.php');
	$query = DB::Query("SELECT id, station, avatar, nonstopavatar, username, email, firstname, lastname FROM users WHERE type = '2'");

	if(isset($_GET['delete']) && is_numeric($_GET['delete'])) {
		DB::Query("DELETE FROM users WHERE id = '" . DB::Escape($_GET['delete']) . "'");
		DB::Query("DELETE FROM users WHERE radio = '" . DB::Escape($_GET['delete']) . "'");
		$deleted = true;
	}

	require_once('template/TH4Y/radios1.php');
	require_once('template/TH4Y/footer.php');
}else{
	header('Location: ' . $site_url);
}