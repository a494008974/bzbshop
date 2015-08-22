
<?php if ($this->_var['promotion_goods']): ?>
<div class="index_l  qianggou">
<ul>
<?php $_from = $this->_var['promotion_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_05070000_1440207364');$this->_foreach['no'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['no']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_05070000_1440207364']):
        $this->_foreach['no']['iteration']++;
?>
  <?php if ($this->_foreach['no']['iteration'] < 6): ?>
  <li class="goodsItem"  onmouseover="this.className='goodsItem goodsItem_on'" onmouseout="this.className='goodsItem'" <?php if (($this->_foreach['no']['iteration'] - 1) % 5 == 0): ?>  style='margin-left:0;'  <?php endif; ?>  >
		 <a href="<?php echo $this->_var['goods_0_05070000_1440207364']['url']; ?>"><img  src="<?php echo $this->_var['goods_0_05070000_1440207364']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_05070000_1440207364']['name']); ?>"  class="goodsimg"/></a>
		 <div class="pbg" ></div>
		 <p class="pb"><a href="<?php echo $this->_var['goods_0_05070000_1440207364']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_05070000_1440207364']['name']); ?>"><?php echo $this->_var['goods_0_05070000_1440207364']['short_style_name']; ?></a></p>
		 <span>抢购价<em class="snPrice"><?php echo $this->_var['goods_0_05070000_1440207364']['promote_price']; ?></em></span> 
  
        <span>折扣 <b style="font-size:14px"><?php echo $this->_var['goods_0_05070000_1440207364']['zhekou']; ?></b> 折 </span>

        
		<div id="time<?php echo $this->_var['goods_0_05070000_1440207364']['goods_id']; ?>" s="<?php echo $this->_var['goods_0_05070000_1440207364']['s_time']; ?>" e="<?php echo $this->_var['goods_0_05070000_1440207364']['e_time']; ?>" n="<?php echo $this->_var['goods_0_05070000_1440207364']['t_now']; ?>" class="timeBox">
         
         
         正在载入...
         </div>
</li>
  <?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
<script src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/my_lefttime.js"></script>
</div>
<?php endif; ?>

