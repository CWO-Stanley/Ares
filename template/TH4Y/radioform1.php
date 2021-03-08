                            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Radio's
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <?php
                if(isset($error) && $error != '') {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }else if(isset($success)) {
                    echo '<div class="alert alert-success">Uw account is bijgewerkt.</div>';
                }

                ?>
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
                      <label class="col-md-4 control-label" for="picture">Profielfoto</label>
                      <div class="col-md-4">
                        <input type="file" name="avatar">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label" for="nonstop">Nonstop plaatje</label>
                      <div class="col-md-4">
                        <input type="file" name="nonstop">
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