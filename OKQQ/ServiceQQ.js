document.write("<div class='QQbox' id='divQQbox' >");
document.write("<div class='Qlist' id='divOnline' onmouseout='hideMsgBox(event);' style='display : none;'>");
document.write("<div class='t'></div>");

document.write("<div class='con'>");
document.write("<div class='welcome'>欢迎来到百信手机商城！</div>");
document.write("<div class='f_l'><div class='tit'>百信客服咨询：</div><div class='bod'><a href='#' target='_blank'><img src='OKQQ/images/img.gif'  border='0'  /></a></div></div>");
document.write("<ul class='f_r'><div class='tit'>QQ咨询：</div>");
document.write("<li class=odd>客服-阳光：<a href='http://wpa.qq.com/msgrd?V=1&amp;Uin=123456&amp;Site=QQ咨询&amp;Menu=yes' target='_blank'><img src=' OKQQ/images/on.gif'  border='0' alt='QQ' /></a></li>");
document.write("<li class=odd>客服-微笑：<a href='http://wpa.qq.com/msgrd?V=1&amp;Uin=123456&amp;Site=QQ咨询&amp;Menu=yes' target='_blank'><img src=' OKQQ/images/on.gif'  border='0' alt='QQ' /></a></li>");
document.write("<li class=odd>客服-满意：<a href='http://wpa.qq.com/msgrd?V=1&amp;Uin=123456&amp;Site=QQ咨询&amp;Menu=yes' target='_blank'><img src=' OKQQ/images/on.gif'  border='0' alt='QQ' /></a></li>");
document.write("<li class=odd>客服-甜美：<a href='http://wpa.qq.com/msgrd?V=1&amp;Uin=123456&amp;Site=QQ咨询&amp;Menu=yes' target='_blank'><img src=' OKQQ/images/on.gif'  border='0' alt='QQ' /></a></li>");
document.write("</ul>");
document.write("<div class='blank'></div>");
document.write("<div class='zixun'><div class='tit2'>咨询热线：</div><div class='bod'>0731-85813947<br/>0731-88640958</div></div>");

document.write("<div class='hui'>百信商城 厂家网上直销平台</div>");
document.write("<div class='blank'></div>");
document.write("</div>");

document.write("<div class='b'></div>");

document.write("</div>");

document.write("<div id='divMenu' onmouseover='OnlineOver();'><img src='OKQQ/images/qq_1.gif' class='press' alt='在线咨询'></div>");

document.write("</div>");



//<![CDATA[

var tips; var theTop = 145/*这是默认高度,越大越往下*/; var old = theTop;

function initFloatTips() {

tips = document.getElementById('divQQbox');

moveTips();

};

function moveTips() {

var tt=50;

if (window.innerHeight) {

pos = window.pageYOffset

}

else if (document.documentElement && document.documentElement.scrollTop) {

pos = document.documentElement.scrollTop

}

else if (document.body) {

pos = document.body.scrollTop;

}

pos=pos-tips.offsetTop+theTop;

pos=tips.offsetTop+pos/10;



if (pos < theTop) pos = theTop;

if (pos != old) {

tips.style.top = pos+"px";

tt=10;

//alert(tips.style.top);

}



old = pos;

setTimeout(moveTips,tt);

}

//!]]>

initFloatTips();







function OnlineOver(){

document.getElementById("divMenu").style.display = "none";

document.getElementById("divOnline").style.display = "block";

document.getElementById("divQQbox").style.width = "247px";

}



function OnlineOut(){

document.getElementById("divMenu").style.display = "block";

document.getElementById("divOnline").style.display = "none";



}



if(typeof(HTMLElement)!="undefined")    //给firefox定义contains()方法，ie下不起作用
{   
      HTMLElement.prototype.contains=function(obj)   
      {   
          while(obj!=null&&typeof(obj.tagName)!="undefind"){ //通过循环对比来判断是不是obj的父元素
   　　　　if(obj==this) return true;   
   　　　　obj=obj.parentNode;
   　　}   
          return false;   
      };   
}  


function hideMsgBox(theEvent){ //theEvent用来传入事件，Firefox的方式

　 if (theEvent){

　 var browser=navigator.userAgent; //取得浏览器属性

　 if (browser.indexOf("Firefox")>0){ //如果是Firefox

　　 if (document.getElementById('divOnline').contains(theEvent.relatedTarget)) { //如果是子元素

　　 return; //结束函式

} 

} 

if (browser.indexOf("MSIE")>0){ //如果是IE

if (document.getElementById('divOnline').contains(event.toElement)) { //如果是子元素

return; //结束函式

}

}

}

/*要执行的操作*/

document.getElementById("divMenu").style.display = "block";

document.getElementById("divOnline").style.display = "none";

}









   