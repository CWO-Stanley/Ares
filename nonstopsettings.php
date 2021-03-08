<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if(Users::LoggedIn() || $user->type == 2 || $user->type == 3) {
	
$query = DB::Query("SELECT id, radio, station, nonstopavatar, nonstopverzoek FROM users WHERE id = " . DB::Escape($_SESSION['id']));
	if(DB::NumRows($query) == 1) {
		$streamInfo = DB::Fetch($query);
	}else{
		$streamInfo = array(
								'id' => '',
								'radio' => '',
								'station' => '',
								'nonstopavatar' => '',
								'nonstopverzoek' => '',
								);
	}


	if(!isset($_GET['id'])) {
		$_GET['id'] = $_SESSION['id'];
	}
	$user = new User($_SESSION['id']);
		require_once('template/TH4Y/header.php');
		if(isset($_GET['id'])) {
			$radio = new User($_GET['id']);	
		}else{
			$radio = $user;
		}
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(trim($_POST['ip']) == '' ) {

		}else{
			
			// DB::Query("UPDATE users SET nonstopavatar='/".DB::Escape(htmlentities($_POST['ip']))."' WHERE id = '" . DB::Escape($user->id)."'");
			// $success = true;
		}
		if($_FILES['ip']['name'] != ''){
						$error = '';
						$filename = htmlspecialchars($_FILES['ip']['name']);

						$extension =  pathinfo($filename, PATHINFO_EXTENSION);
						$extension = strtolower($extension);
						list($width, $height, $type, $attr) = getimagesize($_FILES['ip']['tmp_name']);

						if ($width > 150 || $height > 150) {
						    $error = 'Je avatar mag niet groter dan 150px breed en 150px hoog zijn!';
						}else if ($_FILES['ip']['size'] > 500000 ) {
						    $error = 'Je avatar is te groot.';    
						}else if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
							$error = 'Je avatar exentie mag enkel een JPG, PNG of GIF zijn en mag niet groter dan 80kb zijn!';
						}else{
						$image_name = strtolower($user->id . $user->id) . '.' . $extension;

						$newname = "avatars/".$image_name;

						$copied = copy($_FILES['ip']['tmp_name'], $newname);

						if (!$copied)
						{
							echo 'Er ging wat mis tijdens het uploaden, je gegevens zijn niet opgeslagen.';
						}
						if($error == '') {
							DB::Query("UPDATE users SET nonstopavatar='/avatars/".DB::Escape($newname)."' WHERE id = '" . DB::Escape($user->id)."'");
						}else{
							$success = false;
						}
					   }

					}
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(trim($_POST['Non-StopVerzoek']) == '' ) {

		}else{
			DB::Query("UPDATE users SET nonstopverzoek='".DB::Escape(htmlentities($_POST['Non-StopVerzoek']))."' WHERE id = '" . DB::Escape($user->id)."'");
			$success = true;
		}
		
	}


		require_once('template/TH4Y/header.php');
		require_once('template/TH4Y/nonstopsettings1.php');
		require_once('template/TH4Y/footer.php');
}else{
	header('Location: ' . $site_url);
}