<?php
/**
 * liverequest systeem
 * @author Prelution
 */

// require_once('includes/bootstrap.inc.php');
// require_once('template/TH4Y/header.php');


?>

<script src="jscolor.js"></script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<h1>
        Voorbeeld:
        </h1>
	<?php if(isset($playerInfo) && trim($playerInfo['radio']) != '') {
							echo "<iframe src='https://chattersworld.nl/ares/player.php?id=" . htmlentities($playerInfo['radio']) . "' frameBorder='0' height='61' width='100%' scrolling='no'></iframe>";
					} ?>
      <h1>
        Player instellingen:
        </h1>
     </section>

    <!-- Main content -->
	
    <section class="content">
	<?php
	if(isset($success) && $success) {
                    echo '<div class="alert alert-success">Uw stream instellingen zijn bijgewerkt.</div>';
                    echo '<meta http-equiv="refresh" content="1" />';
                }
		?>
		<?php
		if(isset($deleted) && $deleted && isset($_GET['delete'])) {
                    echo '<div class="alert alert-success">Uw player is verwijderd.</div>';
                    echo '<meta http-equiv="refresh" content="1" />';
                }
		?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Vul hier uw player Gegevens in
                </h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form class="form-horizontal" role="form" action="" method="Post">

                     <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Radio Naam:</label>  
                      <div class="col-md-4">
                      <input id="streamgegevens" name="radionaam" type="text" placeholder="Radio Naam" value="<?php if(isset($playerInfo) && trim($playerInfo['radionaam']) != '') { echo htmlentities($playerInfo['radionaam']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>
					
					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Stream IP / Hostname:<br /><small>Zonder http://</small></label>  
                      <div class="col-md-4">
                      <input id="streamgegevens" name="streamgegevens" type="text" placeholder="IP / Hostname" value="<?php if(isset($playerInfo) && trim($playerInfo['streamgegevens']) != '') { echo htmlentities($playerInfo['streamgegevens']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Stream Poort:<br /><small>Bij icecast graag de mountpoint achter de poort zetten. 8000/stream</small></label>  
                      <div class="col-md-4">
                      <input id="port" name="port" type="text" placeholder="Poort" value="<?php if(isset($playerInfo) && trim($playerInfo['port']) != '') { echo htmlentities($playerInfo['port']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>
					
					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Theme Color: *</label>  
                      <div class="col-md-4">
						<input class="jscolor {width:243, height:150, position:'right',
    borderColor:'#FFF', insetColor:'#FFF', backgroundColor:'#666'}" name="themecolor" type="text" placeholder="Theme Color" value="<?php if(isset($playerInfo) && trim($playerInfo['themecolor']) != '') { echo htmlentities($playerInfo['themecolor']); } ?>" class="form-control input-md">
					 </div>
                    </div>
					
					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Theme Font Color: *</label>  
                      <div class="col-md-4">
						<input class="jscolor {width:243, height:150, position:'right',
    borderColor:'#FFF', insetColor:'#FFF', backgroundColor:'#666'}" name="themefontcolor" type="text" placeholder="Theme Font Color" value="<?php if(isset($playerInfo) && trim($playerInfo['themefontcolor']) != '') { echo htmlentities($playerInfo['themefontcolor']); } ?>" class="form-control input-md">
					 </div>
                    </div>
					
					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">autoplay<br><small>graag alleen true of false invoeren</small></label>  
                      <div class="col-md-4">
                        <select name="autoplay" class="form-control input-md">
						<?php 
					  $autoplay = trim($playerInfo['autoplay']);
					  if($autoplay == 'true') { $autoplay = 'aan'; }else{ $autoplay = 'uit'; };
					  ?>
						<option value="<?php if(isset($playerInfo) && trim($playerInfo['autoplay']) != '') { echo htmlentities($playerInfo['autoplay']); } ?>"><?php if(isset($playerInfo) && trim($playerInfo['autoplay']) != '') { echo $autoplay; } ?></option>
						<option value="true">aan</option>
						<option value="false">uit</option>
						</select>
						  
                      </div>
                    </div>
					
					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Streamtype<br><small>graag Shoutcast 1/2 of RadioNomy</small></label>  
                      <div class="col-md-4">
                      <!-- <input id="streamtype" name="streamtype" type="text" placeholder="shoutcast2" value="<?php if(isset($playerInfo) && trim($playerInfo['streamtype']) != '') { echo htmlentities($playerInfo['streamtype']); } ?>" class="form-control input-md"> -->
                      <select name="streamtype" class="form-control input-md">
						<option value="<?php if(isset($playerInfo) && trim($playerInfo['streamtype']) != '') { echo htmlentities($playerInfo['streamtype']); } ?>"><?php if(isset($playerInfo) && trim($playerInfo['streamtype']) != '') { echo htmlentities($playerInfo['streamtype']); } ?></option>
						<option value="shoutcast1">shoutcast1</option>
						<option value="icecast2">icecast2</option>
						<option value="radionomy">radionomy</option>
						</select>  
                      </div>
                    </div>
					
					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Start Volume</label>  
                      <div class="col-md-4">
                      <input id="startvolume" name="startvolume" type="text" placeholder="startvolume" value="<?php if(isset($playerInfo) && trim($playerInfo['startvolume']) != '') { echo htmlentities($playerInfo['startvolume']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>

 					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">RadioNomy Radiouid<br><small>alleen voor een RadioNomy stream</small></label>  
                      <div class="col-md-4">
                      <input id="radiouid" name="radiouid" type="text" placeholder="radiouid" value="<?php if(isset($playerInfo) && trim($playerInfo['radiouid']) != '') { echo htmlentities($playerInfo['radiouid']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>
					
					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">RadioNomy ApiKey<br><small>alleen voor een RadioNomy stream</small></label>  
                      <div class="col-md-4">
                      <input id="apikey" name="apikey" type="text" placeholder="apikey" value="<?php if(isset($playerInfo) && trim($playerInfo['apikey']) != '') { echo htmlentities($playerInfo['apikey']); } ?>" class="form-control input-md">
                        
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
	<section class="content">
	<div class="box box-primary">
                                <div class="box-header">
                                    
                                    <h3 class="box-title">Uw player</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
						        
                                    <table class="table table-striped">
                                        <tbody><tr>
                                            <th style="width: 10px">Ares ID</th>
                                            <th>Radio</th>
											<th>Acties</th>
                                        </tr>
										<?php
										if($user->type == 2) {
											$querychat = DB::Query("SELECT id, radio, radionaam, themecolor, themefontcolor, autoplay, streamtype, streampath, startvolume, streamgegevens, port, radiouid, apikey FROM player_settings WHERE radio = '" . DB::Escape($_SESSION['id']) . "'");
										}else{
											$querychat = DB::Query("SELECT id, radio, radionaam, themecolor, themefontcolor, autoplay, streamtype, streampath, startvolume, streamgegevens, port, radiouid, apikey FROM player_settings WHERE radio = '" . DB::Escape($_GET['id']) . "'");
										}
											
										?>
                                        <?php
                                        while($aFetch = DB::Fetch($querychat)) { 
                                        echo '<tr>
											<td>' . htmlentities($aFetch['radio']) . '</td>
                                            <td>' . htmlentities($aFetch['radionaam']) . '</td>
                                            

                                            <td>
                                                <a href="playersettings.php?delete=' . $aFetch['radio'] . '" title="Verwijder ' . htmlentities($aFetch['radionaam']) . '"><span class="glyphicon glyphicon-remove"></span></a>
												<a href="player.php?id=' . $aFetch['radio'] . '" title="bekijk ' . htmlentities($aFetch['radionaam']) . '" target="_blank"><span class="glyphicon glyphicon-eye-open"></span></a>
												
                                                
                                            </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody></table>
                                        
                                        <br /><br />
										</div><!-- /.box-body -->
                            </div>
							</section>
  </div>
  <!-- /.content-wrapper -->
<?php require_once('template/TH4Y/footer.php'); ?>