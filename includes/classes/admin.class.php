<?php
if(stristr($_SERVER['REQUEST_URI'], 'admin.class.php')){
	die("Whoat?! Hier mag jij niet in komen..");
}

class Admin {
	public $id;
	public $username;
	public $email;
	public $firstname;
	public $lastname;

	public function __construct($id) {
		$query = DB::Query("SELECT id, username, email, firstname, lastname FROM admins WHERE id = '" . DB::Escape($id)  . "'");
		$fetch = DB::FetchObject($query);
		if(DB::NumRows($query) == 1) {
			$this->id = $fetch->id;
			$this->username = $fetch->username;
			$this->email = $fetch->email;
			$this->firstname = $fetch->firstname;
			$this->lastname = $fetch->lastname;

			return true;
		}else{
			return false;
		}
	}
}