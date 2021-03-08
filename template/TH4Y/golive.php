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
        Ga Live
        </h1>
     </section>

    <!-- Main content -->
	
    <section class="content">
	<?php
	if(isset($success) && $success) {
                    echo '<div class="alert alert-success">Gelukt! U heeft de verzoekserver op Live gezet.</div>';
                    echo '<meta http-equiv="refresh" content="1; url=index.php" />';
	}
					?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Welke DJ draait er na u?
                </h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
			<form class="form-horizontal" role="form" action="" method="Post">
								<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Kies uw DJ</label>  
                      <div class="col-md-4">
                      <select id="nextdj" name="nextdj" type="nextdj" placeholder="nextdj" value="" class="form-control input-md">
											<option value="Nonstop Muziek">Nonstop Muziek</option><?php
                                        	$query = DB::Query("SELECT id, radio, username FROM users WHERE radio = " . DB::Escape($radio));
	                                        while($aFetch = DB::Fetch($query)) { 
	                                        echo '<option value="' . $aFetch['username'] . '">' . $aFetch['username'] . '</option>
	                                            ';
	                                        }
	                                        ?></select>
                        
                      </div>
                    </div>
              <!-- <select id="nextdj" name="nextdj" class="form-control input-md">
                                        	<?php
                                        	$query = DB::Query("SELECT id, radio, username FROM users WHERE radio = " . DB::Escape($radio));
	                                        while($aFetch = DB::Fetch($query)) { 
	                                        echo '<option value="' . $aFetch['id'] . '">' . $aFetch['username'] . '</option>
	                                            ';
	                                        }
	                                        ?></select> -->
											<div class="form-group">
                      <label class="col-md-4 control-label" for=""></label>
                      <div class="col-md-4">
                        <button id="" name="" class="btn btn-primary">Ga Live</button>
                      </div>
                    </div>
                    </form>
					
                                       
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
	
  </div>
  <!-- /.content-wrapper -->
<?php
require_once('template/TH4Y/footer.php');
?>