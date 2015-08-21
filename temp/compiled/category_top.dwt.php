<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="BZB v2.7.3" /><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<?php if ($this->_var['cat_style']): ?>
<link href="<?php echo $this->_var['cat_style']; ?>" rel="stylesheet" type="text/css" />
<?php endif; ?>
<style type="text/css">
<!--
#globalRight img{float:left}
-->
</style>
  <?php echo $this->smarty_insert_scripts(array('files'=>'common.js,index.js')); ?>  
<script src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/jquery-1.2.6.pack.js"></script>
<script src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/g.base.js"></script>
 <SCRIPT type=text/javascript>
window.pageConfig={
	compatible:true,
	navId:"home"
};
</SCRIPT>
</head>
<body>
 
<?php echo $this->fetch('library/page_header.lbi'); ?>

<div class="block clearfix">
  

<div class="AreaL AreaL1">
  <?php echo $this->fetch('library/category_tree2b.lbi'); ?>
</div>
	  <div class="AreaM">      
      
 <div  id="idTransformView">
  <ul class="slider" id="idSlider">
    <li>
    <div class="w">
    <?php
if($_REQUEST['id'])
{
$id = $_REQUEST['id'];
}else{
$id = $_REQUEST['category'];
}
$sql = "select ap.ad_width,ap.ad_height,ad.ad_name,ad.ad_code,ad.ad_link from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ad.ad_name='".'cate_imgw1'."_".$id."' and ad.media_type=0 and UNIX_TIMESTAMP()>ad.start_time and UNIX_TIMESTAMP()<ad.end_time and ad.enabled=1";
$res = $GLOBALS['db']->getAll($sql);
foreach($res AS $v)
{                      
echo  "<a href='".$v['ad_link']."' target='_blank'><img src='data/afficheimg/".$v['ad_code']."' width='".$v['ad_width']."' height='".$v['ad_height']."' /></a>";
}
?>
</div>
    <div class="s"><?php
if($_REQUEST['id'])
{
$id = $_REQUEST['id'];
}else{
$id = $_REQUEST['category'];
}
$sql = "select ap.ad_width,ap.ad_height,ad.ad_name,ad.ad_code,ad.ad_link from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ad.ad_name='".'cate_imgs1'."_".$id."' and ad.media_type=0 and UNIX_TIMESTAMP()>ad.start_time and UNIX_TIMESTAMP()<ad.end_time and ad.enabled=1";
$res = $GLOBALS['db']->getAll($sql);
foreach($res AS $v)
{                      
echo  "<a href='".$v['ad_link']."' target='_blank'><img src='data/afficheimg/".$v['ad_code']."' width='".$v['ad_width']."' height='".$v['ad_height']."' /></a>";
}
?></div>
    </li>
    <li>
     <div class="w">
    <?php
if($_REQUEST['id'])
{
$id = $_REQUEST['id'];
}else{
$id = $_REQUEST['category'];
}
$sql = "select ap.ad_width,ap.ad_height,ad.ad_name,ad.ad_code,ad.ad_link from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ad.ad_name='".'cate_imgw2'."_".$id."' and ad.media_type=0 and UNIX_TIMESTAMP()>ad.start_time and UNIX_TIMESTAMP()<ad.end_time and ad.enabled=1";
$res = $GLOBALS['db']->getAll($sql);
foreach($res AS $v)
{                      
echo  "<a href='".$v['ad_link']."' target='_blank'><img src='data/afficheimg/".$v['ad_code']."' width='".$v['ad_width']."' height='".$v['ad_height']."' /></a>";
}
?>
</div>
    <div class="s"><?php
if($_REQUEST['id'])
{
$id = $_REQUEST['id'];
}else{
$id = $_REQUEST['category'];
}
$sql = "select ap.ad_width,ap.ad_height,ad.ad_name,ad.ad_code,ad.ad_link from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ad.ad_name='".'cate_imgs2'."_".$id."' and ad.media_type=0 and UNIX_TIMESTAMP()>ad.start_time and UNIX_TIMESTAMP()<ad.end_time and ad.enabled=1";
$res = $GLOBALS['db']->getAll($sql);
foreach($res AS $v)
{                      
echo  "<a href='".$v['ad_link']."' target='_blank'><img src='data/afficheimg/".$v['ad_code']."' width='".$v['ad_width']."' height='".$v['ad_height']."' /></a>";
}
?></div>
</li>
    <li>
     <div class="w">
    <?php
