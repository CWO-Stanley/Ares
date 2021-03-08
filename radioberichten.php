<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');
require_once('template/TH4Y/header.php');


	

?>
<?php
 
                if($user->type == 2) {
                    $radioId = $_SESSION['id'];
                }
                ?>
				<script src="jscolor.js"></script>
				<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
                        BerichtenBalk
                    </h1>
					<?php
					if(isset($_GET['delete']) && is_numeric($_GET['delete'])) {
		DB::Query("DELETE FROM berichtenbalk WHERE id = '" . DB::Escape($_GET['delete']) . "'");
                        	echo '<div class="alert alert-success">Het gewenste bericht is succesvol verwijderd.</div>';
                        }
						if(isset($_GET['update']) && is_numeric($_GET['update'])) {
		DB::Query("UPDATE berichtenbalk set geaccepteerd = 1 WHERE id = '" . DB::Escape($_GET['update']) . "'");
                        	echo '<div class="alert alert-success">Het gewenste bericht is succesvol geaccepteerd.</div>';
                        }
						if(isset($_GET['ban'])) {
		DB::Query("INSERT INTO ipbans (id, radio, ip, banDate) VALUES (NULL, '" . DB::Escape($_GET['id']) . "', '" . DB::Escape($_GET['ban']) . "', NOW());");
                        		echo '<div class="alert alert-success">Het gewenste ip adres is succesvol gebant.</div>';
                        }
						if(isset($success) && $deleted && isset($_GET['success'])) {
                    echo '<div class="alert alert-success">Uw kleuren zijn succesvol opgeslagen.</div>';
                    echo '<meta http-equiv="refresh" content="1; url=editgastenboek.php" />';
                }
						
						
	
	
	
	
	
					?>
                </section>
				<br>



	  
	  <section class="col-md-12 connectedSortable">
                        <div class="box box-primary">
                <div class="box-header">
                                        <h3 class="box-title">Berichten die nog moeten worden Geaccepteerd</h3>
                                        <?php
                                        $query = DB::Query("SELECT * FROM berichtenbalk WHERE geaccepteerd = '0' AND radio = '" . DB::Escape($_SESSION['id']) . "'");
                                       
										?>
                                        </div>
                                        <div class="box-body pad">
              <table class="table table-striped">
                                        <tbody><tr>
                                            <th>Naam</th>
											<th>Ares ID</th>
                                            <th>Email</th>
                                            <th>Bericht</th>
                                            <th>Ip-Adres</th>
                                            <th>Acties</th>
                                        </tr>
                                                                                <?php
                                        while($aFetch = DB::Fetch($query)) {
                                                                               
                                        echo '<tr>
                                           <td style="vertical-align:middle">' . htmlentities($aFetch['gastnaam']) . '</td>
										   <td style="vertical-align:middle">' . htmlentities($aFetch['radio']) . '</td>
                                           <td style="vertical-align:middle">' . htmlentities($aFetch['gastemail']) . '</td>
                                           <td style="vertical-align:middle">' . htmlentities($aFetch['bericht']) . '</td>
                                           <td style="vertical-align:middle">' . htmlentities($aFetch['ipadres']) . '</td>
 
                                           <td style="vertical-align:middle">
                                               <a href="berichten.php?update=' . $aFetch['id'] . '"><span class="glyphicon glyphicon-ok"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                                               <a href="berichten.php?delete=' . $aFetch['id'] . '"><span class="glyphicon glyphicon-trash"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
											   <a href="berichten.php?ban=' . $aFetch['ipadres'] . '&delete=' . $aFetch['id'] . '&id=' . $aFetch['radio'] . '"><span class="glyphicon glyphicon-ban-circle"></span></a>
                                           </td>
                                           </tr>';
                                        }
                                        ?>
                                    </tbody></table>
                                                                        </div>
                                                                        <!-- </div> -->
                                                                        </div>
                                                                        </section>
																		
																		<section class="col-md-12 connectedSortable">
                        <div class="box box-primary">
                <div class="box-header">
                                        <h3 class="box-title">Berichten die Geaccepteerd zijn</h3>
                                        <?php
                                        $query = DB::Query("SELECT * FROM berichtenbalk WHERE geaccepteerd = '1' AND radio = '" . DB::Escape($_SESSION['id']) . "'");
										
							
                                        ?>
                                        </div>
                                        <div class="box-body pad">
              <table class="table table-striped">
                                        <tbody><tr>
                                            <th>Naam</th>
											<th>Ares ID</th>
                                            <th>Email</th>
                                            <th>Bericht</th>
                                            <th>Ip-Adres</th>
                                            <th>Acties</th>
                                        </tr>
                                                                                <?php
                                        while($aFetch = DB::Fetch($query)) {
                                                                               
                                        echo '<tr>
                                           <td style="vertical-align:middle">' . htmlentities($aFetch['gastnaam']) . '</td>
										   <td style="vertical-align:middle">' . htmlentities($aFetch['radio']) . '</td>
                                           <td style="vertical-align:middle">' . htmlentities($aFetch['gastemail']) . '</td>
                                           <td style="vertical-align:middle">' . htmlentities($aFetch['bericht']) . '</td>
                                           <td style="vertical-align:middle">' . htmlentities($aFetch['ipadres']) . '</td>
 
                                           <td style="vertical-align:middle">
                                               <a href="berichten.php?delete=' . $aFetch['id'] . '"><span class="glyphicon glyphicon-trash"></span></a>
                                           </td>
                                           </tr>';
                                        }
                                        ?>
                                    </tbody></table>
                                                                        </div>
                                                                        <!-- </div> -->
                                                                        </div>
                                                                        </section>
																		<!-- right col (We are only adding the ID to make the widgets sortable)-->
       
          <!-- Map box -->
         
              <!-- /. tools -->
 
           
            <!-- /.box-body-->
            <!-- /.box -->
 
          <!-- solid sales graph -->
         
          <!-- /.box -->
 
          <!-- Calendar -->
          <!-- /.box -->
 
        <!-- </section> -->
        <!-- right col -->
       </div>
           
      <!-- /.row (main row) -->
 
    </section>
    <!-- /.content -->
  </div>
  <?php
require_once('template/TH4Y/footer.php');
?>