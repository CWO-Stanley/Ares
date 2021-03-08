<?php
if(stristr($_SERVER['REQUEST_URI'], 'users.class.php')){
	die("Whoat?! Hier mag jij niet in komen..");
}

class Users {

	public static function Auth($username, $password) {
		$num = DB::NumRows(DB::Query("SELECT id, username, password FROM users WHERE username = '" . DB::Escape($username)  . "' AND password = '" . DB::Escape(self::Hash($password)) . "'"));
		if($num == 1) {
			return true;
		}else{
			return false;

		}
	}

	public static function Hash($unhashed) {
		$hashed = sha1(sha1(sha1(sha1($unhashed) . 'AF*AY*FY') . 'AF*UA*(YHUSIHY') . 'AFAHFUIUFHif9UAFo');
		return $hashed;
	}

	public static function LoggedIn() {
		if(isset($_SESSION['id']) && is_numeric($_SESSION['id'])) {
			DB::Query("UPDATE users SET loggedin = 1, lastused = NOW() WHERE id = " . DB::Escape($_SESSION['id']));
			return true;
		}else{
			return false;
		}
	}

	public static function getIdByUsername($username) {
		$query = DB::Query("SELECT id FROM users WHERE username = '" . DB::Escape($username)  . "'");
		$fetch = DB::FetchObject($query);
		if(DB::NumRows($query) == 1) {
			return $fetch->id;
		}else{
			return false;
		}
	}
}