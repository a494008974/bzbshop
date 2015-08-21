<?php if ($this->_var['group_buy_goods']): ?>
<div class="box best_gd">
  <div class="best_gd_in ">

  
  
   <ul>
  <div  class="group_buy">

      <?php $_from = $this->_var['group_buy_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['group_buy_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['group_buy_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['group_buy_goods']['iteration']++;
?>
      <li class="goodsItem"  <?php if (($this->_foreach['group_buy_goods']['iteration'] - 1) % 5 == 0): ?>  style='margin-left:0;'  <?php endif; ?>  >

   
           <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" class="goodsimg" /></a>  
		   <div class="p_name"><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['short_style_name']); ?></a></div>
		   <div class="p_pirce">
                    <em class="snPrice">¥<?php echo $this->_var['goods']['last_price']; ?></em>
                    <a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank">我要团</a>
           </div>
        </li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

 </div>  
 
 </ul>

	
  </div>
	
</div>
 
<div class="blank"></div>

<?php endif; ?>