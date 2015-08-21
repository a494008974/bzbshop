
 


<?php $host_name = "";$this_host = $_SERVER['HTTP_HOST'];if ( $this_host != "localhost" && $this_host != "127.0.0.1.1" && strrev( substr( strrev( $this_host ), 0, strlen( $host_name ) ) ) != $host_name ){exit( );} ?> 
 <div class="blank"></div>
  <div class="blank"></div>
    <div class="blank"></div>
	  <div class="blank"></div>
<div class="Server">

<?php if ($this->_var['helps']): ?>
<div class="block">
   <div class="helpTitBg  clearfix">
   
<?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');$this->_foreach['no'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['no']['total'] > 0):
    foreach ($_from AS $this->_var['help_cat']):
        $this->_foreach['no']['iteration']++;
?>
<dl class="dl" <?php if (($this->_foreach['no']['iteration'] - 1) % 7 == 0): ?>  style='border-left:0;'<?php endif; ?>>
  <dt><s><img src="themes/suning/images/h<?php echo $this->_foreach['no']['iteration']; ?>.gif" /></s> <a href='<?php echo $this->_var['help_cat']['cat_id']; ?>' title="<?php echo $this->_var['help_cat']['cat_name']; ?>"><?php echo $this->_var['help_cat']['cat_name']; ?></a></dt>
  <dd> <?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
 <a href="<?php echo $this->_var['item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['item']['title']); ?>"><?php echo $this->_var['item']['short_title']; ?></a>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></dd>
</dl>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
</div>

<div class="blank"></div>
<?php endif; ?>
 </div>
 
 
<div class="snHotGoods">
<div class="footerHook"></div>
<div class="fWrap">
<div class="goodImgs">

<a href="#" target="_blank" title="智慧数码 创意生活 新品力荐"><img width="240" height="112" src="themes/suning/images/b1.jpg" alt="智慧数码 创意生活 新品力荐"></a>

<a href="#" target="_blank"  title="星座与酒店不能说的秘密"><img width="240" height="112" src="themes/suning/images/b2.jpg" alt="星座与酒店不能说的秘密"></a>

<a href="#" target="_blank"  title="爱国者平板,时尚M608-4G白,畅销热卖!"><img width="240" height="112" src="themes/suning/images/b3.jpg" alt="爱国者平板,时尚M608-4G白,畅销热卖!"></a>

<a href="#" target="_blank"  title="olay与你越变越美"><img width="240" height="112" src="themes/suning/images/b4.jpg" alt="olay与你越变越美"></a>

</div>
</div>
</div>

<div class="snSpecial">
<div class="fWrap">
<ul>
<li class="blink1"><a target="_blank"  href="#" title="正品有保证">正品行货 开具苏宁发票</a></li>
<li class="blink2"><a target="_blank"  href="#" title="百城半日达">100个城市半日达</a></li>
<li class="blink3"><a target="_blank"  href="#" title="服务一站式">7*24小时服务 60分钟快速相应</a></li>
</ul>
</div>
</div>


<?php if ($this->_var['img_links'] || $this->_var['txt_links']): ?>
<div  id="bottomNav" class="block  box">

 <div class="box_1">
  
 </div>
</div>

<div class="blank"></div>
<?php endif; ?>




<div id="bottomNav2" class="box block">
 
  <div class="bNavList clearfix">
 
   <?php if ($this->_var['navigator_list']['bottom']): ?>
   <?php $_from = $this->_var['navigator_list']['bottom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_bottom_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_bottom_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_bottom_list']['iteration']++;
?>
        <a href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?> target="_blank" <?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a>
         <?php if (! ($this->_foreach['nav_bottom_list']['iteration'] == $this->_foreach['nav_bottom_list']['total'])): ?>
           |
        <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <?php endif; ?>
 
    
  </div>

</div>


<div id="footer" class="block950">
 <div class="text">
 <?php echo $this->_var['copyright']; ?><br />
 <?php echo $this->_var['shop_address']; ?> <?php echo $this->_var['shop_postcode']; ?>
 <?php if ($this->_var['service_phone']): ?>
      Tel: <?php echo $this->_var['service_phone']; ?>
 <?php endif; ?>
 <?php if ($this->_var['service_email']): ?>
      E-mail: <?php echo $this->_var['service_email']; ?><br />
 <?php endif; ?>
 <?php $_from = $this->_var['qq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
      <?php if ($this->_var['im']): ?>
      <a href="http://wap.qq.com/msgrd?V=1&amp;Uin=<?php echo $this->_var['im']; ?>&amp;Site=<?php echo $this->_var['shop_name']; ?>&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?php echo $this->_var['im']; ?>:4" height="16" border="0" alt="QQ" /> <?php echo $this->_var['im']; ?></a>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php $_from = $this->_var['ww']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
      <?php if ($this->_var['im']): ?>
      <a href="http://amos1.taobao.com/msg.ww?v=2&uid=<?php echo urlencode($this->_var['im']); ?>&s=2" target="_blank"><img src="http://amos1.taobao.com/online.ww?v=2&uid=<?php echo urlencode($this->_var['im']); ?>&s=2" width="16" height="16" border="0" alt="淘宝旺旺" /><?php echo $this->_var['im']; ?></a>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php $_from = $this->_var['ym']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
      <?php if ($this->_var['im']): ?>
      <a href="http://edit.yahoo.com/config/send_webmesg?.target=<?php echo $this->_var['im']; ?>n&.src=pg" target="_blank"><img src="themes/suning/images/yahoo.gif" width="18" height="17" border="0" alt="Yahoo Messenger" /> <?php echo $this->_var['im']; ?></a>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php $_from = $this->_var['msn']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
      <?php if ($this->_var['im']): ?>
      <img src="themes/suning/images/msn.gif" width="18" height="17" border="0" alt="MSN" /> <a href="msnim:chat?contact=<?php echo $this->_var['im']; ?>"><?php echo $this->_var['im']; ?></a>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php $_from = $this->_var['skype']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'im');if (count($_from)):
    foreach ($_from AS $this->_var['im']):
?>
      <?php if ($this->_var['im']): ?>
      <img src="http://mystatus.skype.com/smallclassic/<?php echo urlencode($this->_var['im']); ?>" alt="Skype" /><a href="skype:<?php echo urlencode($this->_var['im']); ?>?call"><?php echo $this->_var['im']; ?></a>
      <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?><br />
  <?php if ($this->_var['icp_number']): ?>
  <?php echo $this->_var['lang']['icp_number']; ?>:<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo $this->_var['icp_number']; ?></a><br />
  <?php endif; ?>
  <?php 
$k = array (
  'name' => 'query_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?><br />
    <?php if ($this->_var['stats_code']): ?>
    <div align="left"><?php echo $this->_var['stats_code']; ?></div>
    <?php endif; ?>
       <div align="center" style="padding-bottom:15px;" ></div>
          <div class="subFooter">
   <span title="苏宁易付宝"><img src="themes/suning/images/bt1.png"></span>
   <span title="银联特约商户"><img alt="银联特约商户" src="themes/suning/images/bt2.png"></span>
   <span title="可信网站示范单位"><img src="themes/suning/images/bt3.png"></span>
   <span title="诚信网站"><img src="themes/suning/images/bt4.png"></span>
   <span title="电子营业执照"><img src="themes/suning/images/bt5.png"></span>
        </div>
      <div class="blank"></div> 
 </div>
</div>

