 
<?php echo $this->_var['str']; ?>

  <?php if ($this->_var['goods']): ?>
<ul class="car_ul">
 <?php $_from = $this->_var['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_22528900_1440039739');$this->_foreach['goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_22528900_1440039739']):
        $this->_foreach['goods']['iteration']++;
?>
 <li>
 <div class="f_l">
 <div style="float:left">
 <a href="<?php echo $this->_var['goods_0_22528900_1440039739']['url']; ?>"><img src="<?php echo $this->_var['goods_0_22528900_1440039739']['goods_thumb']; ?>"  alt="<?php echo $this->_var['goods_0_22528900_1440039739']['goods_name']; ?>"></a>
  </div>
 <a class="name" href="<?php echo $this->_var['goods_0_22528900_1440039739']['url']; ?>"><?php echo $this->_var['goods_0_22528900_1440039739']['short_name']; ?></a>
 </div>
 <div class="f_r">
<span><?php echo $this->_var['goods_0_22528900_1440039739']['goods_price']; ?></span>×<?php echo $this->_var['goods_0_22528900_1440039739']['goods_number']; ?> <br />
<a class="del" href="javascript:" onClick="deleteCartGoods(<?php echo $this->_var['goods_0_22528900_1440039739']['rec_id']; ?>)">删除</a>
 </div>
</li>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 <div class="minjiesuan">
<a target="_blank" href="flow.php" style="color:#FFFFFF" >去结算</a>
</div>
</ul> 

<?php else: ?>
<ul class="car_ul">
<li style="width: 320px; height:30px; border-bottom:none;">
<a href="#" style="font-size: 14px;color: #333; font-weight:bold">您没有挑选商品 , 赶紧行动吧！</a>
</li>
</ul>
<?php endif; ?>



<script type="text/javascript">
function deleteCartGoods(rec_id)
{
Ajax.call('delete_cart_goods.php', 'id='+rec_id, deleteCartGoodsResponse, 'POST', 'JSON');
}

/**
 * 接收返回的信息
 */
function deleteCartGoodsResponse(res)
{
  if (res.error)
  {
    alert(res.err_msg);
  }
  else
  {
      document.getElementById('ECS_CARTINFO').innerHTML = res.content;
  }
}
</script>

