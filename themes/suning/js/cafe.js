
//用于内容向上滚动,有停顿
/**startmarquee(一次滚动高度,速度,停留时间,元素ID);**/
function startmarquee(lh,speed,delay,obj){
var t;
var p=false;
var o=document.getElementById(obj);
o.innerHTML+=o.innerHTML;
o.onmouseover=function(){p=true}
o.onmouseout=function(){p=false}
o.scrollTop = 0;
function start(){
t=setInterval(scrolling,speed);
if(!p) o.scrollTop += 1;
}
function scrolling(){
if(o.scrollTop%lh!=0){
o.scrollTop += 1;
if(o.scrollTop>=o.scrollHeight/2) o.scrollTop = 0;
}else{
clearInterval(t);
setTimeout(start,delay);
}
}
setTimeout(start,delay);
}
//用于图片无间隙向上滚动
var pcScroll=
{
"speed":30,
"init":function(mid,mid1,mid2)
{
this.moveid=document.getElementById(mid);
this.moveid1=document.getElementById(mid1);
this.moveid2=document.getElementById(mid2);
this.moveid2.innerHTML=this.moveid1.innerHTML;
},
"marquee":function (){ 
if(pcScroll.moveid2.offsetTop-pcScroll.moveid.scrollTop<=0)//当滚动至demo1与demo2交界时 
pcScroll.moveid.scrollTop-=pcScroll.moveid1.offsetHeight  //demo跳到最顶端 
else{ 
pcScroll.moveid.scrollTop++ 
} 
},
"startmove":function()
{
var MyMar=setInterval(pcScroll.marquee,30)
this.moveid.onmouseover=function() {clearInterval(MyMar)}
this.moveid.onmouseout=function() {MyMar=setInterval(pcScroll.marquee,30)}
}	
};
;
