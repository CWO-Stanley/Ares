<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');
require_once('template/TH4Y/header.php');

if($user->type == 1) {
                            $radio = $user->radio;
                        }elseif($user->type == 2){
                            $radio = $_SESSION['id'];
                        }
						$query = DB::Query("SELECT * FROM stream_settings WHERE radio = " . DB::Escape($_SESSION['id']));
						
						
	if(DB::NumRows($query) == 1) {
		$playerInfo = DB::Fetch($query);
	}else{
		$playerInfo = array(
								'id' => '',
								'radio' => '',
								'stream' => '',
								'port' => '',
							);
	}
						
?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	
      <h1>
        Insluitcodes
        </h1>
     </section>

    <!-- Main content -->
	
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Verzoek Formulier
                </h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form>
                    <textarea style="width: 100%; height: 80px;  resize: none; "><iframe src="https://ares.chattersworld.nl/verzoekjes.php?id=<?php echo $radio; ?>" id="Chattersworld" scrolling="auto" frameborder="no" height="600px" width="300px"></iframe></textarea>
              </form>
            </div>
          </div>
          <!-- /.box -->

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Dj Display
                </h3>
             
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form>
                <textarea style="width: 100%; height: 80px;  resize: none; "><iframe src="https://ares.chattersworld.nl/djdisplay.php?id=<?php echo $radio; ?>" id="Chattersworld" scrolling="auto" frameborder="no" height="600px" width="300px"></iframe></textarea>
            </div>
          </div>
		  <?php 
		  $chatbox = DB::Query("SELECT * FROM stream_settings WHERE radio = " . DB::Escape($_SESSION['id']));
		  if(DB::NumRows($chatbox) == 1) {
			  ?>
		  <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Huidig Nummer
                </h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form>
                    <textarea style="width: 100%; height: 80px; resize: none; "><iframe src="https://ares.chattersworld.nl/song.php?id=<?php echo $radio; ?>" id="Chattersworld" scrolling="auto" frameborder="no" height="250px" width="250px"></iframe></textarea>
              </form>
            </div>
          </div>
		  <?php } ?>
		  <?php 
		  $chatbox = DB::Query("SELECT * FROM chat_settings WHERE radio = " . DB::Escape($_SESSION['id']));
		  if(DB::NumRows($chatbox) == 1) {
			  ?>
		  <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Chatbox
                </h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form>
                    <textarea style="width: 100%; height: 80px; resize: none; "><iframe src="https://ares.chattersworld.nl/chat.php?id=<?php echo $radio; ?>" id="Chattersworld" scrolling="auto" frameborder="no" height="758px" width="758px"></iframe></textarea>
					<h3 class="box-title">Klik hier voor de chat in een apart scherm: <a href="https://ares.chattersworld.nl/chat.php?id=<?php echo $radio; ?>" target="_blank" class="btn btn-primary">Chat ID: <?php echo $radio; ?></a></h3>
              </form>
            </div>
          </div>
		  <?php } ?>
		  <?php 
		  $player = DB::Query("SELECT * FROM player_settings WHERE radio = " . DB::Escape($_SESSION['id']));
		  if(DB::NumRows($player) == 1) {
			  ?>
		  <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Player
                </h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
				
              <form>
                    <textarea style="width: 100%; height: 80px; resize: none; "><iframe src="https://ares.chattersworld.nl/player.php?id=<?php echo $radio; ?>" id="Chattersworld" scrolling="auto" frameborder="no" height="80px" width="250px"></iframe></textarea>
              </form>
            </div>
          </div>
		  <?php } ?>
		   <?php 
		  $berichten = DB::Query("SELECT * FROM berichtenbalkkleur WHERE radio = " . DB::Escape($_SESSION['id']));
		  if(DB::NumRows($berichten) == 1) {
			  ?>
		  <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Berichtenbalk
                </h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
				
              <form>
                    <textarea style="width: 100%; height: 80px; resize: none; "><iframe src="https://ares.chattersworld.nl/berichtenbalk.php?id=<?php echo $radio; ?>" id="Chattersworld" scrolling="auto" frameborder="no" height="150px" width="100%"></iframe></textarea>
              </form>
            </div>
          </div>
		  <?php } ?>
        </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once('template/TH4Y/footer.php'); ?>