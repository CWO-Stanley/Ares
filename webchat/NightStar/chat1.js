var params = {};
params.host                         = "irc.chattersweb.nl";
params.quitMessage				 = "Heeft op het rode kruisje in de hoek gedrukt, dus Bye Bye";
params.showNickPrefixes				= false;
params.showNickPrefixIcons 			= true;
params.realname                     = "ChatArmy.be WebChat";
params.port                         = "6667";
params.policyPort                   = 8080;
params.enableQueries				= true;
params.useUserListIcons				= true;
params.iconPath						= "icons/gbc/";
params.accessKey 					= "A8DFB-5EC1E-JTA4M-P6297-050BA";
params.language                     = "nl";
params.styleURL                     = "css/pink1.css";
params.webcam    					= true;
params.webcamPrivateOnly			= false;
params.webcamPublicOnly				= false;
params.rtmp							= "46.105.168.133:1935";
params.rtmfp = "rtmfp://p2p.rtmfp.net/18d96ebc7dc333692f2df89e-50f1956f126a/";
params.nick                         = "";
params.autojoin                     = "ChatArmy";
params.htmlentities					= "chan,nick";
params.timestampFormat				= "[HH:mm:ss]";
params.perform                      = "";
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
params.rememberNickname				= true;
params.userListInformationPopupItems= "nick,realname,host";
params.performContinousWhoRequests  = true;
params.showNewQueriesInBackground   = false;
params.showInfoMessages             = true;
params.identifyMessage              = "";
params.identifyCommand				= "/msg nickserv identify %pass%";
params.registreChannelCommand       = "/msg ChanServ register %channel% %description%";
params.channelHeader                = "Kanaal: %channel% | Modes:[%mode%]| [%users%] Chatters | Onderwerp: %topic%";
params.navigationPosition           = "bottom";
params.emoticonPath					= "emoticons/";
params.emoticonList = ":)->1.gif,:(->2.gif,;)->3.gif,:@->4.gif,:S->5.gif,:|->6.gif,(A)->7.gif,:O->8.gif,:D->9.gif,:P->10.gif,;'(->11.gif,(vloeken)->12.gif,(ziek)->13.gif,(duivel)->14.gif,(gek)->15.gif,(Y)->16.gif,(N)->17.gif,(F)->18.gif,(W)->19.gif,(lief)->20.gif,(verliefd)->21.gif,(zwaaien)->22.gif,(feest)->23.gif,(kado)->24.gif,(roken)->25.gif,(eten)->26.gif,(H)->27.gif,(ja)->28.gif,(gapen)->29.gif,(hond)->30.gif,(kat)->31.gif,(liegen)->32.gif,(loser)->33.gif,(dans)->34.gif,(K)->35.gif,(klok)->36.gif,(L)->37.gif,(U)->38.gif,(verbaasd)->39.gif,(8)->40.gif,(voetbal)->41.gif,xd->42.gif,(telefoon)->43.gif,(mobiel)->44.gif,(regen)->45.gif,:$->46.gif,(fjoew)->47.gif,(praten)->48.gif,(knor)->49.gif,(moehhh)->50.gif,(c)->tmf.png";
/* This loop escapes % signs in parameters. You should not change it */
for(var key in params) {
  params[key] = params[key].toString().replace(/%/g, "%25");
}
/* This event ensures that lightIRC sends the default quit message when the user closes the browser window */
window.onbeforeunload = function() {
  swfobject.getObjectById('lightIRC').sendQuit();
}

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