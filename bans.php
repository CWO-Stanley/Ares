<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');
require_once('template/TH4Y/header.php');


	

?>

	<?php
	if(isset($_SESSION['id']) && $user->type == 1) {
                            $radio = $user->radio;
                        }elseif($user->type == 2){
                            $radio = $_SESSION['id'];
                        }elseif($user->type == 3){ $radio = $_SESSION['id']; }

                        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        	if(trim($_POST['ip']) != '' && trim($_POST['reason']) != '') {
                        		DB::Query("INSERT INTO ipbans (id, radio, ip, reason, banDate) VALUES (NULL, '" . DB::Escape($radio) . "', '" . DB::Escape($_POST['ip']) . "', '" . DB::Escape(htmlentities($_POST['reason'])) . "', NOW());");
                        		echo '<div class="alert alert-success">Het gewenste ip adres is succesvol gebant.</div>';
                        	}
                        }

                        if(isset($_GET['delete']) && trim($_GET['delete']) != '' && is_numeric($_GET['delete'])) {
                        	DB::Query("DELETE FROM ipbans WHERE id = '" . DB::Escape($_GET['delete']) . "'");
                        	echo '<div class="alert alert-success">Het gewenste ip adres is succesvol geunbant.</div>';
                        }
						?>
						
<?php
if(Users::LoggedIn() && $user->type == 3) {
	$user = new User($_SESSION['id']);
	
require_once('template/TH4Y/bans.php');
	require_once('template/TH4Y/footer.php');
}else{
	header('Location: ' . $site_url);
}