<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html> 
<?php
	require_once('config/config.php');
	require("config.sub.php"); require("landen.php");
?>
<head>
		<meta name="robots" content="noindex,nofollow" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo STATION_NAME; ?></title>

        <link rel="stylesheet" type="text/css" href="requestviewer.css" />
</head>
<body>

<?php
$db = mysql_connect($host, $username, $password) or die ($error1);
	  mysql_select_db($db_name, $db) or die ($error2);

$sql['total_id'] = mysql_query("SELECT ID, COUNT(*) FROM requestlist;");

$assoc['total_id'] = mysql_fetch_assoc($sql['total_id']);
echo '<h1 class="h1">SAM Request Viewer v1.4,5 (In Totaal '.$assoc['total_id']['COUNT(*)'].' Tracks Aangevraagd)</h1>';		
?>

    <div id="container">

<?php  
	$limiet = isset($_GET['next']) ? $_GET['next'] : '0' ;
	$limit = isset($_GET['limiet']) ? $_GET['limiet'] : '30' ;
	$showhost = isset($_GET['ip']) ? 'AND host = \''.$_GET['ip'].'\' ' : '' ;
	if(isset($_POST['submit'])){
	if($_POST['requests'] == "10"){
		$limit = ("10");
	} elseif($_POST['requests'] == "30"){
		$limit = ("30");
	} elseif($_POST['requests'] == "50"){
		$limit = ("50");
	} elseif($_POST['requests'] == "75"){
		$limit = ("75");
	} elseif($_POST['requests'] == "100"){
		$limit = ("100");	
	} else {
		
	   header("Refresh: 1; URL=\"./requestviewer.php\"");
	}
}
?>
   <table class='table1'>
   <tr>
   <form name='quiz' method='post' action=''>
   <th class='header1'>Aantal Requests:</th><th class='header2'>Filter op IP-Adres:</th><th class='header3'>Filter op Code:</th>
   </tr>
   <tr>
   <td>
   <select name='requests'><option>10</option><option>30</option><option>50</option><option>75</option><option>100</option></select>
   <?php echo "&nbsp; <meter min=0 max=100 value=$limit>Requests</meter>&nbsp;"; ?>
   <input type='submit' name='submit' value='Pas Toe'/>
   </form>
   </td>

<?php  
	$adres = ($_POST['vangop']);
	if(isset($_POST['adresje'])){
	if($_POST['vangop'] > 0){
		$showhost = ("AND host = '$adres'");
	} elseif($_POST['vangop'] == ""){
		$tekstboxleeg = ("Vergeten?");
	} elseif (filter_var($_POST['vangop'], FILTER_VALIDATE_IP)) {
		}
	 	else {
		$tekstboxleeg = ("Ongeldig_IP");
		}}
	else { 
	   
	}
?>

   <form name='quiz' method='post' action=''>
   <td>
   <input type="text" name="vangop" value=<?php echo $tekstboxleeg;?>>
   <input type='submit' name='adresje' value='Pas Toe'/>
   </form>
   </td>
   
