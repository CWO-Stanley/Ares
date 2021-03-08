<?php if($user->type == 1 || $user->type == 2) { ?>
                <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                      <?php 
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
                                    <h3>
                                        <?php if($radio->connected()) { echo $radio->listeners(); }else{ echo 'Stream offline'; } ?>
                                    </h3>
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