if($_REQUEST['id'])
{
$id = $_REQUEST['id'];
}else{
$id = $_REQUEST['category'];
}
$sql = "select ap.ad_width,ap.ad_height,ad.ad_name,ad.ad_code,ad.ad_link from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ad.ad_name='".'cate_imgw3'."_".$id."' and ad.media_type=0 and UNIX_TIMESTAMP()>ad.start_time and UNIX_TIMESTAMP()<ad.end_time and ad.enabled=1";
$res = $GLOBALS['db']->getAll($sql);
foreach($res AS $v)
{                      
echo  "<a href='".$v['ad_link']."' target='_blank'><img src='data/afficheimg/".$v['ad_code']."' width='".$v['ad_width']."' height='".$v['ad_height']."' /></a>";
}
?>
</div>
    <div class="s"><?php
if($_REQUEST['id'])
{
$id = $_REQUEST['id'];
}else{
$id = $_REQUEST['category'];
}
$sql = "select ap.ad_width,ap.ad_height,ad.ad_name,ad.ad_code,ad.ad_link from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ad.ad_name='".'cate_imgs3'."_".$id."' and ad.media_type=0 and UNIX_TIMESTAMP()>ad.start_time and UNIX_TIMESTAMP()<ad.end_time and ad.enabled=1";
$res = $GLOBALS['db']->getAll($sql);
foreach($res AS $v)
{                      
echo  "<a href='".$v['ad_link']."' target='_blank'><img src='data/afficheimg/".$v['ad_code']."' width='".$v['ad_width']."' height='".$v['ad_height']."' /></a>";
}
?></div>
    </li>
    <li>
     <div class="w">
    <?php
if($_REQUEST['id'])
{
$id = $_REQUEST['id'];
}else{
$id = $_REQUEST['category'];
}
$sql = "select ap.ad_width,ap.ad_height,ad.ad_name,ad.ad_code,ad.ad_link from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ad.ad_name='".'cate_imgw4'."_".$id."' and ad.media_type=0 and UNIX_TIMESTAMP()>ad.start_time and UNIX_TIMESTAMP()<ad.end_time and ad.enabled=1";
$res = $GLOBALS['db']->getAll($sql);
foreach($res AS $v)
{                      
echo  "<a href='".$v['ad_link']."' target='_blank'><img src='data/afficheimg/".$v['ad_code']."' width='".$v['ad_width']."' height='".$v['ad_height']."' /></a>";
}
?>
</div>
    <div class="s"><?php
if($_REQUEST['id'])
{
$id = $_REQUEST['id'];
}else{
$id = $_REQUEST['category'];
}
$sql = "select ap.ad_width,ap.ad_height,ad.ad_name,ad.ad_code,ad.ad_link from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ad.ad_name='".'cate_imgs4'."_".$id."' and ad.media_type=0 and UNIX_TIMESTAMP()>ad.start_time and UNIX_TIMESTAMP()<ad.end_time and ad.enabled=1";
$res = $GLOBALS['db']->getAll($sql);
foreach($res AS $v)
{                      
echo  "<a href='".$v['ad_link']."' target='_blank'><img src='data/afficheimg/".$v['ad_code']."' width='".$v['ad_width']."' height='".$v['ad_height']."' /></a>";
}
?></div>
    </li>
    <li>
     <div class="w">
    <?php
if($_REQUEST['id'])
{
$id = $_REQUEST['id'];
}else{
$id = $_REQUEST['category'];
}
$sql = "select ap.ad_width,ap.ad_height,ad.ad_name,ad.ad_code,ad.ad_link from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ad.ad_name='".'cate_imgw5'."_".$id."' and ad.media_type=0 and UNIX_TIMESTAMP()>ad.start_time and UNIX_TIMESTAMP()<ad.end_time and ad.enabled=1";
$res = $GLOBALS['db']->getAll($sql);
foreach($res AS $v)
{                      
echo  "<a href='".$v['ad_link']."' target='_blank'><img src='data/afficheimg/".$v['ad_code']."' width='".$v['ad_width']."' height='".$v['ad_height']."' /></a>";
}
?>
</div>
    <div class="s"><?php
