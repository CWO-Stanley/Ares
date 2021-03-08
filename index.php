<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if(Users::LoggedIn()) {
	require_once('template/TH4Y/header.php');
	require_once('template/TH4Y/admindashboard.php');
	require_once('template/TH4Y/footer.php');
}else{
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(Users::Auth($_POST['userid'], $_POST['password'])) {
			//
			if(Users::getIdByUsername($_POST['userid'])) {
				$_SESSION['id'] = Users::getIdByUsername($_POST['userid']);
				DB::Query("UPDATE users SET status = 0, lastused = NOW() WHERE id = " . DB::Escape(Users::getIdByUsername($_POST['userid'])));
				$success = true;
				echo '<meta http-equiv="refresh" content="2; url=index.php" />';
			}else{
				$errors = 'Er bestaat geen account met deze gegevens.';	
			}
		}else{
			$errors = 'Er bestaat geen account met deze gegevens.';
		}
	}
	require_once('template/TH4Y/login.php');
}