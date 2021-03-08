<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');

if(Users::LoggedIn() && $user->type == 2) {
    
    
    $user = new User($_SESSION['id']);
    require_once('template/TH4Y/header.php');
    $query = DB::Query("SELECT id, username, avatar, email, firstname, lastname FROM users WHERE type = '1' AND radio = '" . DB::Escape($_SESSION['id']) . "'");

    if(isset($_GET['delete']) && is_numeric($_GET['delete'])) {
        DB::Query("DELETE FROM users WHERE id = '" . DB::Escape($_GET['delete']) . "' AND radio = '" . DB::Escape($_SESSION['id']) . "'");
        $deleted = true;
    }

    require_once('template/TH4Y/djs1.php');
    require_once('template/TH4Y/footer.php');
}else{
    header('Location: index.php');
}