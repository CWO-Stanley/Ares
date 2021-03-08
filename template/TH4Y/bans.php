<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	
      <h1>
        IP Ban beheer
        </h1>
     </section>

    <!-- Main content -->
	
    <section class="content">
<?php if($user->type == 3) { ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Hier ziet u uw Bans voor Verzoekjes
                </h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <table class="table table-striped">
                                        <tbody>
                                        	<tr>
	                                            <th style="width: 10px">#</th>
												<th>Station ID</th>
	                                            <th>IP-adres</th>
	                                            <th>Reden</th>
	                                            <th>Geband op</th>
	                                            <th>Acties</th>
                                        	</tr>
                                        	<?php
                                        	$query = DB::Query("SELECT id, radio, ip, reason, banDate FROM ipbans ORDER by banDate DESC");
	                                        while($aFetch = DB::Fetch($query)) { 
	                                        echo '<tr>
	                                            <td>' . $aFetch['id'] . '</td>
												<td>' . $aFetch['radio'] . '</td>
	                                            <td>' . $aFetch['ip'] . '</td>
	                                            <td>' . $aFetch['reason'] . '</td>
	                                            <td>' . $aFetch['banDate'] . '</td>
	                                            <td>
	                                                <a href="bans.php?delete=' . $aFetch['id'] . '"><span class="glyphicon glyphicon-remove"></span></a>
	                                            </td>
	                                            </tr>';
	                                        }
	                                        ?>
                                       </tbody>
                                    </table>
        <!-- /.col-->
      </div>
      <!-- ./row -->
						<?php } ?>
    </section>
    <!-- /.content -->
	
  </div>
  <!-- /.content-wrapper -->