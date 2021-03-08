<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <?php
             if(isset($error) && $error != '') {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }else if(isset($success)) {
                    echo '<div class="alert alert-success">Uw account is bijgewerkt.</div>';
                }

                ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
	
      <h1>
        Chatboxen
        </h1>
     </section>

    <!-- Main content -->
	
    <section class="content">
	 <?php
                if(isset($delete) && $delete) {
                    echo '<div class="alert alert-succes">Het radiostation / Verzoekserver Zijn verwijderd</div>';
                    echo '<meta https-equiv="refresh" content="1; url=index.php" />';
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
              <iframe src="chattable.php" style="height:1000px;width:100%;border:none;"></iframe>
                                    <br /><br />
                                     <!-- <a href="addradio.php"><button class="btn btn-primary">Radio toevoegen</button> -->
        <!-- /.col-->
      </div>
	  <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->