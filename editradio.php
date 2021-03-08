<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if(Users::LoggedIn() || $user->type == 2 || $user->type == 3) {

		$query = DB::Query("SELECT id, username, station, password, email, refresh, firstname, lastname, radio, address, city, postcode FROM users WHERE id = " . DB::Escape($_SESSION['id']));
	if(DB::NumRows($query) == 1) {
		$radio = DB::Fetch($query);
	}else{
		$radio = array(
								'id' => '',
								'username' => '',
								'station' => '',
								'password' => '',
								'email' => '',
								'firstname' => '',
								'lastname' => '',
								'radio' => '',
								'address' => '',
								'refresh' => '',
								'city' => '',
								'postcode' => '',
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
		if(DB::NumRows(DB::Query("SELECT id FROM users WHERE username = '" . DB::Escape($_POST['userid']) . "'")) == 1) {
		if(trim($_POST['password']) == '' && trim($_POST['password2']) == '') {
			DB::Query("UPDATE users SET username = '" . DB::Escape($_POST['userid']) . "', email = '" . DB::Escape($_POST['email']) . "', firstname = '" . DB::Escape($_POST['firstname']) . "', lastname = '" . DB::Escape($_POST['lastname']) . "', station = '" . DB::Escape($_POST['station']) . "', refresh = '" . DB::Escape($_POST['refresh']) . "' WHERE id = '" . DB::Escape($_GET['id']) . "'");
			$success = true;
		}else{
			if($_POST['password'] == $_POST['password2']) {
				DB::Query("UPDATE users SET username = '" . DB::Escape($_POST['userid']) . "', password = '" . DB::Escape(Users::Hash($_POST['password'])) . "', email = '" . DB::Escape($_POST['email']) . "', firstname = '" . DB::Escape($_POST['firstname']) . "', lastname = '" . DB::Escape($_POST['lastname']) . "', station = '" . DB::Escape($_POST['station']) . "', refresh = '" . DB::Escape($_POST['refresh']) . "'  WHERE id = '" . DB::Escape($_GET['id']) . "'");
				$success = true;
			}
			
		}


		if($_FILES['avatar']['name'] != ''){
						$filename = htmlspecialchars($_FILES['avatar']['name']);

						$extension =  pathinfo($filename, PATHINFO_EXTENSION);
						$extension = strtolower($extension);
						list($width, $height, $type, $attr) = getimagesize($_FILES['avatar']['tmp_name']);

						if ($width > 300 || $height > 300) {
						    echo 'Je avatar mag niet groter dan 150px breed en 150px hoog zijn!';
						}else if ($_FILES['avatar']['size'] > 500000 ) {
						    echo 'Je avatar is te groot.';    
						}else if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
							echo 'Je avatar exentie mag enkel een JPG, PNG of GIF zijn en mag niet groter dan 80kb zijn!';
						}else{
						$image_name = strtolower($user->id . $user->username) . '.' . $extension;

						$newname = "avatars/".$image_name;

						$copied = copy($_FILES['avatar']['tmp_name'], $newname);

						if (!$copied)
						{
							echo 'Er ging wat mis tijdens het uploaden, je gegevens zijn niet opgeslagen.';
						}

						DB::Query("UPDATE users SET avatar='".DB::Escape($newname)."' WHERE id = '" . DB::Escape($user->id)."'");
						$success = true;
					   }

					}

		}else{ $error = 'Helaas is er iets niet goed gegaan, probeer het opnieuw'; }
	}

	
	
	//$query = DB::Query("SELECT id, username, email, firstname, lastname FROM admins");
	
	require_once('template/TH4Y/radioform.php');
	require_once('template/TH4Y/footer.php');
}else{
	header('Location: ' . $site_url);
}