<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	
      <h1>
        Aanmaken / Aanpassen Admin's
		</h1>
     </section>

    <!-- Main content -->
	
    <section class="content">
	<?php
	                if(isset($deleted) && $deleted && isset($_GET['delete'])) {
                    echo '<div class="alert alert-success">Het account is verwijderd.</div>';
                    echo '<meta http-equiv="refresh" content="1; url=admins.php" />';
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
              <table class="table table-striped">
                                        <tbody><tr>
                                            <th style="width: 10px">#</th>
                                            <th>Gebruikersnaam</th>
                                            <th>Email</th>
                                            <th>Voornaam</th>
                                            <th>Achternaam</th>
                                            <th>Acties</th>
                                        </tr>
                                        <?php
                                        while($aFetch = DB::Fetch($query)) { 

                                        echo '<tr>
                                            <td>' . htmlentities($aFetch['id']) . '</td>
                                            <td>' . htmlentities($aFetch['username']) . '</td>
                                            <td>' . htmlentities($aFetch['email']) . '</td>
                                            <td>' . htmlentities($aFetch['firstname']) . '</td>
                                            <td>' . htmlentities($aFetch['lastname']) . '</td>
                                            <td>
                                                <a href="editadmin.php?id=' . $aFetch['id'] . '"><span class="glyphicon glyphicon-pencil"></span></a>
                                                <a href="admins.php?delete=' . $aFetch['id'] . '"><span class="glyphicon glyphicon-remove"></span></a>
                                            </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody></table>
                                    <br /><br />
                                    <a href="addadmin.php"><button class="btn btn-primary">Administrator toevoegen</button></a>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once('template/TH4Y/footer.php'); ?>