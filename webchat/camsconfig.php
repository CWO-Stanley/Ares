<script>
var params = {};
params.host                         = "irc.chattersworld.nl";
params.quitMessage					 = "Heeft op het rode kruisje in de hoek gedrukt, dus Bye Bye";
params.showNickPrefixes				= false;
params.showNickPrefixIcons = "true";
params.realname                     = "ChattersWorld.nl WebChat";
params.port                         = "7000";
params.policyPort                   = 8080;
<?php if(isset($playerInfo) && (trim($playerInfo['prive']) != '' || trim($playerInfo['prive']) == 'true')) : ?>params.enableQueries				= false; <?php endif; ?>
params.useUserListIcons				= true;
<?php if(isset($playerInfo) && trim($playerInfo['icons']) != '') : ?>params.iconPath						= "webchat/icons/<?php echo htmlspecialchars($playerInfo['icons']); ?>/"; <?php endif; ?>
params.accessKey 					= "P0015-D03EB-OMQXF-E9072-54BC6";
params.language                     = "nl";
<?php if(isset($playerInfo) && trim($playerInfo['style']) != '') : ?>
params.styleURL                     = "/webchat/css/<?php echo htmlspecialchars($playerInfo['style']); ?>.css";
<?php endif; ?>
params.webcam    					= true;
params.webcamPrivateOnly			= false;
<?php if(isset($playerInfo) && trim($playerInfo['webcam']) != '') : ?>params.webcamPublicOnly				= "<?php echo htmlspecialchars($playerInfo['webcam']); ?>"; <?php endif; ?>
params.rtmp							= "red5.chattersworld.nl:1935";
params.rtmfp = "rtmfp://p2p.rtmfp.net/18d96ebc7dc333692f2df89e-50f1956f126a/";
params.nick                         = "";
<?php if(isset($playerInfo) && trim($playerInfo['kanaalnaam']) != '') : ?>params.autojoin                     = "<?php echo htmlspecialchars($playerInfo['kanaalnaam']); ?>"; <?php endif; ?>
params.htmlentities					= "chan,nick";
<?php if(isset($playerInfo) && (trim($playerInfo['prive']) != '' || trim($playerInfo['prive']) == 'true')): ?>
params.perform                      = "/mode %nick% +D";
<?php endif; ?> 
params.timestampFormat		    = "[HH:mm:ss]";
params.identifyCommand		    = "/msg NickServ identify %pass%";
params.identifyMessage		    = "";
params.showServerWindow             = true;
params.showEmoticonsButton          = true;
params.showChannelCentral           = true;
params.showMenuButton	            = true;
params.showListButton               = true;
params.showNickChangeButton         = true;
params.showOptionsButton            = true;
params.showChannelCentralButton     = true;
params.showJoinChannelButton        = true;
params.showPartChannelButton        = true;
params.showNavigation	            = true;
params.showIdentifySelection        = true;
params.showNickSelection            = true;
params.showRegisterNicknameButton   = true;
params.showRegisterChannelButton    = true;
params.showUserListInformationPopup = true;
params.userListInformationPopupItems= "nick,realname,host";
params.performContinousWhoRequests  = true;
params.showNewQueriesInBackground   = false;
params.showInfoMessages             = true;
params.registreChannelCommand       = "/msg ChanServ register %channel%";
params.channelHeader                = "Kanaal: %channel% | Modes:[%mode%]| [%users%] Chatters | Onderwerp: %topic%";
params.navigationPosition           = "bottom";
params.emoticonPath = "webchat/emoticons/";
params.emoticonList				    = ":)->1.png,:(->2.png,;)->3.png,:P->4.png,:@->5.png,:D->6.png,:$->7.png,(H)->8.png,:O->9.png,(A)->10.png,;/->11.png,:'(->12.png,XD->13.png,(duivel)->14.png,(K)->15.png,(slapen)->16.png,:X->17.png,(blij)->18.png,(love)->19.png,(denken)->20.png,(nerd)->21.png,:|->22.png,(ziek)->23.png,(fluit)->24.png,(verlegen)->25.png,(crazy)->26.png,(moe)->27.png,:S->28.png,(foon)->29.png,(klok)->30.png,(L)->31.png,BRB->32.png,(8)->33.png,(mail)->34.png,(kado)->35.png,(bloem)->36.png"


params.rememberNickname			= "true";



/* This loop escapes % signs in parameters. You should not change it */
/* Use this method to send a command to lightIRC with JavaScript */
function sendCommand(command) {
  swfobject.getObjectById('lightIRC').sendCommand(command);
}

/* Use this method to send a message to the active chatwindow */
function sendMessageToActiveWindow(message) {
  swfobject.getObjectById('lightIRC').sendMessageToActiveWindow(message);
}

/* Use this method to set a random text input content in the active window */
function setTextInputContent(content) {
  swfobject.getObjectById('lightIRC').setTextInputContent(content);
}

/* This method gets called if you click on a nick in the chat area */
function onChatAreaClick(nick, ident, realname, channel, host) {
  //alert("onChatAreaClick: "+nick);
}

/* This method gets called if you use the parameter contextMenuExternalEvent */
function onContextMenuSelect(type, nick, ident, realname, channel, host) {
  alert("onContextMenuSelect: "+nick+" for type "+type);
}

/* This method gets called if you use the parameter loopServerCommands */
function onServerCommand(command) {
  return command;
}

/* This method gets called if you use the parameter loopClientCommands */
function onClientCommand(command) {
  return command;
}

/* This method gets called every time the user changes the active window */
function onActiveWindowChange(window) {
	//alert("Active window: "+window);
}

/* This event ensures that lightIRC sends the default quit message when the user closes the browser window */

window.onbeforeunload = function() {
  swfobject.getObjectById('lightIRC').sendQuit();
}

/* This loop escapes % signs in parameters. You should not change it */
for(var key in params) {
  params[key] = params[key].toString().replace(/%/g, "%25");
}
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-73408859-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-73408859-2', { 'anonymize_ip': true });
</script>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '311596215978856');
  fbq('track', 'Chattersworld');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=311596215978856&ev=Chattersworld&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->