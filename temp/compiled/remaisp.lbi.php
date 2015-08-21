<div class="lipinhui">
<ul>
 <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_34554100_1440040077');$this->_foreach['hot_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hot_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_34554100_1440040077']):
        $this->_foreach['hot_goods']['iteration']++;
?>
   <?php if ($this->_foreach['hot_goods']['iteration'] > 4 && $this->_foreach['hot_goods']['iteration'] < 6): ?>
<li>
<p> <a href="<?php echo $this->_var['goods_0_34554100_1440040077']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_34554100_1440040077']['name']); ?>"><?php echo $this->_var['goods_0_34554100_1440040077']['short_style_name']; ?></a></p>
<em class="snPrice">
         
           <?php if ($this->_var['goods_0_34554100_1440040077']['promote_price'] != ""): ?>
          <?php echo $this->_var['goods_0_34554100_1440040077']['promote_price']; ?>
          <?php else: ?>
          <?php echo $this->_var['goods_0_34554100_1440040077']['shop_price']; ?>
          <?php endif; ?>
         </em>
<div><a href="<?php echo $this->_var['goods_0_34554100_1440040077']['url']; ?>"><img src="<?php echo $this->_var['goods_0_34554100_1440040077']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_34554100_1440040077']['name']); ?>"  style="width:100px; height:100px;"/></a></div>
</li>
  <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
<div class="blank"></div>