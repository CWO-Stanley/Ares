<?php
if(stristr($_SERVER['REQUEST_URI'], 'config.inc.php')){
	die("Whoat?! Hier mag jij niet in komen..");
}
$site_url = 'FULL URL HERE';
$settings = array();
$settings['db'] = array();
$settings['db']['gebruiker'] = "user";
$settings['db']['wachtwoord'] = "pass";
$settings['db']['host'] = "127.0.0.1";
$settings['db']['db'] = "dbname";

