<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if(Users::LoggedIn()) {


	if($_SERVER['REQUEST_METHOD'] == 'POST') {

			if($_POST['password'] == $_POST['password2'] && DB::NumRows(DB::Query("SELECT id FROM users WHERE username = '" . DB::Escape($_POST['userid']) . "'")) == 0) {
				
				DB::Query("INSERT INTO users (username, station, password, email, firstname, lastname, type, avatar, nonstopverzoek, nonstopavatar, refresh, radio) VALUES 
					('" . DB::Escape($_POST['userid']) . "', 
					 '" . DB::Escape($_POST['station']) . "', 
					 '" . DB::Escape(Users::Hash($_POST['password'])) . "', 
					 '" . DB::Escape($_POST['email']) . "', 
					 '" . DB::Escape($_POST['firstname']) . "', 
					 '" . DB::Escape($_POST['lastname']) . "', 
					 '2',
					 '/avatars/noavatar.png',
					 'Er is momenteel geen DJ aanwezig, je kunt dus geen verzoeknummers aanvragen.',
					 '/noavatar.png',
					 '999',
					 '" . DB::Escape($_POST['userid']) . "');
				");
				DB::Query("UPDATE users SET radio=last_insert_id() WHERE id=last_insert_id()");
				$success = true;
			}
			
		}

	$user = new User($_SESSION['id']);
	require_once('template/TH4Y/header.php');

	//$query = DB::Query("SELECT id, username, email, firstname, lastname FROM admins");
	
	require_once('template/TH4Y/radioform2.php');
	require_once('template/TH4Y/footer.php');
}else{
	header('Location: ' . $site_url);
}