<?php  
	$filtercode = '';
	if(isset($_POST['send'])){
	if($_POST['codes'] == "200"){
		$filtercode = ("AND code = 200");
	} elseif($_POST['codes'] == "601"){
		$filtercode = ("AND code = 601");
	} elseif($_POST['codes'] == "602"){
		$filtercode = ("AND code = 602");
	} elseif($_POST['codes'] == "603"){
		$filtercode = ("AND code = 603");
	} elseif($_POST['codes'] == "604"){
		$filtercode = ("AND code = 604");
	} elseif($_POST['codes'] == "605"){
		$filtercode = ("AND code = 605");
	} elseif($_POST['codes'] == "606"){
		$filtercode = ("AND code = 606");
	} elseif($_POST['codes'] == "609"){
		$filtercode = ("AND code = 609");
	} elseif($_POST['codes'] == "610"){
		$filtercode = ("AND code = 610");
	} elseif($_POST['codes'] == "611"){
		$filtercode = ("AND code = 611");
	} elseif($_POST['codes'] == "612"){
		$filtercode = ("AND code = 612");
	} elseif($_POST['codes'] == "700"){
		$filtercode = ("AND code = 700");
	} elseif($_POST['codes'] == "701"){
		$filtercode = ("AND code = 701");
	} elseif($_POST['codes'] == "702"){
		$filtercode = ("AND code = 702");
	} elseif($_POST['codes'] == "703"){
		$filtercode = ("AND code = 703");
	} elseif($_POST['codes'] == "704"){
		$filtercode = ("AND code = 704");
	} elseif($_POST['codes'] == "705"){
		$filtercode = ("AND code = 705");
	} elseif($_POST['codes'] == "706"){
		$filtercode = ("AND code = 706");
	} elseif($_POST['codes'] == "707"){
		$filtercode = ("AND code = 707");
	} elseif($_POST['codes'] == "708"){
		$filtercode = ("AND code = 708");		
	} else {
		
	   header("Refresh: 1; URL=\"./requestviewer.php\"");
	}
}
?>
   <form name='quiz' method='post' action=''>
   <td>
  
   <select name='codes'>
				<?php $sql['option'] = mysql_query('SELECT code FROM requestlist GROUP BY code');
				
				while ($assoc['option'] = mysql_fetch_assoc($sql['option'])) 
				{ 
					echo '<option>'.$assoc['option']['code'].'</option>/n';

				}
                ?>
				</select>&nbsp;
  
   <input type='submit' name='send' value='Pas Toe'/>
   </form>
   </td>
   </tr>
   </table>

<table class='table1'>
	<tr>
		<th>Nr:</th>
		<th>Hosts:</th>
		<th>Aantal Requests per Host:</th>
	</tr>

<?php 
	$sql['most_ip'] = mysql_query("SELECT host, COUNT(*) FROM requestlist GROUP BY host ORDER BY COUNT(*) DESC LIMIT 5;");
						
		
	$tel = 1 ;
	$i = 0 ;
						
		while ($assoc['most_ip'] = mysql_fetch_assoc($sql['most_ip'])) 
		{ 
		$class = ($i % 2 == 1)?'even':'oneven' ;
		echo '<tr class=\''.$class.'\'>' ;

		$host = ( $assoc['most_ip']['host'] == $SAM_IP )?''.$stationnaam.' IP':gethostbyaddr($assoc['most_ip']['host']) ;

		echo '
	    		<td>'.$tel.'</td>
				<td>'.$host.'</td>
				<td>'.$assoc['most_ip']['COUNT(*)'].'</td>				
			</tr>' ;
		$tel++ ;
		$i++ ;
		}							
?>	
</table>

		<table class='table1'>
		<tr>
		<th>Datum:</th>
		<th>Artiest & Titel:</th>
		<th>Naam:</th>
		<th>Bericht:</th>
		<th>IP-Adres:</th>
		<th>Status:</th>
		<th>Code:</th>
		</tr>

