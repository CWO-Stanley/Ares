<?php
/**
 * liverequest systeem
 * @author Prelution
 */
require_once('includes/bootstrap.inc.php');
$selQuery = DB::Query("SELECT id FROM users WHERE email = '" . DB::Escape(urldecode($_GET['email'])) . "' AND activationkey = '" . DB::Escape(urldecode($_GET['code'])) . "'");
if(DB::NumRows($selQuery) == 1) {
	$upQuery = DB::Query("UPDATE users SET activated = 1 WHERE activationkey = '" . DB::Escape(urldecode($_GET['code'])) . "'");
	if($upQuery) {

		header('Location: index.php?activated');
	}else{
		header('Location: index.php');
	}
	exit();
}
header('Location: index.php');
exit();