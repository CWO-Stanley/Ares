<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');
if(isset($_GET['key'])) {
	$query = DB::Query("SELECT id FROM users WHERE newpass = '" . DB::Escape($_GET['key']) . "'");
	if(DB::NumRows($query) == 1) {
		$query2 = DB::Query("UPDATE users SET password = '" . Users::Hash(DB::Escape($_GET['key'])) . "' WHERE newpass = '" . DB::Escape($_GET['key']) . "'");
		if($query2) {
			$success = 'Uw wachtwoord is gereset. Uw nieuwe wachtwoord is: ' . htmlentities($_GET['key']) . '';
		}else{
			$error = 'Er is iets fout gegaan tijdens het resetten van uw wachtwoord.';
		}
	}else{
		$error = 'Er is geen aanvraag gedaan met deze code.';
	}
	require_once('template/TH4Y/forgotpw.php');
}else{
	exit('Geen permissie.');
}
?>