<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if(Users::LoggedIn() && $user->type == 3) {
	$user = new User($_SESSION['id']);
	require_once('template/TH4Y/header.php');
	$query = DB::Query("SELECT id, username, email, firstname, lastname FROM users WHERE type = '3'");

	if(isset($_GET['delete']) && is_numeric($_GET['delete'])) {
		DB::Query("DELETE FROM users WHERE id = '" . DB::Escape($_GET['delete']) . "'");
		$deleted = true;
	}

	require_once('template/TH4Y/admins.php');
	require_once('template/TH4Y/footer.php');
}else{
	header('Location: ' . $site_url);
}