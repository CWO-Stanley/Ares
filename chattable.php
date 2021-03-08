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
		"order": [[ 5, "desc" ]]
    } );
	$("div.toolbar").html('<b>Whut!! Zoveel gebruikers?</b>');
} );
</script>
<?php if($user->type == 3) { ?>
<div class="box-header">
					<h3 class="box-title"></h3>
					<?php
					$query = DB::Query("SELECT * FROM chat_settings ORDER by lastused DESC");
					?>
					</div>
					<div class="box-body pad">
              <table id="example" class="table table-striped hover">
                                        <thead><tr>
											<th style="width: 10px">Ares ID</th>
											<th>Achtergrond</th>
                                            <th>Radio</th>
											<th>Kanaalnaam</th>
											<th>Bezoekers</th>
											<th>Laatst gebruikt</th>
                                            <th>Acties</th>
                                        </tr></thead><tbody>
                                        <?php
                                        while($aFetch = DB::Fetch($query)) { 
										setlocale(LC_TIME, "nl_NL");
                                        echo '<tr>
											<td style="vertical-align:middle">' . htmlentities($aFetch['radio']) . '</td>
											<td style="vertical-align:middle"><div class="user-panel"><div class="pull-left image"><img src="' . htmlentities($aFetch['bgurl']) . '" class="img-circle" alt="No Background Selected"/></div></div></td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['radionaam']) . '</td>
                                            <td style="vertical-align:middle">' . htmlentities($aFetch['kanaalnaam']) . '</td>
											<td style="vertical-align:middle">' . htmlentities($aFetch['visits']) . '</td>
											<td data-order="'.$aFetch['lastused'].'" style="vertical-align:middle">' . strftime("%A %d %B %Y om %H:%M:%S", strtotime($aFetch['lastused'])) . '</td>

                                            <td style="vertical-align:middle">
                                                <a href="chatsettings.php?id=' . $aFetch['radio'] . '" title="Bewerk ' . htmlentities($aFetch['kanaalnaam']) . '" target="_parent"><span class="glyphicon glyphicon-pencil"></span></a>
												<a href="chat.php?id=' . $aFetch['radio'] . '" target="_blank" title="Preview ' . htmlentities($aFetch['kanaalnaam']) . '"><span class="glyphicon glyphicon-eye-open"></span></a>
												<a href="chatsettings.php?delete=' . $aFetch['radio'] . '" title="Verwijder ' . htmlentities($aFetch['kanaalnaam']) . '" target="_parent"><span class="glyphicon glyphicon-remove"></span></a>
                                                
                                            </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody></table>
</div><?php } ?>