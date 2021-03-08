var params = {};
params.host                         = "irc.chattersworld.nl";
params.quitMessage					 = "Heeft op het rode kruisje in de hoek gedrukt, dus Bye Bye";
params.showNickPrefixes				= false;
params.showNickPrefixIcons = "true";
params.realname                     = "ChattersWorld.nl WebChat";
params.port                         = "6667";
params.policyPort                   = 8080;
params.enableQueries				= true;
params.useUserListIcons				= true;
params.iconPath						= "icons/";
params.accessKey 					= "P0015-D03EB-OMQXF-E9072-54BC6";
params.language                     = "nl";
params.styleURL                     = "css/red.css";
params.webcam    					= true;
params.webcamPrivateOnly			= false;
params.webcamVideoOnly  	  		= true;
params.webcamPublicOnly				= false;
params.rtmp							= "46.243.156.6:1935";
params.rtmfp = "rtmfp://p2p.rtmfp.net/18d96ebc7dc333692f2df89e-50f1956f126a/";
params.nick                         = "";
params.autojoin                     = "NightStar";
params.htmlentities					= "chan,nick";
params.perform                      = "";
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
params.emoticonPath = "emoticons/";
params.emoticonList				    = ":)->1.png,:(->2.png,;)->3.png,:P->4.png,:@->5.png,:D->6.png,:$->7.png,(H)->8.png,:O->9.png,(A)->10.png,;/->11.png,:'(->12.png,XD->13.png,(duivel)->14.png,(K)->15.png,(slapen)->16.png,:X->17.png,(blij)->18.png,(love)->19.png,(denken)->20.png,(nerd)->21.png,:|->22.png,(ziek)->23.png,(fluit)->24.png,(verlegen)->25.png,(crazy)->26.png,(moe)->27.png,:S->28.png,(foon)->29.png,(klok)->30.png,(L)->31.png,BRB->32.png,(8)->33.png,(mail)->34.png,(kado)->35.png,(bloem)->36.png"


params.rememberNickname			= "true";



/* This loop escapes % signs in parameters. You should not change it */
for(var key in params) {
  params[key] = params[key].toString().replace(/%/g, "%25");
}
window.onbeforeunload = function() {
  swfobject.getObjectById('lightIRC').sendQuit();
}