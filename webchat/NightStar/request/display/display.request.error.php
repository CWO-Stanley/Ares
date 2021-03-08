<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Request Mislukt</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<!-- General styles of the samPHPweb pages -->
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
		<!-- Request Error page specific styles -->
		<link rel="stylesheet" type="text/css" href="styles/request.error.css" />
<STYLE TYPE="text/css"> 
<!-- 
body {
overflow: hidden;
 /* IE10 Consumer Preview */ 
background-image: -ms-linear-gradient(top, #FFFFFF 0%, #AD4848 120%);

/* Mozilla Firefox */ 
background-image: -moz-linear-gradient(top, #FFFFFF 0%, #AD4848 120%);

/* Opera */ 
background-image: -o-linear-gradient(top, #FFFFFF 0%, #AD4848 120%);

/* Webkit (Safari/Chrome 10) */ 
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #FFFFFF), color-stop(1, #AD4848));

/* Webkit (Chrome 11+) */ 
background-image: -webkit-linear-gradient(top, #FFFFFF 0%, #AD4848 120%);

/* W3C Markup, IE10 Release Preview */ 
background-image: linear-gradient(to bottom, #FFFFFF 0%, #AD4848 120%);

	background-attachment: fixed;
	font: 14px Calibri;
	margin: 0;
	padding: 0;
	text-align: center;
}; 
--> 
</STYLE> 

	</head>

	<body>

		<!-- BEGIN:PAGE -->
		<div id="page">
			<h1>Request</h1>
			<h2>Je request is mislukt:</h2>
			<h2 class="error"><?php echo $message; ?></h2>

			<?php require_once('display.footer.php'); ?>

		</div>
		<!-- END:PAGE -->

	</body>
</html>

