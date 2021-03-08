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
                    echo '<div class="alert alert-success">Uw Account is aangepast</div>';
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
                      <input id="userid" name="userid" type="text" placeholder="Gebruikersnaam" value="<?php if(isset($radio) && trim($radio->username) != '') { echo $radio->username; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="col-md-4 control-label" for="station">Radiostation</label>  
                      <div class="col-md-4">
                      <input id="station" name="station" type="text" placeholder="Radiostation" value="<?php if(isset($radio) && trim($radio->station) != '') { echo $radio->station; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label" for="station1">Adres</label>  
                      <div class="col-md-4">
                      <input id="station1" name="address" type="text" placeholder="Adres" value="<?php if(isset($radio) && trim($radio->address) != '') { echo $radio->address; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label" for="station2">Woonplaats</label>  
                      <div class="col-md-4">
                      <input id="station2" name="city" type="text" placeholder="Woonplaats" value="<?php if(isset($radio) && trim($radio->city) != '') { echo $radio->city; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label" for="station3">Postcode</label>  
                      <div class="col-md-4">
                      <input id="station3" name="postcode" type="text" placeholder="Postcode" value="<?php if(isset($radio) && trim($radio->postcode) != '') { echo $radio->postcode; } ?>" class="form-control input-md">
                        
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
                      <input id="email" name="email" type="text" placeholder="E-mailadres" value="<?php if(isset($radio) && trim($radio->email) != '') { echo $radio->email; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Voornaam</label>  
                      <div class="col-md-4">
                      <input id="firstname" name="firstname" type="text" placeholder="Voornaam" value="<?php if(isset($radio) && trim($radio->firstname) != '') { echo $radio->firstname; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Achternaam</label>  
                      <div class="col-md-4">
                      <input id="lastname" name="lastname" type="text" placeholder="Achternaam" value="<?php if(isset($radio) && trim($radio->firstname) != '') { echo $radio->lastname; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Automatisch verversen</label>  
                      <div class="col-md-4">
                      <select name="refresh" class="form-control input-md">
						<?php
							$refresh = DB::Query("SELECT refresh FROM users WHERE id = " . DB::Escape($_SESSION['id']));
							if(DB::NumRows($refresh) == 1) {
									$fetchrefresh = DB::Fetch($refresh);
							}
						?>
						<option value="<?php echo $fetchrefresh['refresh'] ?>"><?php echo $fetchrefresh['refresh'] ?> seconden</option>
						<option value="180">180 seconden</option>
						<option value="240">240 seconden</option>
						<option value="300">300 seconden</option>
  
  

						</select>
                        
                      </div>
                    </div>
					 <div class="form-group">
                      <label class="col-md-4 control-label" for="picture">Profielfoto<br /><small>Profielfoto mag maximaal 150px bij 150px wezen</small></label>
					  
                      <div class="col-md-4">
                        <input type="file" name="avatar">
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-md-4 control-label" for="picture">Huidige profielfoto</label>
					  
                      <div class="col-md-4">
                        <?php
							if($user->type == 2) {
						$fetch = DB::Fetch(DB::Query("SELECT username, avatar FROM users WHERE id = " . DB::Escape($_SESSION['id']))); 
							}else{
							$fetch = DB::Fetch(DB::Query("SELECT username, avatar FROM users WHERE id = " . DB::Escape($_SESSION['id'])));
							} ?>
						<?php echo '<img src="' . $site_url . '' . $fetch['avatar'] . '" width="150" height="150" />'; ?>
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
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once('template/TH4Y/footer.php'); ?>