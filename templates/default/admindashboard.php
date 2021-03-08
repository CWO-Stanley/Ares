<aside class="right-side">

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
                <?php if($user->type == 1 || $user->type == 2) { ?>
                <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php 
                                        $selQuery = DB::Query("SELECT numOfRequests FROM users WHERE id = " . DB::Escape($radioId));
                                        $fetchReq = DB::Fetch($selQuery);
                                        echo $fetchReq['numOfRequests'];
                                        ?>
                                    </h3>
                                    <p>
                                        Totaal aantal verzoeken
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    &nbsp;
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php if($radio->connected()) { echo $radio->listeners(); }else{ echo 'Stream offline'; } ?>
                                    </h3>
                                    <p>
                                        Luisteraars momenteel
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
                                    <h3>
                                        <?php if($radio->connected()) { echo $radio->peaklisteners(); }else{ echo 'Stream offline'; } ?>
                                    </h3>
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
                                    <h3>
                                        <?php if($radio->connected()) { echo $radio->uniquelisteners(); }else{ echo 'Stream offline'; } ?>
                                    </h3>
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



                <!-- Main content -->
                <section class="content">

                    <?php if(isset($_GET['liveswitch']) && in_array($_GET['liveswitch'], array(0, 1))) {
                        
                        DB::Query("UPDATE users SET status = 0 WHERE radio = " . DB::Escape($radioId));
                        DB::Query("UPDATE users SET status = " . DB::Escape($_GET['liveswitch']) . " WHERE id = " . DB::Escape($_SESSION['id']));
                        if($_GET['liveswitch'] == 1) {
                            echo '<div class="alert alert-success">U bent vanaf nu live, de verzoekjesbox is weer actief.</div>';    
                        }else{
                            echo '<div class="alert alert-success">U bent vanaf nu niet langer live, de verzoekjesbox is gesloten.</div>';
                        }
                        echo '<meta http-equiv="refresh" content="2; url=index.php" />';
                        
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
                                    
                                    <h3 class="box-title">Verzoekjes</h3>
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
                                            </span>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <?php if(DB::NumRows($query) == 0) { echo 'Er zijn nog geen verzoekjes ingediend.'; } ?>
                                        <a href="index.php"><button class="btn btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span> Vernieuwen</button></a>
                                        <br /><br />
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            <?php } ?>
                        </section><!-- /.Left col -->
                        
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->