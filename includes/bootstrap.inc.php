<?php
/**
 * liverequest systeem
 * @author Prelution
 */


error_reporting(E_ALL);
ini_set("display_errors", 1);

$type = '';

if (!isset($_SESSION))
  {
    session_start();
  }

if(stristr($_SERVER['REQUEST_URI'], 'bootstrap.inc.php')){
	die("Whoat?! Hier mag jij niet in komen..");
}

require_once('config.inc.php');
require_once('classes/users.class.php');
require_once('classes/user.class.php');
require_once('classes/phpmailer.class.php');
require_once('classes/captcha.class.php');
require_once('classes/db.class.php');
require_once('classes/shoutcast.class.php');

$publickey = 'Captcha pubkey';
$privatekey = 'secret';
$error = null;
$resp = null;


DB::Initialize($settings['db']);

if(Users::LoggedIn()) {
	$user = new User($_SESSION['id']);
	if($user->type == 1) {
		$type = 'dj';
		$query = DB::Query("SELECT id, radio, stream, port FROM stream_settings WHERE radio = " . DB::Escape($user->radio));
		if(DB::NumRows($query) == 1) {
			$streamInfo = DB::Fetch($query);
		}else{
			$streamInfo = array(
									'id' => '',
									'radio' => '',
									'stream' => '',
									'port' => '',
									);
		}
		$radio=new Shoutcast($streamInfo['stream'], $streamInfo['port']);
	}
	if($user->type == 2) {
		$type = 'radio';
		$query = DB::Query("SELECT id, radio, stream, port FROM stream_settings WHERE radio = " . DB::Escape($_SESSION['id']));
		if(DB::NumRows($query) == 1) {
			$streamInfo = DB::Fetch($query);
		}else{
			$streamInfo = array(
									'id' => '',
									'radio' => '',
									'stream' => '',
									'port' => '',
									
								);
		}
		$radio=new Shoutcast($streamInfo['stream'], $streamInfo['port']);
	}
	if($user->type == 3) {
		$type = 'admin';
	}
}