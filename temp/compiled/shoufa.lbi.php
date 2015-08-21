<div class="shoufa">
<ul>
  <?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_34297200_1440040077');$this->_foreach['new_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['new_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_34297200_1440040077']):
        $this->_foreach['new_goods']['iteration']++;
?>
     <?php if ($this->_foreach['new_goods']['iteration'] > 4 && $this->_foreach['new_goods']['iteration'] < 7): ?>
 <li >
 <div class="goodsItem">
  <a href="<?php echo $this->_var['goods_0_34297200_1440040077']['url']; ?>"><img src="<?php echo $this->_var['goods_0_34297200_1440040077']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_34297200_1440040077']['name']); ?>" class="goodsimg" /></a> 
  </div>  
   <div class="tit"><a href="<?php echo $this->_var['goods_0_34297200_1440040077']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_34297200_1440040077']['name']); ?>"><?php echo sub_str($this->_var['goods_0_34297200_1440040077']['short_style_name'],12); ?> </a> </div>
   
   <p> <?php echo $this->_var['goods_0_34297200_1440040077']['brief']; ?></p>
	
        </li>
          <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

</ul>
</div>