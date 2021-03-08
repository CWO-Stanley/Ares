<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script>
(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});
</script>

<?php
	$refresh = DB::Query("SELECT refresh FROM users WHERE id = " . DB::Escape($_SESSION['id']));
	if(DB::NumRows($refresh) == 1) {
																$fetchrefresh = DB::Fetch($refresh);
	}
?>
<?php 
$conn=mysqli_connect("127.0.0.1","user","pass","dbname");
										// Check connection
										if (mysqli_connect_errno())
										{
											echo "Failed to connect to MySQL: " . mysqli_connect_error();
										}
										?>
<!-- <META HTTP-EQUIV="refresh" CONTENT="<?php echo $fetchrefresh['refresh'] ?>"> -->
<script>
						var timer = setTimeout(function() {
							window.location='index.php'
						}, <?php echo $fetchrefresh['refresh'] ?>000);
					</script>
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
                        Dashboard
                    </h1>
                </section>
				<?php if($user->type == 3) { ?>
                <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
								<div class="counter">
                                    <h3 class="timer count-title count-number" data-to="<?php
										$sql0="select count('*') from users where type = 3";
										$result0=mysqli_query($conn,$sql0);
										$row0=mysqli_fetch_array($result0);
										echo "$row0[0]";
										
									?>" data-speed="1500"> 
									</h3></div>
                                    <p>
									
                                        Admins
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="admins.php" class="small-box-footer">
                                    Admins
                                </a>
                            </div>
                        </div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
								<div class="counter">
                                    <h3 class="timer count-title count-number" data-to="<?php
										$sql1="select count('*') from users where type = 2";
										$result1=mysqli_query($conn,$sql1);
										$row1=mysqli_fetch_array($result1);
										echo "$row1[0]";
										
									?>"  data-speed="1500">
                                    </h3>
									</div>
                                    <p>
									 Verzoekservers
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="radios.php" class="small-box-footer">
                                    Verzoekservers
                                </a>
                            </div>
                        </div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
								<div class="counter">
                                    <h3 class="timer count-title count-number" data-to="<?php
										$sql="select count('*') from chat_settings";
										$result=mysqli_query($conn,$sql);
										$row=mysqli_fetch_array($result);
										echo "$row[0]";
										
									?>" data-speed="1500">
                                    </h3>
									</div>
                                    <p>
									 Chatboxen
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="chats.php" class="small-box-footer">
                                    Chatboxen
                                </a>
                            </div>
                        </div><!-- ./col -->
						<div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
								<div class="counter">
                                    <h3 class="timer count-title count-number" data-to="<?php
										$sql1="select count('*') from users";
										$result1=mysqli_query($conn,$sql1);
										$row1=mysqli_fetch_array($result1);
										echo "$row1[0]";
										
									?>" data-speed="1500">
                                    </h3>
									</div>
                                    <p>
									 Gebruikers
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    &nbsp;
                                </a>
                            </div>
                        </div><!-- ./col -->
					</div><!-- /.row -->
					<section class="content">
	<div class="row">
		<section class="col-md-12 connectedSortable">
			<div class="box box-primary">
                <div class="box-header">
					<h3 class="box-title">Gebruikers van Ares</h3>
					<?php
					$query = DB::Query("SELECT * FROM users ORDER by lastused DESC");
					?>
					</div>
					<div class="box-body pad">
              
									<iframe src="usertable.php" style="height:1000px;width:100%;border:none;"></iframe>
									</div>
									<!-- </div> -->
									</div>
									</section>
									
									
									
									
				<?php } ?>

				
                <?php if($user->type == 1 || $user->type == 2) { ?>
				
                <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
								<div class="counter">
                                    <h3 class="timer count-title count-number" data-to="<?php 
									  if($user->type == 1) {
                                        $selQuery = DB::Query("SELECT numOfRequests FROM users WHERE radio = " . DB::Escape($radioId));
									  }
									  if($user->type == 2) {
                                        $selQuery = DB::Query("SELECT numOfRequests FROM users WHERE id = " . DB::Escape($radioId));
									  }
										$qty= 0;
										while ($num = mysqli_fetch_assoc ($selQuery)) {
											$qty += $num['numOfRequests'];
										}
										echo $qty;
                                        ?>" data-speed="1500">  
									</h3>
									</div>
                                    <p>
                                        Totaal aantal verzoeken
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Mijn verzoeken: <?php 
                                        $selQuery = DB::Query("SELECT numOfRequests FROM users WHERE id = " . DB::Escape($_SESSION['id']));
                                        $fetchReq = DB::Fetch($selQuery);
                                        echo $fetchReq['numOfRequests'];
                                        ?>
									<?php
										mysqli_close($conn);
										
									?> 
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
								<div class="counter">
                                    <h3 class="timer count-title count-number" data-to="<?php if($radio->connected()) { echo $radio->listeners(); }else{ echo 'Stream offline'; } ?>" data-speed="1500">
                                    </h3>
									</div>
                                    <p>
                                        Aantal Luisteraars
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    &nbsp;
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <div class="counter">
                                    <h3 class="timer count-title count-number" data-to="<?php if($radio->connected()) { echo $radio->peaklisteners(); }else{ echo 'Stream offline'; } ?>" data-speed="1500">
                                    </h3>
									</div>
                                    <p>
                                        Hoogste aantal luisteraars
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    &nbsp;
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <div class="counter">
                                    <h3 class="timer count-title count-number" data-to="<?php if($radio->connected()) { echo $radio->uniquelisteners(); }else{ echo 'Stream offline'; } ?>" data-speed="1500">
                                    </h3>
									</div>
                                    <p>

                                        Unieke luisteraars
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    &nbsp;
                                </a>
                            </div>
                        </div><!-- ./col -->
					</div><!-- /.row -->
                   <?php } ?>
				   


 <section class="content">

                    <?php if(isset($_GET['liveswitch']) && in_array($_GET['liveswitch'], array(0, 1))) {
                        
                        DB::Query("UPDATE users SET status = 0 WHERE radio = " . DB::Escape($radioId));
                        DB::Query("UPDATE users SET status = " . DB::Escape($_GET['liveswitch']) . " WHERE id = " . DB::Escape($_SESSION['id']));
                        if($_GET['liveswitch'] == 1) {
                            echo '<div class="alert alert-success">U bent vanaf nu live, de verzoekjesbox is weer actief.</div>';    
                        }else{
                            echo '<div class="alert alert-danger">U bent vanaf nu niet langer live, de verzoekjesbox is gesloten.</div>';
							DB::Query("UPDATE users SET verzoekform = 0 WHERE radio = " . DB::Escape($radioId));
                        }
                        echo '<meta http-equiv="refresh" content="2; url=index.php" />';
                        
                    }
                    ?>
					<?php if(isset($_GET['verzoekform']) && in_array($_GET['verzoekform'], array(0, 1))) {
                        
                        DB::Query("UPDATE users SET verzoekform = 0 WHERE radio = " . DB::Escape($radioId));
                        DB::Query("UPDATE users SET verzoekform = " . DB::Escape($_GET['verzoekform']) . " WHERE id = " . DB::Escape($_SESSION['id']));
                        if($_GET['verzoekform'] == 1) {
                            echo '<div class="alert alert-success">U bent nogsteeds live, verzoek formulier is uit.</div>';    
                        }else{
                            echo '<div class="alert alert-success">U bent nogsteeds live, verzoek formulier is weer aan.</div>';
                        }
                        echo '<meta http-equiv="refresh" content="2; url=index.php" />';
                        
                    }
                    ?>
      <!-- Main row -->
      
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
                                    
                                    <h3 class="box-title">Verzoekjes vanaf de website</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <?php
                                    if(isset($_GET['delreq']) && is_numeric($_GET['delreq'])) {
                                        $num = DB::NumRows(DB::Query("SELECT id FROM requests WHERE id = " . DB::Escape($_GET['delreq']) . " AND radio = " . DB::Escape($radio)));
                                        if($num == 1) {
                                            DB::Query("DELETE FROM requests WHERE id =" . DB::Escape($_GET['delreq']));
                                            echo '<div class="alert alert-success">Het verzoekje is succesvol verwijderd.</div>';
                                        }
                                    }
                                    ?>
									<?php
                                    if(isset($_GET['delallwreq']) && is_numeric($_GET['delallwreq'])) {
                                        $num = DB::NumRows(DB::Query("SELECT id FROM requests WHERE radio = " . DB::Escape($radio)));
                                        if($num != 0) {
                                            DB::Query("DELETE FROM requests WHERE radio =" . DB::Escape($_GET['delallwreq']));
                                            echo '<div class="alert alert-success">Alle verzoekjes zijn succesvol verwijderd.</div>';
                                        }
                                    }
                                    ?>
                                    <ul class="todo-list">
                                        <?php
                                        $query = DB::Query("SELECT * FROM requests WHERE radio =" . DB::Escape($radio) . " ORDER by requestDate DESC");
                                        while($rFetch = DB::FetchObject($query)) {
                                        ?>
                                        <li style="overflow: hidden;">
                                            <span class="pull-left" style="width: 100%; max-width: 450px;">
                                                <div class="alert alert-success" style="font-weight: bold;">Nummer: <?php echo $rFetch->artist; ?> - <?php echo $rFetch->song; ?></div>
                                                <div class="alert alert-danger">Alternatief: <?php echo $rFetch->altartist; ?> - <?php echo $rFetch->altsong; ?></div>
                                                <div class="alert alert-info">Bericht:<br /> <?php echo nl2br($rFetch->message); ?></div>
                                            </span>
                                            <span class="pull-right">
                                            <strong>Verzoekje van:</strong> <?php echo $rFetch->name; ?><br />
                                            <strong>Ingediend op:</strong> <?php echo date("d-m-Y H:i:s", strtotime($rFetch->requestDate)); ?><br />
                                            <strong>IP-adres:</strong> <?php echo $rFetch->ip; ?><br />
                                            
                                            <a href="index.php?delreq=<?php echo $rFetch->id; ?>"><button class="btn btn-primary">Verzoekje verwijderen</button></a>
											<a href="ipbans.php?ban=<?php echo $rFetch->ip; ?>&reason=Autobanned"><button class="btn btn-primary">Ban deze verzoeker</button></a>
                                            </span>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <?php if(DB::NumRows($query) == 0) { echo 'Er zijn nog geen verzoekjes ingediend.'; } ?>
                                        <a href="index.php"><button class="btn btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span> Vernieuwen</button></a>
										<a href="index.php?delallwreq=<?php echo DB::Escape($radio); ?>"><button class="btn btn-primary pull-right"><span class="glyphicon glyphicon-trash"></span> Alle verzoekjes verwijderen</button></a>
                                        <br /><br />
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
							<?php 
							$num = DB::NumRows(DB::Query("SELECT id FROM verzoek WHERE radio = " . DB::Escape($radio)));
							if($num != 0) { ?>
							<div class="box box-primary">
                                <div class="box-header">
                                    
                                    <h3 class="box-title">Verzoekjes vanuit uw chatroom</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
						        <?php
                                    if(isset($_GET['delreq']) && is_numeric($_GET['delreq'])) {
                                        $num = DB::NumRows(DB::Query("SELECT id FROM verzoek WHERE id = " . DB::Escape($_GET['delreq']) . " AND radio = " . DB::Escape($radio)));
                                        if($num == 1) {
                                            DB::Query("DELETE FROM verzoek WHERE id =" . DB::Escape($_GET['delreq']));
                                            echo '<div class="alert alert-success">Het verzoekje is succesvol verwijderd.</div>';
                                        }
                                    }
                                    ?>
									<?php
                                    if(isset($_GET['delallreq']) && is_numeric($_GET['delallreq'])) {
                                        $num = DB::NumRows(DB::Query("SELECT id FROM verzoek WHERE radio = " . DB::Escape($radio)));
                                        if($num != 0) {
                                            DB::Query("DELETE FROM verzoek WHERE radio =" . DB::Escape($_GET['delallreq']));
                                            echo '<div class="alert alert-success">Alle chatverzoekjes zijn succesvol verwijderd.</div>';
                                        }
                                    }
                                    ?>
                                    <ul class="todo-list">
                                        <?php
                                        $query = DB::Query("SELECT * FROM verzoek WHERE radio =" . DB::Escape($radio) . " ORDER by time DESC");
                                        while($rFetch = DB::FetchObject($query)) {
                                        ?>
                                        <li style="overflow: hidden;">
                                            <span class="pull-left" style="width: 100%; max-width: 450px;">
												<div class="alert alert-info" style="font-weight: bold;">Verzoekje van: <?php echo $rFetch->Aanvrager; ?></div>
                                                <div class="alert alert-success" style="font-weight: bold;">Nummer: <?php echo $rFetch->Aangevraagd; ?></div>
                                                </span>
                                            <span class="pull-right">
                                            <!-- <strong>Verzoekje van:</strong> <?php echo $rFetch->Aanvrager; ?><br /> -->
                                            <strong>Ingediend op:</strong> <?php echo date("d-m-Y H:i:s", strtotime($rFetch->time)); ?><br />
                                                                                        
                                            <a href="index.php?delreq=<?php echo $rFetch->id; ?>"><button class="btn btn-primary">Verzoekje verwijderen</button></a>
                                            </span>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <?php if(DB::NumRows($query) == 0) { echo 'Er zijn nog geen verzoekjes ingediend.'; } ?>
                                        <a href="index.php"><button class="btn btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span> Vernieuwen</button></a>
                                       
										<a href="index.php?delallreq=<?php echo DB::Escape($radio); ?>"><button class="btn btn-primary pull-right"><span class="glyphicon glyphicon-trash"></span> Alle verzoekjes verwijderen</button></a>
										<br /><br />
										</div><!-- /.box-body -->
                            </div><!-- /.box -->
                            <?php } ?>
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