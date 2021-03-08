<?php
//your users unique license key
define('KEY_CODE', '1234-5678-1234-5678');
 
//callback license key server
$LICENSE_KEY = KEY_CODE;
$keydata = file_get_contents("https://license.chattersworld.nl/?key=$LICENSE_KEY");
 
//license node
if (!isset($_GET['icryptic'])) {
 
        //check if license node online
        $license_node = curl_init('https://license.chattersworld.nl/'); //node domain
        curl_setopt($license_node, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($license_node, CURLOPT_NOSIGNAL, 1);
        curl_setopt($license_node, CURLOPT_TIMEOUT_MS, 400); //timeout in 400 ms
        $data = curl_exec($license_node);
        $curl_errno = curl_errno($license_node);
        $curl_error = curl_error($license_node);
        curl_close($license_node);
		
        //if offline do nothing
        if ($curl_errno > 0) { } else {
	  
        //if online and license good do noting or else prompt invalid
        if(strpos($keydata, 'GOOD') !== FALSE){ }else{ echo "INVALID LICENSE KEY YOU WILL BE REDIRECTED"; echo "<meta http-equiv='refresh' content='15; URL=https://chattersworld.nl/'>"; exit; }
	
        }
}
?>
Good License!