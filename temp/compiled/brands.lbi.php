<?php if ($this->_var['brand_list']): ?>
<div id="brandList" >
<div class="h33"><span>品牌专卖店</span> <a class="f_r" href="brand.php"> 更多>></a></div>
   
  <div class="boxCenterList clearfix"   >
    <?php $_from = $this->_var['brand_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');$this->_foreach['brand_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['brand_foreach']['total'] > 0):
    foreach ($_from AS $this->_var['brand']):
        $this->_foreach['brand_foreach']['iteration']++;
?>
	 
  <ul>
  <li style=" text-align:center">
    <a href="<?php echo $this->_var['brand']['url']; ?>"><img class="brand_img" src="data/brandlogo/<?php echo $this->_var['brand']['brand_logo']; ?>" alt="<?php echo htmlspecialchars($this->_var['brand']['brand_name']); ?> (<?php echo $this->_var['brand']['goods_num']; ?>)" /></a>
 </li>
    <li ><a href="<?php echo $this->_var['brand']['url']; ?>"><?php echo htmlspecialchars($this->_var['brand']['brand_name']); ?></a>  
		</li>
  
	</ul>	 
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
   
    
    <div style="clear:both"></div> 

  </div>
	
 
</div>
<div class="blank"></div>
<?php endif; ?>