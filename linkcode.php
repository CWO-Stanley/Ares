<?php
/**
 * liverequest systeem
 * @author Prelution
 */

require_once('includes/bootstrap.inc.php');
require_once('templates/default/header.php');

?>

<aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Insluitcodes
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                 

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-md-12 connectedSortable">                            
                        <?php if($user->type == 2) { ?>
                        <?php
                        if($user->type == 1) {
                            $radio = $user->radio;
                        }elseif($user->type == 2){
                            $radio = $_SESSION['id'];
                        }

                        ?>
                            <div class="box box-primary">
                                <div class="box-header">
                                    
                                    <h3 class="box-title">Directe link verzoekformulier</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <textarea style="width: 100%; height: 25px;  resize: none; "><a href="http://cp.liverequest.nl/verzoekjes/<?php echo $radio; ?>/">Verzoekje indienen</a></textarea>
                                    <br>
                                    <strong>Voorbeeld: </strong><a href="http://cp.liverequest.nl/verzoekjes/<?php echo $radio; ?>/">Verzoekje indienen</a>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->


                            <div class="box box-primary">
                                <div class="box-header">
                                    
                                    <h3 class="box-title">Directe link DJ display</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <textarea style="width: 100%; height: 25px; resize: none; "><a href="http://cp.liverequest.nl/djdisplay/<?php echo $radio; ?>/">Huidige DJ</a></textarea>
                                    <br>
                                    <strong>Voorbeeld: </strong><a href="http://cp.liverequest.nl/djdisplay/<?php echo $radio; ?>/">Huidige dj</a>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->


                            <div class="box box-primary">
                                <div class="box-header">
                                    
                                    <h3 class="box-title">Directe link huidig nummer</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <textarea style="width: 100%; height: 25px; resize: none; "><a href="http://cp.liverequest.nl/currentsong/<?php echo $radio; ?>/">Huidig nummer</a></textarea>
                                    <br>
                                    <strong>Voorbeeld: </strong><a href="http://cp.liverequest.nl/currentsong/<?php echo $radio; ?>/">Huidig nummer</a>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->


                            <?php } ?>
                        </section><!-- /.Left col -->
                        
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
<?php require_once('templates/default/footer.php'); ?>