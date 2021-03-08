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
                        Aanmaken / Aanpassen DJ's
                    </h1>
                </section>
                    
 <section class="content">

                   <?php
				   if(isset($error) && $error != '') {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                if(isset($success) && $success) {
                    echo '<div class="alert alert-success">Uw DJ is aangemaakt.</div>';
                    echo '<meta https-equiv="refresh" content="1; url=index.php" />';
                }

                ?>
      <!-- Main row -->
      <div class="row">
                        <!-- Left col -->
                        <section class="col-md-12 connectedSortable">                            
                        
                           <form class="form-horizontal" enctype="multipart/form-data"  role="form" action="" method="Post">

                   <!-- Text input-->
                    <div class="form-group">
					<script type="text/javascript">

				function CheckSpace(event)
				{
					if(event.which ==32)
					{
						event.preventDefault();
						return false;
					}
				}
				</script>
                      <label class="col-md-4 control-label" for="userid">Gebruikersnaam</label>  
                      <div class="col-md-4">
                      <input id="userid" name="userid" type="text" placeholder="Gebruikersnaam" value="<?php if(isset($dj) && trim($dj->username) != '') { echo $dj->username; } ?>" class="form-control input-md" onkeypress="CheckSpace(event)">
                        
                      </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="password">Wachtwoord</label>
                      <div class="col-md-4">
                        <input id="password" name="password" type="password" placeholder="Wachtwoord" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="password2">Wachtwoord herhalen</label>
                      <div class="col-md-4">
                        <input id="password2" name="password2" type="password" placeholder="Wachtwoord herhalen" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="email">E-mailadres</label>  
                      <div class="col-md-4">
                      <input id="email" name="email" type="text" placeholder="E-mailadres" value="<?php if(isset($dj) && trim($dj->email) != '') { echo $dj->email; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Voornaam</label>  
                      <div class="col-md-4">
                      <input id="firstname" name="firstname" type="text" placeholder="Voornaam" value="<?php if(isset($dj) && trim($dj->firstname) != '') { echo $dj->firstname; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Achternaam</label>  
                      <div class="col-md-4">
                      <input id="lastname" name="lastname" type="text" placeholder="Achternaam" value="<?php if(isset($dj) && trim($dj->firstname) != '') { echo $dj->lastname; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label" for="picture">Profielfoto</label>
                      <div class="col-md-4">
                        <input type="file" name="avatar">
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