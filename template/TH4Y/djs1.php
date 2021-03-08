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
                        Dj Beheer
                    </h1>
                </section>
                    
 <section class="content">

                   <?php
            if(isset($deleted) && $deleted && isset($_GET['delete'])) {
                    echo '<div class="alert alert-success">Het account is verwijderd.</div>';
                    echo '<meta http-equiv="refresh" content="1; url=djs.php" />';
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
                                    
                                    <h3 class="box-title">Hier ziet u uw Dj's</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-body pad">
              <table class="table table-striped">
                                        <tbody><tr>
											<th>Profielfoto</th>
                                            <th>Gebruikersnaam</th>
                                            <th>Email</th>
                                            <th>Voornaam</th>
                                            <th>Achternaam</th>
                                            <th>Acties</th>
                                        </tr>
                                        <?php
                                        while($aFetch = DB::Fetch($query)) { 
                                        echo '<tr>
											<td style="vertical-align:middle"><div class="user-panel"><div class="pull-left image"><img src="' . $site_url . '' . htmlentities($aFetch['avatar']) . '" class="img-circle" alt="No Background Selected"/></div></div></td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['username']) . '</td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['email']) . '</td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['firstname']) . '</td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['lastname']) . '</td>

                                            <td style="vertical-align:middle">
                                                <a href="editdj.php?id=' . $aFetch['id'] . '"><span class="glyphicon glyphicon-pencil"></span></a>
                                                <a href="djs.php?delete=' . $aFetch['id'] . '"><span class="glyphicon glyphicon-remove"></span></a>
                                            </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody></table>
                                    <br /><br />
                                    <a href="adddj.php"><button class="btn btn-primary">DJ toevoegen</button></a>
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