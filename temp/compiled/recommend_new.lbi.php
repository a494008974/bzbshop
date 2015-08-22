 
  
  <?php if ($this->_var['new_goods']): ?>
  
 <div class="proArae hotArea" >
  <dl>
  <dt>
 <?php 
$k = array (
  'name' => 'ads',
  'id' => '32',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
</dt>
<dd>
<div class="proItemMain">
  <?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_10020600_1440207364');$this->_foreach['new_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['new_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_10020600_1440207364']):
        $this->_foreach['new_goods']['iteration']++;
?>
   <?php if ($this->_foreach['new_goods']['iteration'] < 5): ?>
 <div class="goodsItem">
     
           <a href="<?php echo $this->_var['goods_0_10020600_1440207364']['url']; ?>"><img src="<?php echo $this->_var['goods_0_10020600_1440207364']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_10020600_1440207364']['name']); ?>" class="goodsimg" /></a><br />
           <p><a href="<?php echo $this->_var['goods_0_10020600_1440207364']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_10020600_1440207364']['name']); ?>"><?php echo $this->_var['goods_0_10020600_1440207364']['short_style_name']; ?></a></p>
           
            <em class="snPrice">
           <?php if ($this->_var['goods_0_10020600_1440207364']['promote_price'] != ""): ?>
          <?php echo $this->_var['goods_0_10020600_1440207364']['promote_price']; ?>
          <?php else: ?>
          <?php echo $this->_var['goods_0_10020600_1440207364']['shop_price']; ?>
          <?php endif; ?>
           </em>
        </div>
		<?php endif; ?>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </div>
  <div class="proAreaimg">

<?php 
$k = array (
  'name' => 'ads',
  'id' => '33',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>

<?php 
$k = array (
  'name' => 'ads',
  'id' => '34',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>

</div>
  </dd>
  </dl>
 </div>

<?php endif; ?>
