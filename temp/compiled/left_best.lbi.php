
<div id="topList" class="globalModule">
<div class="title "><span>精品推荐</span> </div>       
  <div class=" clearfix"   >

  
 <div class="f_l layLeft">
	<a href="#"><img src="themes/suning/images/best_in<?php echo $this->_var['category']; ?>.jpg" style="width:190px; height:450px;" /></a>
</div>
<div class="f_r layRight">
 <ul>
    <?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_24678600_1440040422');if (count($_from)):
    foreach ($_from AS $this->_var['goods_0_24678600_1440040422']):
?>

    <li>
     <a href="<?php echo $this->_var['goods_0_24678600_1440040422']['url']; ?>"><img style=" width:130px; height:130px;" src="<?php echo $this->_var['goods_0_24678600_1440040422']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_24678600_1440040422']['name']); ?>" /></a>
       
         <p><a href="<?php echo $this->_var['goods_0_24678600_1440040422']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_24678600_1440040422']['name']); ?>"><?php echo $this->_var['goods_0_24678600_1440040422']['short_style_name']; ?> <span><?php echo $this->_var['goods_0_24678600_1440040422']['brief']; ?></span></a></p>
     
      <em >
        <?php if ($this->_var['goods_0_24678600_1440040422']['promote_price'] != ""): ?>
       <span class="f1"><?php echo $this->_var['goods_0_24678600_1440040422']['promote_price']; ?></span>
        <?php else: ?>
        <span class="f1"><?php echo $this->_var['goods_0_24678600_1440040422']['shop_price']; ?></span>
        <?php endif; ?>
      </em>
        
     
     
    </li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

  </ul>
</div>
</div>
</div>