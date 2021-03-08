<META HTTP-EQUIV="refresh" CONTENT="180">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php
                if($user->type == 2) {
                    $radioId = $_SESSION['id'];
                }else{
                    $radioId = $user->radio;
					
                }
                ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
                        Dashboard
                    </h1>
                </section>
                    
 <section class="content">

                   <?php
                if(isset($success) && $success) {
                    echo '<div class="alert alert-success">Uw NonStop instellingen zijn bijgewerkt.</div>';
                    echo '<meta https-equiv="refresh" content="1; url=index.php" />';
                }

                ?>
      <!-- Main row -->
      <div class="row">
                        <!-- Left col -->
                        <section class="col-md-12 connectedSortable">                            
                        <?php if($user->type == 1 || $user->type == 2) { ?>
                        <?php
                        if($user->type == 1) {
                            $radio = $user->radio;
                        }elseif($user->type == 2){
                            $radio = $_SESSION['id'];
                        }

                        ?>
                            <div class="box box-primary">
                                <div class="box-header">
                                    
                                    <h3 class="box-title">Uw Gewenste Non-Stop Plaatje:</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    
									<form class="form-horizontal" method="POST" action="upload.php" enctype="multipart/form-data">

                    <!-- Text input-->
                    <div class="form-group">
                      	<label class="col-md-4 control-label" for="file"> Kies uw Nonstop plaatje :  </label>
                      <div class="col-md-4">
                      
                      
					  <input type="file" name ="file">
                      </div>
                    </div>
	

                    <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for=""></label>
                      <div class="col-md-4">
                        
						<input type="submit" class="btn btn-primary" value = "Opslaan">
                      </div>
                    </div>
                    </form>
					
		
					<br>
					<center><h4>Uw huidige Nonstop Plaatje</h4><center><br>
					<? $fetch = DB::Fetch(DB::Query("SELECT username, nonstopavatar FROM users WHERE type = 2 AND id = " . DB::Escape($_SESSION['id']))); ?>
								
								<center><?php echo '<center><img src="' . $site_url . 'avatars' . $fetch['nonstopavatar'] . '" width="150" height="150" />'; ?></center>
								<br>
								<br>
								<center></center>
                              
                                        <br /><br />
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
							</section>
							<section class="col-md-12 connectedSortable">
							<!-- /.box -->
							<div class="box box-primary">
                                <div class="box-header">
                                    
                                    <h3 class="box-title">Overige Nonstop instellingen:</h3><br>
									<small>Uw Non-Stop text:</small>
                                </div><!-- /.box-header -->
                                <div class="box-body">
								
                                    <form class="form-horizontal" action="" method="POST">
									<div class="form-group">
									<label class="col-md-4 control-label" for="file"> Uw Nonstop text :  </label>
					<div class="col-md-4">
					<textarea style="width: 800px; height: 300px; resize: none;" name="Non-StopVerzoek"> <?php if(isset($streamInfo) && trim($streamInfo['nonstopverzoek']) != '') { echo htmlentities($streamInfo['nonstopverzoek']); } ?></textarea>
					</div>
					</div>
					<div class="form-group">
					<label class="col-md-4 control-label" for=""></label>
					<div class="col-md-4">
					<input type="submit" class="btn btn-primary" value="Indienen" />
					</div>
					</div>
				
		</form>
					<br>
					
                                        <br /><br />
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
							
							<!-- /.box -->
                            <?php } ?>
                        </section><!-- /.Left col -->
						
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
          <!-- Map box -->
         
              <!-- /. tools -->

            
            <!-- /.box-body-->
            <!-- /.box -->

          <!-- solid sales graph -->
          
          <!-- /.box -->

          <!-- Calendar -->
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>