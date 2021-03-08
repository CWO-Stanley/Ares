<?php
if(stristr($_SERVER['REQUEST_URI'], 'user.class.php')){
	die("Whoat?! Hier mag jij niet in komen..");
}

class User {
	public $id;
	public $username;
	public $station;
	public $email;
	public $firstname;
	public $lastname;
	public $type;
	public $radio;
	public $status;
	public $address;
	public $city;
	public $postcode;

	public function __construct($id) {
		$query = DB::Query("SELECT id, username, station, email, firstname, lastname, type, radio, status, address, numOfRequests, city, postcode FROM users WHERE id = '" . DB::Escape($id)  . "'");
		$fetch = DB::FetchObject($query);
		if(DB::NumRows($query) == 1) {
			$this->id = $fetch->id;
			$this->username = $fetch->username;
			$this->station = $fetch->station;
			$this->email = $fetch->email;
			$this->firstname = $fetch->firstname;
			$this->lastname = $fetch->lastname;
			$this->type = $fetch->type;
			$this->address = $fetch->address;
			$this->city = $fetch->city;
			$this->postcode = $fetch->postcode;

			if($fetch->type == 1) {
				$this->radio = $fetch->radio;
			}else{
				$this->radio = null;
			}
			$this->status = $fetch->status;

			return true;
		}else{
			return false;
		}
	}
}