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
		if(trim($_POST['password']) == '' && trim($_POST['password2']) == '') {
			DB::Query("UPDATE users SET username = '" . DB::Escape($_POST['userid']) . "', email = '" . DB::Escape($_POST['email']) . "', firstname = '" . DB::Escape($_POST['firstname']) . "', lastname = '" . DB::Escape($_POST['lastname']) . "', canchange = '" . DB::Escape($_POST['canchange']) . "', refresh = '" . DB::Escape($_POST['refresh']) . "', kick = '" . DB::Escape($_POST['kick']) . "' WHERE id = '" . DB::Escape($_GET['id']) . "'");
			$success = true;
		}else{
			if($_POST['password'] == $_POST['password2']) {
				DB::Query("UPDATE users SET username = '" . DB::Escape($_POST['userid']) . "', password = '" . DB::Escape(Users::Hash($_POST['password'])) . "', email = '" . DB::Escape($_POST['email']) . "', firstname = '" . DB::Escape($_POST['firstname']) . "', lastname = '" . DB::Escape($_POST['lastname']) . "', canchange = '" . DB::Escape($_POST['canchange']) . "', refresh = '" . DB::Escape($_POST['refresh']) . "', kick = '" . DB::Escape($_POST['kick']) . "'  WHERE id = '" . DB::Escape($_GET['id']) . "'");
				$success = true;
			}
			
		}



		if($_FILES['avatar']['name'] != ''){
						$error = '';
						$filename = htmlspecialchars($_FILES['avatar']['name']);

						$extension =  pathinfo($filename, PATHINFO_EXTENSION);
						$extension = strtolower($extension);
						list($width, $height, $type, $attr) = getimagesize($_FILES['avatar']['tmp_name']);

						if ($width > 300 || $height > 300) {
						    $error = 'Je avatar mag niet groter dan 150px breed en 150px hoog zijn!';
						}else if ($_FILES['avatar']['size'] > 500000 ) {
						    $error = 'Je avatar is te groot.';    
						}else if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
							$error = 'Je avatar exentie mag enkel een JPG, PNG of GIF zijn en mag niet groter dan 80kb zijn!';
						}else{
							if($user->type == 2) {
						$image_name = strtolower($_GET['id'] . $_POST['userid']) . '.' . $extension;
							}else{
								$image_name = strtolower($user->id . $user->username) . '.' . $extension;
							}

						$newname = "avatars/".$image_name;

						$copied = copy($_FILES['avatar']['tmp_name'], $newname);

						if (!$copied)
						{
							echo 'Er ging wat mis tijdens het uploaden, je gegevens zijn niet opgeslagen.';
						}
						if($error == '') {
							if($user->type == 2) { 
							DB::Query("UPDATE users SET avatar='/".DB::Escape($newname)."' WHERE id = '" . DB::Escape($_GET['id'])."'");
							}else{
								DB::Query("UPDATE users SET avatar='/".DB::Escape($newname)."' WHERE id = '" . DB::Escape($_SESSION['id'])."'");
							}
						}else{
							$success = false;
						}
					   }

					}

		} //else{ $error = 'Helaas is er iets niet goed gegaan, probeer het opnieuw'; }
	


	
	//$query = DB::Query("SELECT id, username, email, firstname, lastname FROM admins");
	
	require_once('template/TH4Y/djform2.php');
	require_once('template/TH4Y/footer.php');
}else{
	die("Whoat?! Hier mag jij niet in komen..");
}