if($_REQUEST['id'])
{
$id = $_REQUEST['id'];
}else{
$id = $_REQUEST['category'];
}
$sql = "select ap.ad_width,ap.ad_height,ad.ad_name,ad.ad_code,ad.ad_link from ".$GLOBALS['ecs']->table('ad_position')." as ap left join ".$GLOBALS['ecs']->table('ad')." as ad on ad.position_id = ap.position_id where ad.ad_name='".'cate_imgs5'."_".$id."' and ad.media_type=0 and UNIX_TIMESTAMP()>ad.start_time and UNIX_TIMESTAMP()<ad.end_time and ad.enabled=1";
$res = $GLOBALS['db']->getAll($sql);
foreach($res AS $v)
{                      
echo  "<a href='".$v['ad_link']."' target='_blank'><img src='data/afficheimg/".$v['ad_code']."' width='".$v['ad_width']."' height='".$v['ad_height']."' /></a>";
}
?></div>
    
    </li>
  </ul>
  <ul class="num" id="idNum">
    <li>1</li>
    <li>2</li>
    <li>3</li>
    <li>4</li>
    <li>5</li>
  </ul>
</div>
<script type="text/javascript">
var $ = function (id) {
	return "string" == typeof id ? document.getElementById(id) : id;
};

var Class = {
  create: function() {
	return function() {
	  this.initialize.apply(this, arguments);
	}
  }
}

Object.extend = function(destination, source) {
	for (var property in source) {
		destination[property] = source[property];
	}
	return destination;
}

var TransformView = Class.create();
TransformView.prototype = {
  //容器对象,滑动对象,切换参数,切换数量
  initialize: function(container, slider, parameter, count, options) {
	if(parameter <= 0 || count <= 0) return;
	var oContainer = $(container), oSlider = $(slider), oThis = this;

	this.Index = 0;//当前索引
	
	this._timer = null;//定时器
	this._slider = oSlider;//滑动对象
	this._parameter = parameter;//切换参数
	this._count = count || 0;//切换数量
	this._target = 0;//目标参数
	
	this.SetOptions(options);
	
	this.Up = !!this.options.Up;
	this.Step = Math.abs(this.options.Step);
	this.Time = Math.abs(this.options.Time);
	this.Auto = !!this.options.Auto;
	this.Pause = Math.abs(this.options.Pause);
	this.onStart = this.options.onStart;
	this.onFinish = this.options.onFinish;
	
	oContainer.style.overflow = "hidden";
	oContainer.style.position = "relative";
	
	oSlider.style.position = "absolute";
	oSlider.style.top = oSlider.style.left = 0;
  },
  //设置默认属性
  SetOptions: function(options) {
	this.options = {//默认值
		Up:			true,//是否向上(否则向左)
		Step:		5,//滑动变化率
		Time:		10,//滑动延时
		Auto:		true,//是否自动转换
		Pause:		2000,//停顿时间(Auto为true时有效)
		onStart:	function(){},//开始转换时执行
		onFinish:	function(){}//完成转换时执行
	};
	Object.extend(this.options, options || {});
  },
  //开始切换设置
  Start: function() {
	if(this.Index < 0){
		this.Index = this._count - 1;
	} else if (this.Index >= this._count){this.Index = 0;}
	
	this._target = -1 * this._parameter * this.Index;
	this.onStart();
	this.Move();
  },
  //移动
  Move: function() {
	clearTimeout(this._timer);
	var oThis = this, style = this.Up ? "top" : "left", iNow = parseInt(this._slider.style[style]) || 0, iStep = this.GetStep(this._target, iNow);
	
	if (iStep != 0) {
		this._slider.style[style] = (iNow + iStep) + "px";
		this._timer = setTimeout(function(){oThis.Move();}, this.Time);
	} else {
		this._slider.style[style] = this._target + "px";
		this.onFinish();
		if (this.Auto) { this._timer = setTimeout(function(){oThis.Index++; oThis.Start();}, this.Pause); }
	}
  },
  //获取步长
  GetStep: function(iTarget, iNow) {
	var iStep = (iTarget - iNow) / this.Step;
	if (iStep == 0) return 0;
	if (Math.abs(iStep) < 1) return (iStep > 0 ? 1 : -1);
	return iStep;
  },
  //停止
  Stop: function(iTarget, iNow) {
	clearTimeout(this._timer);
	this._slider.style[this.Up ? "top" : "left"] = this._target + "px";
  }
};

