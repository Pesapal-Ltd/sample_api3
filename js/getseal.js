<!--
dn="www.pesapal.com";
lang="en";
tpt="opaque";
vrsn_style="WW";
splash_url="https://trustsealinfo.verisign.com";
seal_url="https://seal.verisign.com";

u1=splash_url+"/splash?form_file=fdf/splash.fdf&dn="+dn+"&lang="+lang;u2=seal_url+"/getseal?at=0&sealid=3&dn="+dn+"&lang="+lang;var sopener;function vrsn_splash(){if(sopener&&!sopener.closed){sopener.focus();}else{tbar="location=yes,status=yes,resizable=yes,scrollbars=yes,width=560,height=500";var sw=window.open(u1,'VRSN_Splash',tbar);if(sw){sw.focus();sopener=sw;}}}
var ver=-1;var v_ua=navigator.userAgent.toLowerCase();var re=new RegExp("msie ([0-9]{1,}[\.0-9]{0,})");if(re.exec(v_ua)!==null){ver=parseFloat(RegExp.$1);}
var v_old_ie=(v_ua.indexOf("msie")!=-1);if(v_old_ie){v_old_ie=ver<5;}
function v_mact(e){var s;if(document.addEventListener){s=(e.target.name=="seal");if(s){vrsn_splash();return false;}}else if(document.captureEvents){var tgt=e.target.toString();s=(tgt.indexOf("splash")!=-1);if(s){vrsn_splash();return false;}}
return true;}
function v_mDown(event){if(document.addEventListener){return true;}
event=event||window.event;if(event){if(event.button==1){if(v_old_ie){return true;}
else{vrsn_splash();return false;}}else if(event.button==2){vrsn_splash();return false;}}else{return true;}}
document.write("<a HREF=\"javascript:vrsn_splash()\" tabindex=\"-1\"><IMG NAME=\"seal\" BORDER=\"true\" SRC=\""+u2+"\" oncontextmenu=\"return false;\" alt=\"Click to Verify - This site has chosen an SSL Certificate to improve Web site security\"></A>");if((v_ua.indexOf("msie")!=-1)&&(ver>=7)){var plat=-1;var re=new RegExp("windows nt ([0-9]{1,}[\.0-9]{0,})");if(re.exec(v_ua)!==null){plat=parseFloat(RegExp.$1);}
if((plat>=5.1)&&(plat!=5.2)){document.write("<div style='display:none'>");document.write("<img src='https://extended-validation-ssl.verisign.com/dot_clear.gif'/>");document.write("</div>");}}
if(document.addEventListener){document.addEventListener('mouseup',v_mact,true);}
else{if(document.layers){document.captureEvents(Event.MOUSEDOWN);document.onmousedown=v_mact;}}
function v_resized(){if(pageWidth!=innerWidth||pageHeight!=innerHeight){self.history.go(0);}}
if(document.layers){pageWidth=innerWidth;pageHeight=innerHeight;window.onresize=v_resized;}
-->