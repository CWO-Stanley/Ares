                            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Administrators
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <?php
                if(isset($success) && $success) {
                    echo '<div class="alert alert-success">Uw account is bijgewerkt.</div>';
                }

                ?>
                <form class="form-horizontal" role="form" action="" method="Post">

                   <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="userid">Gebruikersnaam</label>  
                      <div class="col-md-4">
                      <input id="userid" name="userid" type="text" placeholder="Gebruikersnaam" value="<?php if(isset($admin) && trim($admin->username) != '') { echo $admin->username; } ?>" class="form-control input-md">
                        
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
                      <input id="email" name="email" type="text" placeholder="E-mailadres" value="<?php if(isset($admin) && trim($admin->email) != '') { echo $admin->email; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Voornaam</label>  
                      <div class="col-md-4">
                      <input id="firstname" name="firstname" type="text" placeholder="Voornaam" value="<?php if(isset($admin) && trim($admin->firstname) != '') { echo $admin->firstname; } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Achternaam</label>  
                      <div class="col-md-4">
                      <input id="lastname" name="lastname" type="text" placeholder="Achternaam" value="<?php if(isset($admin) && trim($admin->firstname) != '') { echo $admin->lastname; } ?>" class="form-control input-md">
                        
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
                </section><!-- /.content -->
            </aside><!-- /.right-side -->