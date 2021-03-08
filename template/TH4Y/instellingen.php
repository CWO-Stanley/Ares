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
                        Instellingen voor het VerzoekSystem
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
						
						<table width="100%">
						<tr>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  </tr>
			  <tr>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  </tr>
						<tr>
			  <td width="15%"><center><a href="djs.php"><img src="dist/img/instellingen/djbeheer.png" height="50px" width=""50px"></a></center></td>
			  <td width="15%"><center><a href="streamsettings.php"><img src="dist/img/instellingen/streaminstellingen.png" height="50px" width=""50px"></a></center></td>
			  <td width="15%"><center><a href="embedcode.php"><img src="dist/img/instellingen/insluitcodes.png" height="50px" width=""50px"></a></center></td>
			  <td width="15%"><center><a href="nonstopsettings.php"><img src="dist/img/instellingen/nonstop.png" height="50px" width=""50px"></a></center></td>
			  <td width="15%"><center><a href="playersettings.php"><img src="dist/img/instellingen/playerinstellingen.png" height="50px" width=""50px"></a></center></td>
			  <td width="15%"><center><a href="https://horus.chattersworld.nl/" target="_blank"><img src="dist/img/instellingen/chatbox.png" height="50px" width=""50px"></a></center></td>
			  </tr>
			  <tr>
			  <td width="15%" ><center><a href="djs.php">Dj Beheer</a></center></td>
			  <td width="15%" ><center><a href="streamsettings.php">Stream Instellingen</a></center></td>
			  <td width="15%" ><center><a href="embedcode.php">Insluit Codes</a></center></td>
			  <td width="15%"><center><a href="nonstopsettings.php">Non-stop Instellingen</a></center></td>
			  <td width="15%" ><center><a href="playersettings.php">Player Instellingen</a></center></td>
			  <td width="15%" ><center><a href="https://horus.chattersworld.nl/" target="_blank">Chat Box</a></center></td>
			  </tr>
			  <tr>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  </tr>
			  <tr>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  </tr>
			  <tr>
			  <td width="15%"><center><a href="editberichtenbalk.php"><img src="dist/img/instellingen/berichtenbalk.png" height="50px" width=""50px"></a></center></td>
			  <td width="15%"><center></center></td>
			  <td width="15%"><center></center></td>
			  </tr>
			  <tr>
			  <td width="15%" ><center><a href="editberichtenbalk.php">berichtenbalk</a></center></td>
			  <td width="15%" ><center></center></td>
			  <td width="15%" ><center></center></td>
			  </tr>
			  
			   </table>
          
							
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