
<? 

require_once('config.php'); 





      echo "<table border='0' style='border:2px solid #006699' cellspacing='0' cellpadding='2'>";
      echo "  <tr bgcolor='#006699'>";
      echo "    <td colspan='2' background=''>";
      echo "      <p align='center'>";
      echo "      <font face='Verdana, Arial, Helvetica' size='2' color='#F5DEB3'>";
      echo "        <b>Recently Added Tracks</b>";
      echo "      </font>";
      echo "    </td>";
      echo "  </tr>";  

$db->open("SELECT categorylist.*, songlist.id, songlist.info, songlist.title, songlist.picture, songlist.artist, songlist.date_added
FROM categorylist, songlist
WHERE categoryid = 3 
AND categorylist.songid=songlist.id
ORDER BY songlist.date_added DESC LIMIT 20");


// WHERE categoryid = 3 aanpassen aan de gewenste category id.

    while($row = $db->row())
    {


   
         echo "<tr bgcolor='#ffffff'>"; 
         echo "    <td>"; 
         echo "        <img align=left src='$picture_na" . rawurlencode($row["picture"]) ."', width='60' height='60'>"; 
         echo "        <p align='left'>";
         echo "        <font face=Verdana color=teal size=1><b>ARTIST: <i><a href='javascript:songinfo(". $row["id"] . ")'>" . $row["artist"] . "</a></i></font><br>"; 
         echo "        <font face=Verdana color=teal size=1><b>TITLE: <i>'" . $row["title"] ."'  </i></font><br>"; 
         echo "        <font face=Verdana color=teal size=1><b>INFO: </b><a href=' " . $row["info"] ."'>" .  $row["info"] . "</a><font><br>";
         echo "        <font face=Verdana color=teal size=1><b>ADDED: </b></font><font face=Verdana color=red size=1><b>".substr($row["date_added"],5,2)."/".substr($row["date_added"],8,2)." </b></font>"; 
         echo "        </p>";
         echo "    </td>"; 
     
        echo "</tr>"; 
    }
      echo "</table>";    
?>

