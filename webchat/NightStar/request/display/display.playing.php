<?php require_once('display.header.php'); ?>
<center><img src=http://www.djmarinus.nl/NonstopJukebox/web/images/gezelligkletsen.png hight="60px" width="500px"></img></center>

		<?php if ($currentSong instanceof Song) : ?>

			<!-- BEGIN:CURRENTLY PLAYING -->
			<div id="currently_playing_wrapper">
				<div id="currently_playing">
					<table cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th align="left" style="width: 170px;">
								Nu op Gezelligkletsen-Radio
								</th>
								<th align="center">
								</th>
								<th align="left">
								</th>
								<th align="right" style="width: 50px;">
									Tijdsduur
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td align="center">
									
								</td>
								<td colspan="2">
									<span id="currently-playing-title">


<?php echo $currentSong->artist; ?> - <?php echo $currentSong->title; ?></span><?php if ($currentSong->isRequested) echo " ~aangevraagd~ "; ?>
</span>

									<?php if (ALLOW_REQUESTS && $currentSong->isDedication): ?>
									<!-- BEGIN:DEDICATION -->
									 <br />
									 <br />
									 Nummer aangevraagd door <span id="dedication-name">"<?php echo $currentSong->dedicationName; ?>"</span>
										 <?php if(!empty($currentSong->dedicationMessage)) : ?>
											met bericht <span id="dedication-message">"<?php echo $currentSong->dedicationMessage; ?>"</span>
										 <?php endif; ?>
									<!-- END:DEDICATION -->
									<?php endif; ?>

								</td>
								<td align="right">
									<span id="currently-playing-duration"><?php echo $currentSong->durationDisplay; ?></span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END:CURRENTLY PLAYING -->
		<?php endif; ?>


			<?php if(is_array($comingSongs) && count($comingSongs)>0) : ?>
			<!-- BEGIN:COMING UP -->
			<div id="coming-up_wrapper">
				<div id="coming-up">
					<table cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="2" align="left">
									Deze komen nog voorbij
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<?php
										$counter = 1;
										$doCounter = count($comingSongs) > 1;
										foreach ($comingSongs as $comingSong): ?>
										<div>
											<?php if($doCounter) : ?><span class="comingIndex"><?php echo $counter++;?></span><?php endif; ?>

	<?php if(!empty($comingSong->artist)) : ?><?php echo $comingSong->artist; ?> <?php endif; ?> - <?php echo $comingSong->title; ?>
											
										<?php if($comingSong->isRequested): ?>
											~aangevraagd~
										<?php endif; ?>
										</div>
									<?php endforeach; ?>
									<hr style="width:100%;border:none;"/>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END:COMING UP -->
			<?php endif; ?>


			<?php if(is_array($recentSongs) && count($recentSongs)>0) : ?>
			<!-- BEGIN:RECENTLY PLAYED -->
			<div id="recently_played_wrapper">
				<div id="recently_played">
					<table cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="2" align="left">
									Deze zijn al geweest
								</th>
													<th align="right">
									Tijdsduur
								</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($recentSongs as $key => $recentSong): ?>
							<tr>
								<td></td>

								<td>
									<?php echo $recentSong->artist_title; ?>
									<?php if ($recentSong->isRequested): ?>
									~aangevraagd~
									<?php endif; ?>
								</td>
								<td align="right">
									<?php echo $recentSong->durationDisplay; ?>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- END:RECENTLY PLAYED -->
			<?php endif; ?>


		<?php require_once('display.footer.php'); ?>


		</div>
		<!-- END:PAGE -->

		<script type="text/javascript">
		//<![CDATA[
		<?php if(CHECK_INTERVAL > 0) : ?>
			//Check if song changed every CHECK_INTERVAL milliseconds
			setInterval("DoCheckRefresh()", <?php echo CHECK_INTERVAL; ?>);

			function DoCheckRefresh()
			{
				var url = 'songcheck.js.php?songID=<?php echo ($currentSong instanceof Song) ? $currentSong->ID : 0; ?>&buster=' + (new Date().getTime());
				$.getScript(url); //jQuery call to call remote javascript
			}

			//This function is called by remote javascript above if the song changed
			function doSongChanged()
			{
				DoRefresh();
			}

			function DoRefresh()
			{
				//Reload this page with the new data
				document.location.href = "playing.php?buster=<?php echo date('dhis').rand(1,1000); ?>";
			}
		<?php endif; ?>
		//]]>
		</script>

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

			// Rounds the Currently Playing Table Corners
			$('#currently_playing').corner();

			// Rounds the Coming Up Corners
			$('#coming-up').corner();

			// Rounds the Recently Played Table Corners
			$('#recently_played').corner();
			// Style odd and even rows in Currently Playing Table (Cross-browser compatible)
			$('#recently_played table tbody tr:nth-child(odd)').addClass('recently_played_odd');
			$('#recently_played table tbody tr:nth-child(even)').addClass('recently_played_even');

			// Round the Dedication Corners
			$('#dedication dl').corner('tl tr').corner();

			// Round the Top Request Corners
			$('#top_requests dl').corner();
		});
		//]]>
		</script>
	</body>
</html>

