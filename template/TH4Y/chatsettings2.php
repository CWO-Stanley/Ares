<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');
require_once('template/TH4Y/header.php');


?>
<script src="jscolor.js"></script>
		  <script>
    $(document).ready(function() {
        $('input[type="checkbox"]').bootstrapSwitch();
        $('input').tooltip({placement:'auto',animation:true});
        $('label').tooltip({placement:'auto',animation:true});
        $("#myTab a").click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        });
    });
</script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<section class="content-header">
	
	</section>
    
					<div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                       #<?php if(isset($playerInfo) && trim($playerInfo['kanaalnaam']) != '') { echo htmlentities($playerInfo['kanaalnaam']); } ?> 
									</h3>
                                    <p>
									&nbsp;
                                        
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="chat.php?id=<?php echo htmlentities($playerInfo['radio']); ?>" class="small-box-footer">
                                    Kanaalnaam
                                </a>
                            </div>
                        </div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                       <?php if(isset($playerInfo) && trim($playerInfo['visits']) != '') { echo htmlentities($playerInfo['visits']); }else{ echo "0"; } ?> 
                                    </h3>
                                    <p>
									 Bezoekers
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="chat.php?id=<?php echo htmlentities($playerInfo['radio']); ?>" class="small-box-footer">
                                    Bezoekers
                                </a>
                            </div>
                        </div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                       <?php if(isset($playerInfo) && trim($playerInfo['lastused']) != '') { echo htmlentities($playerInfo['lastused']); }else{ echo "Niet"; } ?> 
                                    </h3>
                                    <p>
									 Laatst gebruikt
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="chat.php?id=<?php echo htmlentities($playerInfo['radio']); ?>" class="small-box-footer">
                                    Laatst gebruikt
                                </a>
                            </div>
                        </div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?php
									$db_host = '127.0.0.1';
									$db_user = 'admin_anope';
									$db_pass = '16July1984!@#';
									$db_name = 'admin_anope';
									
									$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
									$channel = "";
									if (!isset($playerInfo['kanaalnaam'])) {
										echo "Geen kanaalnaam opgegeven";
									}
									else {
										$channel = "#".$playerInfo['kanaalnaam'];
									}
									
									$forbiddenchans = array("#opers","#staff","#services","#X","#X.links","#services-channels","#services-quits","#X.invites");
									
									if (in_array($channel, $forbiddenchans)) {
										echo "Kanaal niet toegestaan";
									}
									else {
										$query = 'SELECT COUNT(*) as currentusers FROM anope_chan LEFT JOIN anope_ison ON anope_chan.chanid = anope_ison.chanid WHERE anope_chan.channel = "'.mysqli_escape_string($con,$channel).'";';
										$result = mysqli_query($con,$query);
										$value = mysqli_fetch_object($result);
										
									}
									?>
                                       <?php if(isset($playerInfo) && trim($playerInfo['radio']) != '') { echo $value->currentusers; } ?> 
                                    </h3>
                                    <p>
									 Chatters
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="chat.php?id=<?php echo htmlentities($playerInfo['radio']); ?>" class="small-box-footer">
                                     Chat ID: <?php if(isset($playerInfo) && trim($playerInfo['radio']) != '') { echo htmlentities($playerInfo['radio']); }else{ echo "Niet"; } ?>
                                </a>
                            </div>
                        </div><!-- ./col -->
						<!-- ./col -->
					</div>
					<section class="content-header">
					<h1>
        Voorbeeld:
        </h1>
	<?php if(isset($playerInfo) && trim($playerInfo['radio']) != '') {
							echo "<iframe src='https://chattersworld.nl/ares/chat.php?id=" . htmlentities($playerInfo['radio']) . "' frameBorder='0' height='500' width='100%' scrolling='no'></iframe>";
					} ?>
      <h1>
        
        </h1>
     </section>
    <!-- Main content -->
	
    <section class="content">
	<?php
	if(isset($success) && $success) {
                    echo '<div class="alert alert-success">Uw chatbox instellingen zijn bijgewerkt.</div>';
                    echo '<meta http-equiv="refresh" content="1">';
                }
				?>
				<?php
		if(isset($deleted) && $deleted && isset($_GET['delete'])) {
                    echo '<div class="alert alert-success">Uw chatbox is verwijderd.</div>';
                    echo '<meta http-equiv="refresh" content="1" />';
                }
		?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
			  Maak of verander hier je chatbox
                </h3>
				 
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
			<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
			<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#red" data-toggle="tab">Red</a></li>
        <li><a href="#orange" data-toggle="tab">Orange</a></li>
        <li><a href="#yellow" data-toggle="tab">Yellow</a></li>
        <li><a href="#green" data-toggle="tab">Green</a></li>
        <li><a href="#blue" data-toggle="tab">Blue</a></li>
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="red">
            <h1>Red</h1>
            <p>red red red red red red</p>
            <button>Blue</button>
        </div>
        <div class="tab-pane" id="orange">
            <h1>Orange</h1>
            <p>orange orange orange orange orange</p>
            <button>Blue</button>
        </div>
        <div class="tab-pane" id="yellow">
            <h1>Yellow</h1>
            <p>yellow yellow yellow yellow yellow</p>
            <button>Blue</button>
        </div>
        <div class="tab-pane" id="green">
            <h1>Green</h1>
            <p>green green green green green</p>
            <button>Blue</button>
        </div>
        <div class="tab-pane" id="blue">
            <h1>Blue</h1>
            <p>blue blue blue blue blue</p>
            <button>Blue</button>
        </div>
    </div>
	<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#tabs').tab();
    });
    $('button').addClass('btn-primary').text('Switch to Orange Tab');
    $('button').click(function(){
      $('#tabs a[href=#orange]').tab('show');
    });