window.onload=function(){
	function Each(list, fun){
		for (var i = 0, len = list.length; i < len; i++) {fun(list[i], i);}
	};
	
	var objs = $("idNum").getElementsByTagName("li");
	
	var tv = new TransformView("idTransformView", "idSlider", 340, 5, {
		onStart : function(){ Each(objs, function(o, i){o.className = tv.Index == i ? "on" : "";}) }//按钮样式
	});
	
	tv.Start();
	
	Each(objs, function(o, i){
		o.onmouseover = function(){
			o.className = "on";
			tv.Auto = false;
			tv.Index = i;
			tv.Start();
		}
		o.onmouseout = function(){
			o.className = "";
			tv.Auto = true;
			tv.Start();
		}
	})
	
	 
}
</script>
    
 
	   <?php echo $this->fetch('library/brands.lbi'); ?>

    

<div class="blank"></div>

</div> 
<div class="AreaL AreaL1" style="float:right; width:240px;" >
    <div id="newArticle" class="globalModule" style="border:1px solid #ddd">
        <h3 class="h33"><span>站内快讯</span></h3>
           <div>
        <div class="new_categry">
         <ul>
	
        <?php $_from = $this->_var['new_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
			 <li>
        <a href="<?php echo $this->_var['article']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>">·<?php echo $this->_var['article']['short_title']; ?></a>
        </li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		
		</ul>
   </div> </div>
    </div> 
   <?php echo $this->fetch('library/top10_category.lbi'); ?> 
   
          
</div>
  <div class="block">   
  
<div class="blank"></div>
   
   
          
          
          
     

 
<?php echo $this->fetch('library/left_best.lbi'); ?>    





<div class="blank"></div>

<?php $_from = $this->_var['cate_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate_goods_0_17538300_1440040422');$this->_foreach['no1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['no1']['total'] > 0):
    foreach ($_from AS $this->_var['cate_goods_0_17538300_1440040422']):
        $this->_foreach['no1']['iteration']++;
?>
 
 
 
 <div class="categirht_box">
 
 
<div id="globalBest" class="globalModule">

<div class="title "><span><?php echo htmlspecialchars($this->_var['cate_goods_0_17538300_1440040422']['name']); ?></span> <a class="f_r"  href="<?php echo $this->_var['cate_goods_0_17538300_1440040422']['url']; ?>" >更多商品>></a></div>   
 <div class=" clearfix"   >

<div class="f_l layLeft">
	<a href="<?php echo $this->_var['cate_goods_0_17538300_1440040422']['url']; ?>"><img src="themes/suning/images/cate_in<?php echo $this->_var['category']; ?>_<?php echo $this->_foreach['no1']['iteration']; ?>.jpg"  style="width:190px; height:450px;" /></a>
</div>

<div id="show_best_area" class="f_r layRight" > 

      <ul>
    
          <?php $_from = $this->_var['cate_goods_0_17538300_1440040422']['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['no'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['no']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['no']['iteration']++;
?>
           <?php if ($this->_foreach['no']['iteration'] < 11): ?>
          
  <li>
           <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" style=" width:130px; height:130px;" /></a>
            <p ><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['short_name']); ?> <span><?php echo $this->_var['goods']['brief']; ?></span></a></p>
            <em >
           <?php if ($this->_var['goods']['promote_price'] != ""): ?>
           <span class="f1"><?php echo $this->_var['goods']['promote_price']; ?></span>
          <?php else: ?>
          <span class="f1"><?php echo $this->_var['goods']['shop_price']; ?></span>
          <?php endif; ?>
          </em>
        </li>
            <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    
    
    </ul>
    
    
   </div>


</div> 


</div> 

 
 
 
 
 </div>
 
 

<div class="blank5"></div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>








  <div class="blank"></div>





  </div>  
  

  </div>   
 
    <?php echo $this->fetch('library/page_footer.lbi'); ?>
 
 
</body>
</html>