<?php
	 $sql["info"] = mysql_query("SELECT name, msg, eta, host, code, artist, title, count_requested, count_played, requestlist.status
        FROM requestlist, songlist
        WHERE requestlist.songid=songlist.id $filtercode $showhost
        ORDER BY eta desc
		LIMIT $limiet, $limit     
         ");
		
		$i = 0;

		while ($assoc["info"] = mysql_fetch_assoc($sql["info"]))
	{
		$class = ($i % 2 == 1)?'even':'oneven';
		echo '<tr class=\''.$class.'\'>' ;
		
		echo "<td>" . " (".substr($assoc["info"]["eta"],8,2)."/".substr($assoc["info"]["eta"],5,2)."/".substr($assoc["info"]["eta"],2,2)."&nbsp;om&nbsp;".substr($assoc["info"]["eta"],11,14).") " . "</td>";

    	$timesrequested = $assoc["info"]["count_requested"];
		$timesplayed = $assoc["info"]["count_played"];
		
		echo "<td><a href='#' class='tooltip'>" .  $assoc["info"]["artist"] . "&nbsp-&nbsp;" . $assoc["info"]["title"] . "<span>Dit nummer is $timesrequested keer aangevraagd, en al $timesplayed keer afgespeeld</span></a></td>";
		
		echo "<td>" .  $assoc["info"]["name"] . "</td>";
		
		echo "<td>" .  $assoc["info"]["msg"] . "</td>";
			
		$host = $assoc["info"]["host"];
		
		$hostname = gethostbyaddr($host);
	
		global $landen; 

		$hostsplit = explode( ".", $hostname ); 

		$ext = array_pop( $hostsplit ); 

		if( IsSet( $landen[$ext] ) )
		{
			$land = $landen[$ext];
		}
		else
		{
			$land = "Onbekend";
		}
		
		echo "<td><a href=\"?ip=".$host."\" class='tooltip'>" .  $assoc['info']['host'] . "<span>$hostname - $land</span></a></td>";
		
		if ($assoc['info']['status'] == 'geweigerd')
		{
			$class = 'class=\'red\'';
		}
		elseif ($assoc['info']['status'] == 'in wachtrij')
		{
			$class = 'class=\'orange\'';
		}
		elseif ($assoc['info']['status'] == 'nieuw')
		{
			$class = 'class=\'green\'';
		}						
		else
		{
			$class = '';
		}
		
		echo "<td ".$class.">" .  $assoc["info"]["status"] . "&nbsp;</td>";

		echo "<td><a href='#' class='tooltip'>" .  $assoc["info"]["code"] . "<span>200 - Aangevraagde nummer is afgespeeld<br>
																									 600 - Aangevraagde nummer bestaat niet en kan niet worden afgespeeld<br>
																									 601 - Nummer is recent afgespeeld<br>
																									 602 - De artiest is recent afgespeeld<br>
																									 603 - Het nummer staat al in de queue om te worden afgespeeld<br>
																									 604 - De artiest staat al in de queue om te worden afgespeeld<br>
																									 605 - Het nummer staat al in de request lijst<br>
																									 606 - De artiest staat al in de request lijst<br>
																									 609 - Track recent afgespeeld<br> 
																									 610 - Track staat al in de queue om te worden afgespeeld<br>
																									 611 - Track staat al in de request lijst<br>
																									 612 - Album staat al in de queue om te worden afgespeeld<br>
																									 700 - Ongeldige request. (Error onbekend)<br>
																									 701 - Gebant<br>
																									 702 - Gebant tot mm:ss<br>
																									 703 - Aangevraagd nummer ID ongeldig<br>
																									 704 - Request limiet bereikt. Je kan maximaal xx nummers elke xx minuten aanvragen<br>
																									 705 - Request limiet bereikt. je kan maximaal xx nummers per dag aanvragen<br>
																									 706 - Requests zijn uitgeschakeld<br>
																									 707 - Authorisatie niet geaccepteerd. Het IP staat niet in de witte lijst.<br>
																									 708 - Dit nummer is al aangevraagd, en het staat te wachten in de queue om te worden afgespeeld.</span></a></td>";


		$i++ ;
    } 
?>
		</tr>
		</table>
    </div> 
 
<?php 
	if ($limiet > 0)
	{
		echo '<p class="previous-next"><a href=\'./requestviewer.php?limiet='.$limit.'&next='.($limiet - $limit) .'\'><< Vorige Pagina</a>&nbsp;|' ;
	}
	else
	{
		echo '<p class="previous-next"><a href=\'./requestviewer.php?limiet='.$limit.'&next='.($limiet - 0) .'\'></a>' ;
	}
	if ($limiet < 400)
	{
		echo '|&nbsp;<a href=\'./requestviewer.php?limiet='.$limit.'&next='.($limiet + $limit) .'\'>Volgende Pagina >> </a></p>' ;
	}
	else
	{
		echo '<a href=\'./requestviewer.php?limiet='.$limit.'&next='.($limiet + 0) .'\'></a></p>' ;
	}
?>
 
<h1 class="h2">Copyright © <?php echo STATION_NAME; ?> 2014</h2>

<?php mysql_close($db); ?>
</body>
</html>