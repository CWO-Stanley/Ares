<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');
require_once('template/TH4Y/header.php');


	

?>
<?php
 
                if($user->type == 2) {
                    $radioId = $_SESSION['id'];
                }else{
                    $radioId = $user->radio;
                                       
                }
                ?>
				<script src="jscolor.js"></script>
				<!-- Content Wrapper. Contains page content -->
				
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1>
                        Berichtenbalk Instellingen
                    </h1>
					</section>
					<section class="content">
					<?php
					if(isset($_GET['delete']) && is_numeric($_GET['delete'])) {
		DB::Query("DELETE FROM berichtenbalk WHERE id = '" . DB::Escape($_GET['delete']) . "'");
                        	echo '<div class="alert alert-success">Het gewenste bericht is succesvol verwijderd.</div>';
                        }
						if(isset($_GET['update']) && is_numeric($_GET['update'])) {
		DB::Query("UPDATE berichtenbalk set geaccepteerd = 1 WHERE id = '" . DB::Escape($_GET['update']) . "'");
                        	echo '<div class="alert alert-success">Het gewenste bericht is succesvol geaccepteerd.</div>';
                        }
						if(isset($_GET['ban'])) {
		DB::Query("INSERT INTO ipbans (id, radio, ip, banDate) VALUES (NULL, '" . DB::Escape($_SESSION['id']) . "', '" . DB::Escape($_GET['ban']) . "', NOW());");
                        		echo '<div class="alert alert-success">Het gewenste ip adres is succesvol gebant.</div>';
                        }
						if(isset($success) && $success) {
                    echo '<div class="alert alert-success">Uw berichtenbalk instellingen zijn bijgewerkt.</div>';
                    echo '<meta http-equiv="refresh" content="1">';
                }
						
						
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(trim($_POST['themecolor']) == '' || trim($_POST['themefontcolor']) == '' ){

		}else{
			$query = DB::Query("SELECT * FROM berichtenbalkkleur WHERE radio = " . DB::Escape($_SESSION['id']));
			if(DB::NumRows($query) == 1) {
				DB::Query("UPDATE berichtenbalkkleur SET radio = '" . DB::Escape($_SESSION['id']) . "', goedkeuren = '" . DB::Escape($_POST['goedkeuren']) . "', bg = '" . DB::Escape($_POST['themecolor']) . "', naam = '" . DB::Escape($_POST['themefontcolor']) . "', bericht = '" . DB::Escape($_POST['themefontcolortext']) . "', tekst1 = '" . DB::Escape($_POST['tekst1']) . "', tekst2 = '" . DB::Escape($_POST['tekst2']) . "', titlekleur = '" . DB::Escape($_POST['titlekleur']) . "', teksttitle = '" . DB::Escape($_POST['teksttitle']) . "' WHERE radio = '" . DB::Escape($_SESSION['id']) . "'");
				$success = true;
			}else{
			// DB::Query("DELETE FROM player_settings WHERE radio = " . DB::Escape($_SESSION['id']));
			DB::Query("INSERT INTO berichtenbalkkleur (radio, goedkeuren, bg, naam, bericht, tekst1, tekst2, teksttitle, titlekleur ) VALUES 
						('" . DB::Escape($_SESSION['id']) . "',
						 '" . DB::Escape(htmlentities($_POST['goedkeuren'])) . "',
						 '" . DB::Escape(htmlentities($_POST['themecolor'])) . "',
						 '" . DB::Escape(htmlentities($_POST['themefontcolor'])) . "',
						 '" . DB::Escape(htmlentities($_POST['themefontcolortext'])) . "',
						 '" . DB::Escape(htmlentities($_POST['tekst1'])) . "',
						 '" . DB::Escape(htmlentities($_POST['tekst2'])) . "',
						 '" . DB::Escape(htmlentities($_POST['teksttitle'])) . "',
						 '" . DB::Escape(htmlentities($_POST['titlekleur'])) . "'
						 )"
						 );
			
		}
		$success = true;
		}
	}
	
	$query = DB::Query("SELECT *  FROM berichtenbalkkleur WHERE radio = " . DB::Escape($_SESSION['id']));
	if(DB::NumRows($query) == 1) {
		$playerInfo = DB::Fetch($query);
	}else{
		$playerInfo = array(
								'id' => '',
								'radio' => '',
								'goedkeuren' => '',
								'bg' => '',
								'naam' => '',
								'bericht' => '',
								'tekst1' => '',
								'tekst2' => '',
																
							);
	}
	
	
					?>
                
				<br>


