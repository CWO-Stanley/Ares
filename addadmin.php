<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if(Users::LoggedIn()) {


	if($_SERVER['REQUEST_METHOD'] == 'POST') {
			if($_POST['password'] == $_POST['password2']) {
				DB::Query("INSERT INTO users (username, password, email, firstname, lastname, type, avatar, nonstopavatar, refresh, radio) VALUES 
					('" . DB::Escape($_POST['userid']) . "', 
					 '" . DB::Escape(Users::Hash($_POST['password'])) . "', 
					 '" . DB::Escape($_POST['email']) . "', 
					 '" . DB::Escape($_POST['firstname']) . "', 
					 '" . DB::Escape($_POST['lastname']) . "', 
					 '3',
					 '/avatars/noavatar.png',
					 '/noavatar.png',
					 '999',
					 '" . DB::Escape($_POST['userid']) . "');
				");
				$success = true;
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