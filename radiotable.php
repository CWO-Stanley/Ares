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
		"dom": '<"toolbar">frtip'
    } );
	$("div.toolbar").html('<b>Whut!! Zoveel gebruikers?</b>');
} );
</script>
<?php if($user->type == 3) { ?>
<div class="box-header">
					<h3 class="box-title"></h3>
					<?php
					$query = DB::Query("SELECT id, station, avatar, nonstopavatar, username, email, firstname, lastname FROM users WHERE type = '2'");
					?>
					</div>
					<div class="box-body pad">
              <table id="example" class="table table-striped hover">
                                        <thead><tr>
											<th>Profielfoto</th>
                                            <th style="width: 10px">#</th>
											<th>Station</th>
											<th>Nonstop Plaatje</th>
                                            <th>Gebruikersnaam</th>
                                            <th>Email</th>
                                            <th>Voornaam</th>
                                            <th>Achternaam</th>
                                            <th>Acties</th>
                                        </tr></thead><tbody>
                                        <?php
                                        while($aFetch = DB::Fetch($query)) { 
                                        echo '<tr>
											<td style="vertical-align:middle"><div class="user-panel"><div class="pull-left image"><img src="https://ares.chattersworld.nl/' . htmlentities($aFetch['avatar']) . '" class="img-circle" alt="User Image"/></div></div></td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['id']) . '</td>
											<td style="vertical-align:middle">' . htmlentities($aFetch['station']) . '</td>
											<td style="vertical-align:middle"><div class="user-panel"><div class="pull-left image"><img src="https://ares.chattersworld.nl/avatars/' . htmlentities($aFetch['nonstopavatar']) . '" class="img-circle" alt="User Image"/></div></div></td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['username']) . '</td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['email']) . '</td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['firstname']) . '</td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['lastname']) . '</td>

                                            <td style="vertical-align:middle">
                                                <a href="editradio.php?id=' . $aFetch['id'] . '" target="_parent"><span class="glyphicon glyphicon-pencil"></span></a>
                                                <a href="radios.php?delete=' . $aFetch['id'] . '" target="_parent"><span class="glyphicon glyphicon-remove"></span></a>
                                            </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody></table>
</div><?php } ?>