<section class="col-md-12 connectedSortable">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Berichtenbalk Kleur Instellingen
                </h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form class="form-horizontal" role="form" action="" method="Post">

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Achtergrond kleur: *</label>  
                      <div class="col-md-4">
						<input class="jscolor {width:243, height:150, position:'right',
    borderColor:'#FFF', insetColor:'#FFF', backgroundColor:'#666'}" name="themecolor" type="text" placeholder="Achtergrond Kleur" value="<?php if(isset($playerInfo) && trim($playerInfo['bg']) != '') { echo htmlentities($playerInfo['bg']); } ?>" class="form-control input-md">
					 </div>
                    </div>
					
					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Tekst Kleur Naam: *</label>  
                      <div class="col-md-4">
						<input class="jscolor {width:243, height:150, position:'right',
    borderColor:'#FFF', insetColor:'#FFF', backgroundColor:'#666'}" name="themefontcolor" type="text" placeholder="Tekst Kleur" value="<?php if(isset($playerInfo) && trim($playerInfo['naam']) != '') { echo htmlentities($playerInfo['naam']); } ?>" class="form-control input-md">
					 </div>
                    </div>
					
					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Tekst Kleur Bericht: *</label>  
                      <div class="col-md-4">
						<input class="jscolor {width:243, height:150, position:'right',
    borderColor:'#FFF', insetColor:'#FFF', backgroundColor:'#666'}" name="themefontcolortext" type="text" placeholder="Tekst Kleur" value="<?php if(isset($playerInfo) && trim($playerInfo['bericht']) != '') { echo htmlentities($playerInfo['bericht']); } ?>" class="form-control input-md">
					 </div>
                    </div>
					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Tekst Kleur Titel: *</label>  
                      <div class="col-md-4">
						<input class="jscolor {width:243, height:150, position:'right',
    borderColor:'#FFF', insetColor:'#FFF', backgroundColor:'#666'}" name="teksttitle" type="text" placeholder="Tekst Kleur" value="<?php if(isset($playerInfo) && trim($playerInfo['teksttitle']) != '') { echo htmlentities($playerInfo['teksttitle']); } ?>" class="form-control input-md">
					 </div>
                    </div>
					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastname">Titel achtergrond: *</label>  
                      <div class="col-md-4">
						<input class="jscolor {width:243, height:150, position:'right',
    borderColor:'#FFF', insetColor:'#FFF', backgroundColor:'#666'}" name="titlekleur" type="text" placeholder="Tekst Kleur" value="<?php if(isset($playerInfo) && trim($playerInfo['titlekleur']) != '') { echo htmlentities($playerInfo['titlekleur']); } ?>" class="form-control input-md">
					 </div>
                    </div>
					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Boven tekst bij bericht maken:*</label>  
                      <div class="col-md-4">
                      <input id="firstname" name="tekst1" type="text" placeholder="Tekst1" value="<?php if(isset($playerInfo) && trim($playerInfo['tekst1']) != '') { echo htmlentities($playerInfo['tekst1']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>
					
					<!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Onder tekst bij bericht maken:*</label>  
                      <div class="col-md-4">
                      <input id="firstname" name="tekst2" type="text" placeholder="Tekst2" value="<?php if(isset($playerInfo) && trim($playerInfo['tekst2']) != '') { echo htmlentities($playerInfo['tekst2']); } ?>" class="form-control input-md">
                        
                      </div>
                    </div>
					<div class="form-group">
                      <label class="col-md-4 control-label" for="firstname">Berichten moeten worden gekeurd:*</label>  
                      <div class="col-md-4">
					  <?php 
					  $mic = trim($playerInfo['goedkeuren']);
					  if($mic == '1') { $mic = 'Aan'; }else{ $mic = 'Uit'; };
					  ?>
                      <select name="goedkeuren" class="form-control input-md">
						<option value="<?php if(isset($playerInfo) && trim($playerInfo['goedkeuren']) != '') { echo htmlentities($playerInfo['goedkeuren']); } ?>"><?php if(isset($playerInfo) && trim($playerInfo['goedkeuren']) != '') { echo $mic; } ?></option>
						<option value="1">Aan</option>
						<option value="0">Uit</option>
						</select>
                        
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
	  </section>
	  
	  
																		<!-- right col (We are only adding the ID to make the widgets sortable)-->
       
          <!-- Map box -->
         
              <!-- /. tools -->
 
           
            <!-- /.box-body-->
            <!-- /.box -->
 
          <!-- solid sales graph -->
         
          <!-- /.box -->
 
          <!-- Calendar -->
          <!-- /.box -->
 
        <!-- </section> -->
        <!-- right col -->
       </div>
           
      <!-- /.row (main row) -->
 
    
    <!-- /.content -->
	</section>
  </div>
  
  <?php
require_once('template/TH4Y/footer.php');
?>