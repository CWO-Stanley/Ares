<?php
if (!empty($_GET['chan'])) {
    $channel = $_GET['chan'];
    echo "Yes, mail is set to: ".$channel;    
}else{  
    echo "N0, mail is not set";
    header('Location: https://chattersworld.nl');
}
?>
