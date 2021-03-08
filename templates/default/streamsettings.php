                            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Stream instellingen
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <?php
                if(isset($success) && $success) {
                    echo '<div class="alert alert-success">Uw stream instellingen zijn bijgewerkt.</div>';
                    echo '<meta http-equiv="refresh" content="1; url=index.php" />';
                }

                ?>
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