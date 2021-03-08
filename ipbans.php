<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');
require_once('template/TH4Y/header.php');


	if(isset($_SESSION['id']) && $user->type == 1) {
                            $radio = $user->radio;
                        }elseif($user->type == 2){
                            $radio = $_SESSION['id'];
                        }

                        

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	
      <h1>
        IP Ban beheer
        </h1>
     </section>

    <!-- Main content -->
	
    <section class="content">
	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        	if(trim($_POST['ip']) != '' && trim($_POST['reason']) != '') {
                        		DB::Query("INSERT INTO ipbans (id, radio, ip, reason, banDate) VALUES (NULL, '" . DB::Escape($radio) . "', '" . DB::Escape($_POST['ip']) . "', '" . DB::Escape(htmlentities($_POST['reason'])) . "', NOW());");
                        		echo '<div class="alert alert-danger">Het gewenste ip adres is succesvol gebant.</div>';
                        	}
                        }

                        if(isset($_GET['delete']) && trim($_GET['delete']) != '' && is_numeric($_GET['delete'])) {
                        	DB::Query("DELETE FROM ipbans WHERE id = '" . DB::Escape($_GET['delete']) . "' AND radio = '" . DB::Escape($radio) . "'");
                        	echo '<div class="alert alert-success">Het gewenste ip adres is succesvol geunbant.</div>';
                        }
						if(isset($_GET['ban']) && trim($_GET['ban']) != '') {
                        	DB::Query("INSERT INTO ipbans (id, radio, ip, reason, banDate) VALUES (NULL, '" . DB::Escape($radio) . "', '" . DB::Escape($_GET['ban']) . "', '" . DB::Escape(htmlentities($_GET['reason'])) . "', NOW());");
                        	echo '<div class="alert alert-danger">Het gewenste ip adres is succesvol gebant.</div>';
                        }
						?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Hier ziet u uw Bans voor Verzoekjes
                </h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <table class="table table-striped">
                                        <tbody>
                                        	<tr>
	                                            <th style="width: 10px">#</th>
	                                            <th>IP-adres</th>
	                                            <th>Reden</th>
	                                            <th>Geband op</th>
	                                            <th>Acties</th>
                                        	</tr>
                                        	<?php
                                        	$query = DB::Query("SELECT id, radio, ip, reason, banDate FROM ipbans WHERE radio = " . DB::Escape($radio));
	                                        while($aFetch = DB::Fetch($query)) { 
	                                        echo '<tr>
	                                            <td>' . $aFetch['id'] . '</td>
	                                            <td>' . $aFetch['ip'] . '</td>
	                                            <td>' . $aFetch['reason'] . '</td>
	                                            <td>' . $aFetch['banDate'] . '</td>
	                                            <td>
	                                                <a href="ipbans.php?delete=' . $aFetch['id'] . '"><span class="glyphicon glyphicon-remove"></span></a>
	                                            </td>
	                                            </tr>';
	                                        }
	                                        ?>
                                       </tbody>
                                    </table>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
	<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Hier kan u een ban geven voor de Verzoek
                </h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form class="form-horizontal" method="post" action="">

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ip">IP-adres</label>  
  <div class="col-md-4">
  <input id="ip" name="ip" type="text" placeholder="IP-adres" class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="reason">Reden</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="reason" name="reason"></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Bannen</button>
  </div>
</div>

</form>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
  </div>
  <!-- /.content-wrapper -->
<?php
require_once('template/TH4Y/footer.php');
?>