
<?php if ($this->_var['promotion_goods']): ?>
 <div class="proArae hotArea" >
  <dl>
  <dt>
<?php 
$k = array (
  'name' => 'ads',
  'id' => '38',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
</dt>
<dd>
<div class="proItemMain">
<?php $_from = $this->_var['promotion_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_34025600_1440040077');$this->_foreach['promotion_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['promotion_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_34025600_1440040077']):
        $this->_foreach['promotion_goods']['iteration']++;
?>
<?php if ($this->_foreach['promotion_goods']['iteration'] > 5 && $this->_foreach['promotion_goods']['iteration'] < 10): ?>
 
  <div class="goodsItem">
           <a href="<?php echo $this->_var['goods_0_34025600_1440040077']['url']; ?>"><img src="<?php echo $this->_var['goods_0_34025600_1440040077']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_0_34025600_1440040077']['name']); ?>" class="goodsimg" /></a><br />
           <p><a href="<?php echo $this->_var['goods_0_34025600_1440040077']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_34025600_1440040077']['name']); ?>"><?php echo $this->_var['goods_0_34025600_1440040077']['short_style_name']; ?></a></p>
          <em class="snPrice">
         <?php echo $this->_var['goods_0_34025600_1440040077']['promote_price']; ?>
          </em>
		</div>  
 <?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </div>
  <div class="proAreaimg">

<?php 
$k = array (
  'name' => 'ads',
  'id' => '39',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>

<?php 
$k = array (
  'name' => 'ads',
  'id' => '40',
  'num' => '1',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>

</div>
  </dd>
  </dl>
 </div>
<?php endif; ?>

