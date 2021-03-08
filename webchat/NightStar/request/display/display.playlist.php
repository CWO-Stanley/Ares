<BODY oncontextmenu='return false' ondragstart='return false' onselectstart='return false'>
<?php require_once('display.header.php'); ?>
			<!-- BEGIN:SEARCH -->
			<div id="search">
<center><img src="" alt="" title="" width="500"/></img></center>
			<form method="get" action="playlist.php" name="searchParameters">
			Zoeken: <?php InputText('search', $search, '',20); ?>
<button type='submit' style='border: 0; background: transparent'>
    <img src='../web/images/search.png' width='32' height='32' alt='Zoeken' name='B1' />
</button> 				<hr/>

				Zoek op Artiest:<br />

				<table>
					<tbody>
						<tr>
							<td>
								<input type="submit" name="character" class="characterButton" value="All" onclick="document.forms.searchParameters.search.value=''"/>
							</td>
							<td>
								<input <?php echo "0 - 9" == $character? "id='activeCharacter'" : "";?> type="submit" name="character" class="characterButton"value='0 - 9'/>
							</td>

							<?php
							for($charVal = ord('A');$charVal <= ord('Z'); $charVal++) {
								$c = chr($charVal);
								echo "<td>";
								echo "<input ".($character == $c? "id='activeCharacter'" : "")." type='submit' name='character' class='characterButton' value='$c' onclick='document.forms.searchParameters.search.value=\"\"' />";
								echo "</td>";
							}
							?> 
						</tr>
					</tbody>
				</table>


				</form>

				<br />
			</div>
			<!-- END:SEARCH -->


			<!-- BEGIN:PLAYLIST -->
			<div id="playlist">
				<div id="playlist_wrapper">
					<table  cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="3" align="left">
									Playlist resultaten
								</th>
													
							</tr>
						</thead>
						<tbody>
						<tr>
							<td colspan="6" id="td-playlist-paging">
							<?php if(is_array($playlistSongs) && (count($playlistSongs)>0)) { ?>
								<?php if($start > 0) {echo $prevlnk; } ?>
								&nbsp; [ Toont <?php echo "$first tot $last van $cnt"; ?> ] &nbsp;
								<?php if(($start+$limit) < $cnt) { echo $nextlnk; } ?>
							<?php } ?>
							</td>
						</tr>
						<?php
						 if(is_array($playlistSongs) || (count($playlistSongs)>0))
						  foreach ($playlistSongs as $key => $playlistSong): ?>
							<tr>
								<td>
									<?php echo $key+1; ?>
								</td>
						
								<td>
									<?php echo $playlistSong->artist_title; ?>
									<?php if ($playlistSong->isRequested): ?>
									~aangevraagd~
									<?php endif; ?>
								</td>
								<td align="center">
									<?php if (ALLOW_REQUESTS) : ?>
									<a href="javascript:request(<?php echo $playlistSong->ID; ?>);">
										<img src="images/request.png" alt="Deze plaat aanvragen!" title="Deze plaat aanvragen!"/>
									</a>
&nbsp;&nbsp;
<a href="http://www.youtube.com/results?search_query=<?php echo $playlistSong->artist_title; ?>;" target="_new">
										<img src="images/youtube.png" alt="Beluisteren op Youtube!" title="Beluisteren op Youtube!"/>
									</a>
									<?php endif; ?>
															</td>
												
							</tr>
						<?php endforeach; ?>
							<tr>
								<td colspan="6" id="td-playlist-paging">
								<?php if(!is_array($playlistSongs) || (count($playlistSongs)==0)) { ?>
								 	Geen overeenkomsten gevonden. Porbeer een andere zoekterm.
								<?php } else { ?>
									<?php if($start > 0) {echo $prevlnk; } ?>
									&nbsp; [ Toont <?php echo "$first van $last tot $cnt"; ?> ] &nbsp;
									<?php if(($start+$limit) < $cnt) { echo $nextlnk; } ?>
								<?php } ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END:PLAYLIST -->


	</div>
		<!-- END:PAGE -->

		<!-- JQuery to round corners some of the HTML items on the page -->
		<script type="text/javascript">
		//<![CDATA[
		// Make sure the DOM is ready
		$(document).ready(function() {
			// Rounding of corners (Cross-browser compatible)
			// See http://jquery.malsup.com/corner/ for different Styles.

			// Rounds the page corners
			$('#page').corner();

			// Rounds the Navigation Menu Corners
			$('#navigation dl').corner();

			// Rounds the Coming Up Corners
			$('#coming-up dl').corner();

			// Round the Dedication Corners
			$('#dedication dl').corner('tl tr').corner();

			// Round the Top Request Corners
			$('#top_requests dl').corner();

			// Rounds the Playlist and search boxes
			$('#playlist_wrapper, #search').corner();
			// Style odd and even rows in Playlist Table (Cross-browser compatible)
			$('#playlist table tbody tr:nth-child(odd)').addClass('playlist_odd');
			$('#playlist table tbody tr:nth-child(even)').addClass('playlist_even');

		});
		//]]>

		</script>

	</body>
</html>