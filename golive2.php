<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if(Users::LoggedIn()) {


	$user = new User($_SESSION['id']);
	require_once('template/TH4Y/header.php');
	if(isset($_GET['id'])) {
		$dj = new User($_GET['id']);	
	}else{
		$dj = $user;
	}


	if(!isset($_GET['id'])) {
		$_GET['id'] = $_SESSION['id'];
	}

	if(empty($user->radio) && $user->type == 2) {
		$radio = $_SESSION['id'];
	}else{
		$radio = $user->radio;
	}

	$nums = DB::NumRows(DB::Query("SELECT id FROM users WHERE id = '" . DB::Escape($_GET['id']) . "' AND radio = '" . DB::Escape($radio) . "'"));

	if($nums != 1) {
        die("Whoat?! Hier mag jij niet in komen..");
    }

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
			DB::Query("UPDATE users SET nextdj = '" . DB::Escape($_POST['nextdj']) . "', status = 1, verzoekform = 0 WHERE id = '" . DB::Escape($_GET['id']) . "'");
			
				
			$success = true;
			
			
		}
			
		



		


	


	
	//$query = DB::Query("SELECT id, username, email, firstname, lastname FROM admins");
	
	require_once('template/TH4Y/golive.php');
	require_once('template/TH4Y/footer.php');
}else{
	header('Location: ' . $site_url);
}
