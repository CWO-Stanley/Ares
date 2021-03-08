<?php require_once('includes/bootstrap.inc.php'); ?>
<link rel="stylesheet" href="component/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
        },
		"pagingType": "full_numbers",
		"dom": '<"toolbar">frtip',
		"order": [[ 6, "desc" ]]
    } );
	$("div.toolbar").html('<b>Whut!! Zoveel gebruikers?</b>');
} );
</script>
<?php if($user->type == 3) { ?>
<div class="box-header">
					<h3 class="box-title"></h3>
					<?php
					$query = DB::Query("SELECT * FROM users ORDER by lastused DESC");
					?>
					</div>
					<div class="box-body pad">
              <table id="example" class="table table-striped hover">
                                        <thead><tr>
											<th class="th-sm">Profielfoto</th>
                                            <th class="th-sm" style="width: 10px">#</th>
											<th class="th-sm">Station</th>
                                            <th class="th-sm">Gebruikersnaam</th>
                                            <th class="th-sm">Email</th>
                                            <th class="th-sm">Voornaam</th>
                                            <th class="th-sm">Laatst ingelogd</th>
                                            <th class="th-sm">Acties</th>
                                        </tr></thead><tbody>
										<?php
                                        while($aFetch = DB::Fetch($query)) {
											setlocale(LC_TIME, "nl_NL");
																				
                                        echo '<tr>
											<td style="vertical-align:middle"><div class="user-panel"><div class="pull-left image"><img src="https://ares.chattersworld.nl/' . htmlentities($aFetch['avatar']) . '" class="img-circle" alt="User Image"/></div></div></td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['id']) . '</td>
											<td style="vertical-align:middle">' . htmlentities($aFetch['station']) . '</td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['username']) . '</td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['email']) . '</td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['firstname']) . '</td>
                                            <td data-order="'.$aFetch['lastused'].'" style="vertical-align:middle">' . strftime("%A %d %B %Y om %H:%M:%S", strtotime($aFetch['lastused'])) . '</td>

                                            <td style="vertical-align:middle">
                                                
                                                <a href="users.php?delete=' . $aFetch['id'] . '" target="_parent"><span class="glyphicon glyphicon-remove"></span></a>
                                            </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody></table>
</div><?php } ?>