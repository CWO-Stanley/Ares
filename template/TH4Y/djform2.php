<?php if($user->type == 2) { ?>
<?php
							$username = DB::Query("SELECT username, firstname, lastname, email, password, refresh, kick  FROM users WHERE id = " . DB::Escape($_GET['id']));
							if(DB::NumRows($username) == 1) {
									$fetch = DB::Fetch($username);
							}
						?>
<?php }else{ ?>
<?php
							$username = DB::Query("SELECT username, firstname, lastname, email, password, refresh, kick  FROM users WHERE id = " . DB::Escape($_SESSION['id']));
							if(DB::NumRows($username) == 1) {
									$fetch = DB::Fetch($username);
							}
}
						?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	
      
     </section>

    <!-- Main content -->
	
    <section class="content">
	<?php
	 if(isset($error) && $error != '') {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }else if(isset($success)) {
                    echo '<div class="alert alert-success">Uw Account is aangepast</div>'; ?>
					<script>
						var timer = setTimeout(function() {
							window.location='index.php'
						}, 2000);
					</script><?php
                }
	?>
	
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
                </h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form class="form-horizontal" enctype="multipart/form-data" role="form" action="" method="Post">

                   <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="userid">Gebruikersnaam</label>  
                      <div class="col-md-4">
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
					  <?php if($user->type == 2) { ?>
                      <input id="userid" name="userid" type="text" placeholder="Gebruikersnaam" value="<?php echo $fetch['username'] ?>" class="form-control input-md" onkeypress="CheckSpace(event)">
					  <?php }else{ ?>
					  <input id="userid" name="userid" type="text" placeholder="Gebruikersnaam" value="<?php echo $fetch['username'] ?>" class="form-control input-md" onkeypress="CheckSpace(event)">
					  <?php } ?>
                        
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
                      <input id="email" name="email" type="text" placeholder="E-mailadres" value="<?php echo $fetch['email'] ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Voornaam</label>  
                      <div class="col-md-4">
                      <input id="firstname" name="firstname" type="text" placeholder="Voornaam" value="<?php echo $fetch['firstname'] ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Achternaam</label>  
                      <div class="col-md-4">
                      <input id="lastname" name="lastname" type="text" placeholder="Achternaam" value="<?php echo $fetch['lastname'] ?>" class="form-control input-md">
                        
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Automatisch verversen</label>  
                      <div class="col-md-4">
                      <select name="refresh" class="form-control input-md">
						
						<option value="<?php echo $fetch['refresh'] ?>"><?php echo $fetch['refresh'] ?> seconden</option>
						<option value="180">180 seconden</option>
						<option value="240">240 seconden</option>
						<option value="300">300 seconden</option>
  
  

						</select>
                        
                      </div>
                    </div>
					
					<?php if($user->type == 2) { ?>
					 <div class="form-group">
                      <label class="col-md-4 control-label" for="picture">Profielfoto<br /><small>Profielfoto mag maximaal 150px bij 150px wezen</small></label>
					  
                      <div class="col-md-4">
                        <input type="file" name="avatar">
						</div>
                    </div>
					<div class="form-group">
                      <label class="col-md-4 control-label" for="picture">Huidige Profielfoto</label>
						<?php 
						$fetch = DB::Fetch(DB::Query("SELECT username, avatar FROM users WHERE id = " . DB::Escape($_GET['id']))); 
						?>
							<div class="col-md-4">	
								<?php echo '<img src="' . $site_url . '' . $fetch['avatar'] . '" width="150" height="150" />'; ?>
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">DJ kan profielfoto veranderen</label>  
                      <div class="col-md-4">
                      <select name="canchange" class="form-control input-md">
						<?php $query = DB::Query("SELECT canchange FROM users WHERE id = " . DB::Escape($_GET['id'])); 
						$fetch = DB::Fetch($query);
					
					?>
						<option value="<?php echo $fetch['canchange'] ?>"><?php echo $fetch['canchange'] ?></option>
						<option value="Ja">Ja</option>
						<option value="Nee">Nee</option>
						
  
  

						</select>
                        
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Mag kicken</label>  
                      <div class="col-md-4">
                      <select name="kick" class="form-control input-md">
						
						<option value="<?php echo $fetch['kick'] ?>"><?php echo $fetch['kick'] ?></option>
						<option value="Ja">Ja</option>
						<option value="Nee">Nee</option>
  
  

						</select>
                        
                      </div>
                    </div>
					<?php } ?>
					<?php if($user->type == 1) { ?>
					<?php 
						$query = DB::Query("SELECT canchange FROM users WHERE id = " . DB::Escape($_SESSION['id'])); 
							if(DB::NumRows($query) == 1) {
							$fetch = DB::Fetch($query);
							$canchange = $fetch['canchange'];
							}
							
					?>
					 <div class="form-group">
                      <label class="col-md-4 control-label" for="picture">Profielfoto<br /><small>Profielfoto mag maximaal 150px bij 150px wezen</small></label>
					  
                      <div class="col-md-4">
					  <?php
					  if($canchange == 'Nee') { ?>
                        <textarea readonly="readonly" unselectable="on" disabled="disabled">U heeft geen rechten dit aan te passen</textarea>
					  <?php }else{ ?>
						<input type="file" name="avatar">
					  <?php } ?>
					  
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-md-4 control-label" for="picture">Huidige Profielfoto</label>
						<?php $fetch2 = DB::Fetch(DB::Query("SELECT username, avatar FROM users WHERE id = " . DB::Escape($_SESSION['id']))); ?>
							<div class="col-md-4">	
								<?php echo '<img src="' . $site_url . '' . $fetch2['avatar'] . '" width="150" height="150" />'; ?>
                      </div>
                    </div>
					<?php } ?>
                   <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for=""></label>
                      <div class="col-md-4">
                        <button id="" name="" class="btn btn-primary">Opslaan</button>
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
<?php require_once('template/TH4Y/footer.php'); ?>