</script> 
              <form class="form-horizontal" role="form" action="" method="Post">
			  <script type="text/javascript">

				function CheckSpace(event)
				{
					if(event.which ==32)
					{
						event.preventDefault();
						return false;
					}
				}
				</script>

                     <!-- Text input-->
					 <!-- Algemeen tab -->
					 <div id="algemeen" class="tab-pane fade active in">
					 <div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Kanaalnaam:<br /><small><font color="red">Kanaalnaam mag geen spatie bevatten!!</font></label>  
                      <div class="col-md-4">
                      <input id="chatgegevens" name="kanaalnaam" type="text" placeholder="Radio Naam" value="<?php if(isset($playerInfo) && trim($playerInfo['kanaalnaam']) != '') { echo htmlentities($playerInfo['kanaalnaam']); } ?>" class="form-control input-md" onkeypress="CheckSpace(event)">
                        
                      </div>
                    </div>
					</div>
					<!-- Styling tab -->
					<div id="design" class="tab-pane fade">
					<div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Achtergrond URL:</label>  
                      <div class="col-md-4">
                      <input id="streamgegevens" name="bgurl" type="text" placeholder="Plaats hier de url voor uw achtergrond" value="<?php if(isset($playerInfo) && trim($playerInfo['bgurl']) != '') { echo htmlentities($playerInfo['bgurl']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Icoontjes:</label>  
                      <div class="col-md-4">
                      <select name="icons" class="form-control input-md">
						<option value="<?php if(isset($playerInfo) && trim($playerInfo['icons']) != '') { echo htmlentities($playerInfo['icons']); } ?>"><?php if(isset($playerInfo) && trim($playerInfo['icons']) != '') { echo htmlentities($playerInfo['icons']); } ?></option>
						<option value="bolletjes">Bolletjes</option>
						<option value="ster">Ster</option>
						<option value="whatsapp">Whatsapp</option>
						<option value="kroon">Kroontjes</option>
						<option value="dj">DJ</option>
						</select>
                        
                      </div>
                    </div>
					</div>
					<!-- Functies tab -->
					<div id="webcam" class="tab-pane fade">
					<div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Microfoon inschakelen:</label>  
                      <div class="col-md-4">
                      <select name="mic" class="form-control input-md">
					  <?php 
					  $mic = trim($playerInfo['mic']);
					  if($mic == 'true') { $mic = 'aan'; }else{ $mic = 'uit'; };
					  ?>
						<option value="<?php if(isset($playerInfo) && trim($playerInfo['mic']) != '') { echo htmlentities($playerInfo['mic']); } ?>"><?php if(isset($playerInfo) && trim($playerInfo['mic']) != '') { echo $mic; } ?></option>
						<option value="true">aan</option>
						<option value="false">uit</option>
						</select>
                        
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Webcam op prive kunnen zetten:</label>  
                      <div class="col-md-4">
                      <select name="webcam" class="form-control input-md">
					  <?php 
					  $camprivate = trim($playerInfo['webcam']);
					  if($camprivate == 'true') { $camprivate = 'aan'; }else{ $camprivate = 'uit'; };
					  ?>
						<option value="<?php if(isset($playerInfo) && trim($playerInfo['webcam']) != '') { echo htmlentities($playerInfo['webcam']); } ?>"><?php if(isset($playerInfo) && trim($playerInfo['webcam']) != '') { echo $camprivate; } ?></option>
						<option value="true">aan</option>
						<option value="false">uit</option>
						</select>
                        
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Privegesprekken inschakelen:</label>  
                      <div class="col-md-4">
                      <select name="prive" class="form-control input-md">
					  <?php 
					  $private = trim($playerInfo['prive']);
					  if($private == 'true') { $private = 'uit'; }else{ $private = 'aan'; };
					  ?>
						<option value="<?php if(isset($playerInfo) && trim($playerInfo['prive']) != '') { echo htmlentities($playerInfo['prive']); } ?>"><?php if(isset($playerInfo) && trim($playerInfo['prive']) != '') { echo $private; } ?></option>
						<option value="">aan</option>
						<option value="true">uit</option>
						</select>
                        
                      </div>
                    </div>
					</div>
					<!-- Radio Tab -->
					<div id="geavanceerd" class="tab-pane fade">
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Radio Naam:</label>  
                      <div class="col-md-4">
                      <input id="streamgegevens" name="radionaam" type="text" placeholder="Radio Naam" value="<?php if(isset($playerInfo) && trim($playerInfo['radionaam']) != '') { echo htmlentities($playerInfo['radionaam']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>
					
					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Stream IP / Hostname:<br /><small><font color="red">Zonder http://</font></small></label>  
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
					</div>
                    <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for=""></label>
                      <div class="col-md-4">
                        <button id="" name="" class="btn btn-primary">Opslaan</button>
                      </div>
                    </div>
                    </form>
					<div class="form-group">
                      <label class="col-md-4 control-label" for="">Kijk voor de functies en registratie van de chatbox op: <a href="https://wiki.chattersworld,nl/" target="_blank">Chattersworld Wiki</a></label>
                      
                    </div>
					
        <!-- /.col-->
      </div>
	      <!-- ./row -->
    </section>
	<section class="content">
	<div class="box box-primary">
                                <div class="box-header">
                                    
                                    <h3 class="box-title">Uw chatboxen</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
						        
                                    <table class="table table-striped">
                                        <tbody><tr>
                                            <th style="width: 10px">Ares ID</th>
                                            <th>Radio</th>
											<th>Kanaalnaam</th>
											<th>Bezoekers</th>
											<th>Laatst gebruikt</th>
                                            <th>Acties</th>
                                        </tr>
										<?php
										if($user->type == 2) {
										$querychat = DB::Query("SELECT id, radio, radionaam, themecolor, themefontcolor, autoplay, streamtype, streampath, startvolume, streamgegevens, port, radiouid, apikey, kanaalnaam, visits, lastused, bgurl, icons, mic, webcam, prive   FROM chat_settings WHERE radio = '" . DB::Escape($_SESSION['id']) . "'");
										}else{
											$querychat = DB::Query("SELECT id, radio, radionaam, themecolor, themefontcolor, autoplay, streamtype, streampath, startvolume, streamgegevens, port, radiouid, apikey, kanaalnaam, visits, lastused, bgurl, icons, mic, webcam, prive   FROM chat_settings WHERE radio = '" . DB::Escape($_GET['id']) . "'");
										}
										?>
                                        <?php
                                        while($aFetch = DB::Fetch($querychat)) { 
										setlocale(LC_TIME, "nl_NL");
                                        echo '<tr>
											<td>' . htmlentities($aFetch['radio']) . '</td>
                                            <td>' . htmlentities($aFetch['radionaam']) . '</td>
                                            <td>' . htmlentities($aFetch['kanaalnaam']) . '</td>
											<td>' . htmlentities($aFetch['visits']) . '</td>
											<td>' . strftime("%A %d %B %Y om %H:%M:%S", strtotime($aFetch['lastused'])) . '</td>

                                            <td>
                                                <a href="chatsettings.php?delete=' . $aFetch['radio'] . '" title="Verwijder ' . htmlentities($aFetch['kanaalnaam']) . '"><span class="glyphicon glyphicon-remove"></span></a>
												
                                                
                                            </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody></table>
                                        
                                        <br /><br />
										</div><!-- /.box-body -->
                            </div>
							</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once('template/TH4Y/footer.php'); ?>