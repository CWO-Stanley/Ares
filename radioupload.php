<?php
	require_once('includes/bootstrap.inc.php');
	$user = new User($_SESSION['id']);
		// require_once('template/TH4Y/header.php');
		if(isset($_GET['id'])) {
			$radio = new User($_GET['id']);	
		}else{
			$radio = $user;
		}
	
	//Check if the file is well uploaded
	if($_FILES['file']['error'] > 0) { echo 'Error during uploading, try again'; }
	
	//We won't use $_FILES['file']['type'] to check the file extension for security purpose
	
	//Set up valid image extensions
	$extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );
	
	//Extract extention from uploaded file
		//substr return ".jpg"
		//Strrchr return "jpg"
		
	$extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;
	//Check if the uploaded file extension is allowed
	
	if (in_array($extUpload, $extsAllowed) ) { 
	
	//Upload the file on the server
	$filename = htmlspecialchars($_FILES['file']['name']);
	$extension =  pathinfo($filename, PATHINFO_EXTENSION);
	$image_name = strtolower($user->id . $user->username) . '.' . $extension;

						// $newname = 
	
	$name = $image_name;
	$result = move_uploaded_file($_FILES['file']['tmp_name'], 'avatars/'.$name);
	DB::Query("UPDATE users SET avatar='/avatars/".DB::Escape($name)."' WHERE id = '" . DB::Escape($user->id)."'");
	if($result){
		header('Location: editradio.php');
		}
		
	} else { echo 'File is not valid. Please try again'; }
	
?>