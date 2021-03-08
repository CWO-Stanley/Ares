<?php
$sIP    = "149.210.173.131";
$sPort  = "8060";
$sID    = "1";
$sPass  = "tr4y2018!";
$imgKey = "9338b193afb336c8fdb15db4d8d668df";
 
$a = 0;
$b = 0;
 
function truncate($string, $length, $dots = "...") {
    return (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . $dots : $string;
}
 
$url = file_get_contents("http://$sIP:$sPort/admin.cgi?pass=$sPass&mode=viewxml&page=4&sid=$sID");
 
$xml = simplexml_load_string($url);
foreach( $xml -> SONGHISTORY -> SONG as $Key => $Value ) {
 
list ($artist, $title) = explode(" - ", $Value -> TITLE);
 
$row_color = ($a++ % 2) ? "#fafafa" : "#f5f5f5";
$nowplaying = ($b++ % 20) ? "" : "<font style='color:#b2b2b2;font-size:10px;'><strong>NOW PLAYING</strong></font>";
   
$LastFM = simplexml_load_file("https://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=$artist&api_key=$imgKey");
$trackimg = $LastFM->artist->image[2];
 
if ($trackimg == "") {
    $trackimg = "noIMG.png";      
}
 
if ($trackimg == "https://lastfm-img2.akamaized.net/i/u/174s/62ed6ff00329486d8f56656ef783d1aa.png") {
    $trackimg = "noIMG.png";      
}
 
if ($artist == "LIVE" AND $title == "-=ON AIR=-") {
    $trackimg = "live.png";
}
 
$ts = $Value -> PLAYEDAT;
$date = new DateTime("@$ts");
 
echo'
<div style="background-color: '.$row_color.';>
<img src="'.$trackimg.'" />' . $nowplaying . '   '.truncate($artist, 100).'   '.truncate($title, 100).'   ' . $date->format('g:i:s A') . '
</div>';
}
?>