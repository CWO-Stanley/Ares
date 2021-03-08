<?php 
require_once('config.php'); 
      
      echo "<table border='0' style='border:2px solid #000000' width=100% cellspacing='0' cellpadding='2'>";
      echo "  <tr bgcolor='#000000'>";
      echo "    <td colspan='2' background=''>";
      echo "      <p align='center'>";
      echo "      <font face='Verdana, Arial, Helvetica' size='2' color='#F7DF23'>";
      echo "        <b>Laatst toegevoegde nummers in onze Nonstop-Jukebox</b>";
      echo "      </font>";
      echo "    </td>";
      echo "  </tr>";  

$db->open("SELECT categorylist.*, songlist.id, songlist.info, songlist.title, songlist.picture, songlist.artist, songlist.date_added
FROM categorylist, songlist
WHERE categoryid = 1                    
AND categorylist.songid=songlist.id
ORDER BY songlist.date_added DESC LIMIT 100");


// WHERE categoryid = 3 aanpassen aan de gewenste category id.

    while($row = $db->row())
    {


   
         echo "<tr bgcolor='#ffffff'>"; 
         echo "    <td>"; 
         echo "  <img align=left src='$picture_na', width='60' height='60'>";
         echo "        <p align='left'>";
         echo "        <font face=Verdana color=teal size=1><b>Artiest: <i>" . $row["artist"] . "</i></font><br>"; 
         echo "        <font face=Verdana color=teal size=1><b>Titel: <i>'" . $row["title"] ."'  </i></font><br>"; 
         echo "        <font face=Verdana color=teal size=1><b>Aanvragen: </b><a href='../web/request.php?songID=". $row["id"] ."'>Deze plaat nu aanvragen</a><font><br>";
         echo "        <font face=Verdana color=teal size=1><b>Toegevoegd op: </b></font><font face=Verdana color=red size=1><b>".substr($row["date_added"],8,2)."/".substr($row["date_added"],5,2)."/".substr($row["date_added"],0,2)."".substr($row["date_added"],2,2)."</b></font>"; 
   echo "        </p>";
         echo "    </td>"; 
     
        echo "</tr>"; 
    }
      echo "</table>";    
?>

