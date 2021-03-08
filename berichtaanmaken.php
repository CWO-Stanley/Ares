	<?php
	 require_once('includes/bootstrap.inc.php');
	
	
			 if($_SERVER['REQUEST_METHOD'] == 'POST') {
				 $querygoed = DB::Query("SELECT goedkeuren FROM berichtenbalkkleur WHERE radio = " . DB::Escape($_GET['id']));
				 $fetch = DB::Fetch($querygoed);
				 if($fetch['goedkeuren'] == '1') {
            if (filter_var($_POST['gastemail'], FILTER_VALIDATE_EMAIL)) {
                            DB::Query("INSERT INTO berichtenbalk (radio, geaccepteerd, gastnaam, gastemail, bericht, ipadres, time)
                                                   VALUES
                                                   ('" . DB::Escape($_GET['id']) . "',
												    '1',
                                                    '" . DB::Escape(htmlentities($_POST['gastnaam'])) . "',
                                                    '" . DB::Escape(htmlentities($_POST['gastemail'])) . "',
                                                    '" . DB::Escape(htmlentities($_POST['bericht'])) . "',
                                                    '" . DB::Escape(htmlentities($_SERVER['REMOTE_ADDR'])) . "',
													NOW()
                                                   
                                                    )");
                            $success = true;
                    }else{
					$error = true;
            }
			 }else{
				if (filter_var($_POST['gastemail'], FILTER_VALIDATE_EMAIL)) {
                            DB::Query("INSERT INTO berichtenbalk (radio, geaccepteerd, gastnaam, gastemail, bericht, ipadres, time)
                                                   VALUES
                                                   ('" . DB::Escape($_GET['id']) . "',
												    '0',
                                                    '" . DB::Escape(htmlentities($_POST['gastnaam'])) . "',
                                                    '" . DB::Escape(htmlentities($_POST['gastemail'])) . "',
                                                    '" . DB::Escape(htmlentities($_POST['bericht'])) . "',
                                                    '" . DB::Escape(htmlentities($_SERVER['REMOTE_ADDR'])) . "',
													NOW()
                                                   
                                                    )");
                            $success = true;
                    }else{
					$error = true;
            }	
			 }
			 }
			
			$query1 = DB::Query("SELECT * FROM berichtenbalkkleur WHERE radio = " . DB::Escape($_GET['id']));
            if(DB::NumRows($query1) == 1) {
                    $balkInfo = DB::Fetch($query1);
                                                $bg = $balkInfo['bg'];
                                                $text = $balkInfo['bericht'];
                                                $naam = $balkInfo['naam'];
												$tekst1 = $balkInfo['tekst1'];
												$tekst2 = $balkInfo['tekst2'];
                                        }
	?>
	<!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">	
   <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="assets/style.css">
	  
<style>




</style>
 </head>
    <body style="background-color:#<?php if(isset($balkInfo) && trim($balkInfo['bg']) != '') { echo htmlentities($balkInfo['bg']); } ?>;">
	<center>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- side -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9106844814451489"
     data-ad-slot="2999842055"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>
	<div class="jumbotron m-1"><p><center><h1>Stuur een bericht!</h1></center></p>
	<?php
	if(isset($success) && $success) { ?>
                    
					<center><i class="fa fa-check fa-2x prefix"></i>
					<label for="form5"><?php if(isset($balkInfo) && trim($balkInfo['tekst1']) != '') { echo htmlentities($balkInfo['tekst1']); } ?></label></center>
					<?php
                    // echo '<meta http-equiv="refresh" content="1">';
                }
				?><?php
				if(isset($error) && $error) { ?>
                    <center><i class="fa fa-exclamation-triangle fa-2x prefix"></i>
					<label for="form5">Onjuist E-mail adres</label></center><?php
                    // echo '<meta http-equiv="refresh" content="1">';
                }
				?>
        <form action="" name="i-ReQuest" method="post" onsubmit="return checkform(this);"> 
        
               <div class="md-form">
                    <i class="fa fa-user-circle fa-2x prefix"></i>
                    <input type="text" ng-model="form.artiest" name="gastnaam" id="gastnaam" class="form-control" required="required" autocomplete="off">
                    <label for="form1">Naam</label>
               </div> 
                
               <div class="md-form">
                    <i class="fa fa-envelope fa-2x prefix"></i>
                    <input type="text" ng-model="form.nummer" name="gastemail" id="gastemail" class="form-control" required="required" autocomplete="off">
                    <label for="form2">E-mail adres:</label>
               </div>
                      
                       
       
               
               
               <div class="md-form">
                    <i class="fa fa-comment fa-2x prefix"></i>
                    <textarea type="text" onkeyup="countChars(this);" ng-model="form.messinger" name="bericht" id="form6" class="md-textarea faceText" autocomplete="off"></textarea>
					
                    <label for="form6">Uw bericht:<span id="charNum">500 tekens over</span></label>
					
               </div>

               <div class="md-form">
			   <i class="fa fa-lock fa-2x prefix"></i>


<label for="form6" id="CaptchaDiv"></label>


<br>

<input type="hidden" id="txtCaptcha">
<input type="text" name="CaptchaInput" id="CaptchaInput" class="md-textarea" size="15" value="" required="required" autocomplete="off"><br>

</div>
Typ het getal over:




             
 <input type=submit name='submit' value="Verstuur bericht" class="btn btn-success" />
			</form>
            </div> 
    <p><small> <center><br /><?php if(isset($balkInfo) && trim($balkInfo['tekst2']) != '') { echo htmlentities($balkInfo['tekst2']); } ?><br />
	(c)2013 - 2019<br>
            Powered by <a href="https://chattersworld.nl" target="_blank">Chattersworld</a></center></small></p>
       
 
   
</div>
		
	</fieldset>
	<div style="text-align: center">
		<br />
		
		<br />
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- side -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9106844814451489"
     data-ad-slot="2999842055"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	</div>
	
	<script src="assets/jquery.js"></script>    
<script src="assets/bootstrap.min.js"></script>
<script src="assets/materialize.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/jquery.emojiFace.js"></script>
<script type="text/javascript">
$(function(){

	$('.faceText').emojiInit({
		fontSize:16,
        success : function(data){

		},
        error : function(data,msg){
		}
	});
});
</script>

<script>
function countChars(obj){
    var maxLength = 500;
    var strLength = obj.value.length;
    var charRemain = (maxLength - strLength);
    
    if(charRemain < 0){
        document.getElementById("charNum").innerHTML = '<span style="color: red;">You have exceeded the limit of '+maxLength+' characters</span>';
    }else{
        document.getElementById("charNum").innerHTML = charRemain+' tekens over';
    }
}
</script>
<script type="text/javascript">

// Captcha Script

function checkform(theform){
var why = "";

if(theform.CaptchaInput.value == ""){
why += "- De CAPTCHA Code is vereist. Graag invullen.\n";
}
if(theform.CaptchaInput.value != ""){
if(ValidCaptcha(theform.CaptchaInput.value) == false){
why += "- De CAPTCHA Code komt niet Overéén.\n";
}
}
if(why != ""){
alert(why);
return false;
}
}

var a = Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';

var code = a + b + c + d + e;
document.getElementById("txtCaptcha").value = code;
document.getElementById("CaptchaDiv").innerHTML = code;

// Validate input against the generated number
function ValidCaptcha(){
var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
var str2 = removeSpaces(document.getElementById('CaptchaInput').value);
if (str1 == str2){
return true;
}else{
return false;
}
}

// Remove the spaces from the entered and generated code
function removeSpaces(string){
return string.split(' ').join('');
}
</script>
 
</body>