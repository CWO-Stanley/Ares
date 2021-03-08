<script src="jscolor.js"></script>
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
                    echo '<div class="alert alert-success">Uw stream instellingen zijn bijgewerkt.</div>';
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
                                    
                                    <h3 class="box-title">Vul hier uw Stream Gegevens in
                </h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form class="form-horizontal" role="form" action="" method="Post">

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Stream IP / Hostname:</label>  
                      <div class="col-md-4">
                      <input id="firstname" name="ip" type="text" placeholder="IP / Hostname" value="<?php if(isset($streamInfo) && trim($streamInfo['stream']) != '') { echo htmlentities($streamInfo['stream']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Stream Poort:</label>  
                      <div class="col-md-4">
                      <input id="lastname" name="port" type="text" placeholder="Poort" value="<?php if(isset($streamInfo) && trim($streamInfo['port']) != '') { echo htmlentities($streamInfo['port']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>
					
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Admin Wachtwoord:</label>  
                      <div class="col-md-4">
                      <input id="lastname" name="password" type="password" placeholder="password" value="<?php if(isset($streamInfo) && trim($streamInfo['password']) != '') { echo htmlentities($streamInfo['password']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>
					 <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Tekstkleur:</label>  
                      <div class="col-md-4">
                      <input class="jscolor {width:243, height:150, position:'right',
    borderColor:'#FFF', insetColor:'#FFF', backgroundColor:'#666'}" id="lastname" name="text" type="text" placeholder="Poort" value="<?php if(isset($streamInfo) && trim($streamInfo['text']) != '') { echo htmlentities($streamInfo['text']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>
					 <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Achtergrondkleur boven:</label>  
                      <div class="col-md-4">
                      <input class="jscolor {width:243, height:150, position:'right',
    borderColor:'#FFF', insetColor:'#FFF', backgroundColor:'#666'}" id="lastname" name="bg" type="text" placeholder="Poort" value="<?php if(isset($streamInfo) && trim($streamInfo['bg']) != '') { echo htmlentities($streamInfo['bg']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>
					 <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Achtergrondkleur beneden:</label>  
                      <div class="col-md-4">
                      <input class="jscolor {width:243, height:150, position:'right',
    borderColor:'#FFF', insetColor:'#FFF', backgroundColor:'#666'}" id="lastname" name="bg1" type="text" placeholder="Poort" value="<?php if(isset($streamInfo) && trim($streamInfo['bg1']) != '') { echo htmlentities($streamInfo['bg1']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for=""></label>
                      <div class="col-md-4">
                        <button id="" name="" class="btn btn-primary">Opslaan</button>
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