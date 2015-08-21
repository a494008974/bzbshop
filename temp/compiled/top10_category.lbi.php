  <div id="globalBest" class="box_1">

 <div class="h33"><span>热卖排行</span></div>
<div id="show_hot_area" class="itemGrid">
  
  
  <ul>
    <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['hot'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hot']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['hot']['iteration']++;
?>
     <?php if ($this->_foreach['hot_goods']['iteration'] < 6): ?>
 <li class="item ">
 
      <div class="pic">
	  <i class="iteration "><?php echo $this->_foreach['hot']['iteration']; ?></i>
	  <a href="<?php echo $this->_var['goods']['url']; ?>"><img style="width:60px; height:60px;" src="<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"/></a></div>
	  <div class="Info ">
      <p ><a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo $this->_var['goods']['short_style_name']; ?>  <span>  <?php echo $this->_var['goods']['brief']; ?></span></a></p> 
      
      <em   >
     <?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?>
        <?php endif; ?>
         
      </em>
	  </div>
     </li>
    <?php endif; ?>	
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
   </ul>  


  </div>
</div>