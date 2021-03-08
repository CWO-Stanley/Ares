<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <?php
                if(isset($success) && $success) {
                    echo '<div class="alert alert-success">Uw NonStop instellingen zijn bijgewerkt.</div>';
                    echo '<meta https-equiv="refresh" content="1; url=index.php" />';
                }

                ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
	
      <h1>
        Non-Stop Instellingen
        </h1>
     </section>

    <!-- Main content -->
	
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
                </h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <?php
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$insertQuery = DB::Query("INSERT INTO nonstopverzoek (
																radio,
																message
																) VALUES (
																'" . DB::Escape(htmlentities($_GET['id'])) . "',
																NOW(),
																'" . DB::Escape(htmlentities($_POST['message'])) . "'
																);
				");
				
				}
			
		?>
		<form action="" method="POST">
			<table style="margin: 0 auto;">
				<tr>
					<td>Bericht:</td>
					<td>
						<textarea style="width: 100%; height: 150px; resize: none;" name="message"></textarea>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="Indienen" /></td>
				</tr>
			</table>
		</form>
		<?php }?>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->