<?php
/**
 * liverequest systeem
 * @author Prelution
 */
require_once('includes/bootstrap.inc.php');
DB::Query("UPDATE users SET status = 0 , loggedin = 0 WHERE id = " . DB::Escape($_SESSION['id']));
unset($_SESSION['id']);
session_destroy();
header('Location: index.php');