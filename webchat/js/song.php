<?php
$url = htmlspecialchars($_GET['radio']);
$radio = (preg_split('/:/',$url));
$ip = $radio['0'];
$port = $radio['1'];
$fp = @fsockopen($ip,$port,$errno,$errstr,1);
if (!$fp)
{
   echo "Geen informatie om weer te geven voor dit moment!";
   // Diaplays when sever is offline
}
else
{
   fputs($fp, "GET /7.html HTTP/1.0\r\nUser-Agent: Mozilla\r\n\r\n");
   while (!feof($fp))
   {
      $info = fgets($fp);
   }
   $info = str_replace('</body></html>', "", $info);
   $split = explode(',', $info);
   if (empty($split[6]) )
   {
      echo "The current song is not available";
      // Diaplays when sever is online but no song title
   }
   else
   {
      $title = str_replace('\'', '`', $split[6]);
      $title = str_replace(',', ' ', $title);
      echo "$title";
      // Diaplays song
   }
}
?> 