<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if(Users::LoggedIn() && $user->type == 3) {


	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_GET['id'])) {
		if(trim($_POST['password']) == '' && trim($_POST['password2']) == '') {
			DB::Query("UPDATE users SET username = '" . DB::Escape($_POST['userid']) . "', email = '" . DB::Escape($_POST['email']) . "', firstname = '" . DB::Escape($_POST['firstname']) . "', lastname = '" . DB::Escape($_POST['lastname']) . "' WHERE id = '" . DB::Escape($_GET['id']) . "'");
			$success = true;
		}else{
			if($_POST['password'] == $_POST['password2']) {
				DB::Query("UPDATE users SET username = '" . DB::Escape($_POST['userid']) . "', password = '" . DB::Escape(Users::Hash($_POST['password'])) . "', email = '" . DB::Escape($_POST['email']) . "', firstname = '" . DB::Escape($_POST['firstname']) . "', lastname = '" . DB::Escape($_POST['lastname']) . "'  WHERE id = '" . DB::Escape($_GET['id']) . "'");
				$success = true;
			}
			
		}
	}else{
		if(trim($_POST['password']) == '' && trim($_POST['password2']) == '') {
			DB::Query("UPDATE users SET username = '" . DB::Escape($_POST['userid']) . "', email = '" . DB::Escape($_POST['email']) . "', firstname = '" . DB::Escape($_POST['firstname']) . "', lastname = '" . DB::Escape($_POST['lastname']) . "' WHERE id = '" . DB::Escape($_SESSION['id']) . "'");
			$success = true;
		}else{
			if($_POST['password'] == $_POST['password2']) {
				DB::Query("UPDATE users SET username = '" . DB::Escape($_POST['userid']) . "', password = '" . DB::Escape(Users::Hash($_POST['password'])) . "', email = '" . DB::Escape($_POST['email']) . "', firstname = '" . DB::Escape($_POST['firstname']) . "', lastname = '" . DB::Escape($_POST['lastname']) . "'  WHERE id = '" . DB::Escape($_SESSION['id']) . "'");
				$success = true;
			}
			
		}
	}
	}
	

	$user = new User($_SESSION['id']);
	require_once('template/TH4Y/header.php');
	if(isset($_GET['id'])) {
		$admin = new User($_GET['id']);	
	}else{
		$admin = $user;
	}
	
	//$query = DB::Query("SELECT id, username, email, firstname, lastname FROM admins");
	
	require_once('template/TH4Y/adminform.php');
	require_once('template/TH4Y/footer.php');
}else{
	header('Location: ' . $site_url);
}