<?php 
if(basename($_SERVER['PHP_SELF']) == "configratie.php")
{ 
    header("Location:http://$_SERVER[SERVER_NAME]");
    exit; 
}
/*
* this system can also work whit a full database for multie deedjay 
* connection, is is not by defoult includded, for mor infomation go to or website
* www.boann.eu, this systeem is only work whit mysql database!!
* 
* test your website how save it is by https://scanmyserver.com/?enroll=1&o=seal
*/

/* Database connection */
$samhost    	=   '31.201.19.29';  // your hostname or ip adress
$username   	=   'root';         // your database username
$sampass		=	'Frummel2010!';    // your database password
$samdb			=	'SAMDB';        // your database name

/* Station Main Setup */
$stationname	=	'ChatArmy'; //station naam // Stationname
$stationemail	=	'info@gezelligeblondecandy.nl';   //station email adres // Station email address
$logo			=	'http://www.gezelligeblondecandy.nl/gbclogo.png'; // logo
$count_history	=	5;  // geeft aantal nummers weer die zijn geweest
$chek_interval	=	30000;
$templatename   =   'defoult'; //site template
$lang           =   'engels'; // taal 