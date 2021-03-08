<script src="jscolor.js"></script>
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
                        ChattersWorld Ares Support Pagina
                    </h1>
                </section>
                    
 <section class="content">

                   <?php
                if(isset($success) && $success) {
                    echo '<div class="alert alert-success">Uw stream instellingen zijn bijgewerkt.</div>';
                    echo '<meta https-equiv="refresh" content="1; url=index.php" />';
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
						<center>Hier vind je alle mogelijkheden die Chattersworld bied voor hulp en ondersteuning.<br />Wij zullen dan ook altijd binnen 48 uur uw vraag beantwoorden.</center>
						<table width="100%">
						<tr>
			  
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  </tr>
			  <tr>
			  
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  </tr>
						<tr>
			  <td width="15%"><center><a href="mailto:support@chattersworld.nl" target="_blank"><svg style="width:50px;height:50px" viewBox="0 0 24 24">
              <path fill="#000000" d="M4,8L12,13L20,8V8L12,3L4,8V8M22,8V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V8C2,7.27 2.39,6.64 2.97,6.29L12,0.64L21.03,6.29C21.61,6.64 22,7.27 22,8Z" />
            </svg></a></center></td>
			  <td width="15%"><center><a href="https://clients.chattersworld.nl/contact.php" target="_blank"><svg style="width:50px;height:50px" viewBox="0 0 24 24">
              <path fill="#000000" d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9Z" />
            </svg></a></center></td>
			  <td width="15%"><center><a href="https://wiki.chattersworld.nl/" target="_blank"><svg style="width:50px;height:50px" viewBox="0 0 24 24">
              <path fill="#000000" d="M14.97 18.95l-2.56-6.03c-1.02 1.99-2.14 4.08-3.1 6.03c-.01.01-.47 0-.47 0C7.37 15.5 5.85 12.1 4.37 8.68C4.03 7.84 2.83 6.5 2 6.5v-.45h5.06v.45c-.6 0-1.62.4-1.36 1.05c.72 1.54 3.24 7.51 3.93 9.03c.47-.94 1.8-3.42 2.37-4.47c-.45-.88-1.87-4.18-2.29-5c-.32-.54-1.13-.61-1.75-.61c0-.15.01-.25 0-.44l4.46.01v.4c-.61.03-1.18.24-.92.82c.6 1.24.95 2.13 1.5 3.28c.17-.34 1.07-2.19 1.5-3.16c.26-.65-.13-.91-1.21-.91c.01-.12.01-.33.01-.43c1.39-.01 3.48-.01 3.85-.02v.42c-.71.03-1.44.41-1.82.99L13.5 11.3c.18.51 1.96 4.46 2.15 4.9l3.85-8.83c-.3-.72-1.16-.87-1.5-.87v-.45l4 .03V6.5c-.88 0-1.43.5-1.75 1.25c-.8 1.79-3.25 7.49-4.85 11.2h-.43z" />
            </svg></a></center></td>
			<td width="15%"><center><a href="//m.me/chattersworld" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="50" height="50"
viewBox="0 0 50 50"
style=" fill:#000000;"><path d="M 25 2 C 12.300781 2 2 11.601563 2 23.5 C 2 29.800781 4.898438 35.699219 10 39.800781 L 10 48.601563 L 18.601563 44.101563 C 20.699219 44.699219 22.800781 44.898438 25 44.898438 C 37.699219 44.898438 48 35.300781 48 23.398438 C 48 11.601563 37.699219 2 25 2 Z M 27.300781 30.601563 L 21.5 24.398438 L 10.699219 30.5 L 22.699219 17.800781 L 28.601563 23.699219 L 39.101563 17.800781 Z"></path></svg></a></center></td>
			  </tr>
			  <tr>
			  <td width="15%" ><center><a href="mailto:support@chattersworld.nl" target="_blank">Stuur mail</a></center></td>
			  <td width="15%" ><center><a href="https://clients.chattersworld.nl/contact.php" target="_blank">Creëer Ticket</a></center></td>
			  <td width="15%" ><center><a href="https://wiki.chattersworld.nl/" target="_blank">CWO Wiki</a></center></td>
			  <td width="15%" ><center><a href="//m.me/chattersworld" target="_blank">Facebook Messenger</a></center></td>
			  </tr>
			  <tr>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  </tr>
			  <tr>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  <td width="15%" height="50px"></td>
			  </tr>
			  
			  
			   </table>
          
							
							<!-- /.box -->
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