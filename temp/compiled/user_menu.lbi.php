<div class="userMenu_tit"><a href="user.php">用户中心</a></div>

<div class="userMenu">
 
 <ul >
  <li>
    <dl>
		<dt class="dt1">
		<em> </em> 订单中心
		</dt>
		<dd>
      <a href="user.php?act=order_list"<?php if ($this->_var['action'] == 'order_list' || $this->_var['action'] == 'order_detail'): ?>class="curs"<?php endif; ?>> <?php echo $this->_var['lang']['label_order']; ?></a>
	  </dd>
	  <dd>
      <a href="user.php?act=address_list"<?php if ($this->_var['action'] == 'address_list'): ?>class="curs"<?php endif; ?>><?php echo $this->_var['lang']['label_address']; ?></a>
       </dd>
	   <dd>
         <a href="user.php?act=booking_list"<?php if ($this->_var['action'] == 'booking_list'): ?>class="curs"<?php endif; ?>> <?php echo $this->_var['lang']['label_booking']; ?></a>
		</dd>
	</dl>
 </li>
 
 <li>
    <dl>
		<dt class="dt2">
		<em> </em> 会员中心
		</dt>
		<dd>
      <a href="user.php?act=profile"<?php if ($this->_var['action'] == 'profile'): ?>class="curs"<?php endif; ?>>  <?php echo $this->_var['lang']['label_profile']; ?></a>
	  </dd>
	  <dd>
     <a href="user.php?act=collection_list"<?php if ($this->_var['action'] == 'collection_list'): ?>class="curs"<?php endif; ?>> <?php echo $this->_var['lang']['label_collection']; ?></a>

       </dd>
	   <dd>
        <a href="user.php?act=message_list"<?php if ($this->_var['action'] == 'message_list'): ?>class="curs"<?php endif; ?>> <?php echo $this->_var['lang']['label_message']; ?></a>

		</dd>
		
		 <dd>
        <a href="user.php?act=tag_list"<?php if ($this->_var['action'] == 'tag_list'): ?>class="curs"<?php endif; ?>><?php echo $this->_var['lang']['label_tag']; ?></a>

		</dd>
		 <?php if ($this->_var['affiliate']['on'] == 1): ?><dd>
       <a href="user.php?act=affiliate"<?php if ($this->_var['action'] == 'affiliate'): ?>class="curs"<?php endif; ?>>  <?php echo $this->_var['lang']['label_affiliate']; ?></a>

		</dd><?php endif; ?>
		 <dd>
       <a href="user.php?act=comment_list"<?php if ($this->_var['action'] == 'comment_list'): ?>class="curs"<?php endif; ?>> <?php echo $this->_var['lang']['label_comment']; ?></a>

		</dd>
	</dl>
 </li>
		
   <li>
    <dl>
		<dt class="dt3">
		<em> </em> 账户中心
		</dt>
		<dd>
     <a href="user.php?act=bonus"<?php if ($this->_var['action'] == 'bonus'): ?>class="curs"<?php endif; ?>><?php echo $this->_var['lang']['label_bonus']; ?></a>
	  </dd>
	  <dd>
     <a href="user.php?act=track_packages"<?php if ($this->_var['action'] == 'track_packages'): ?>class="curs"<?php endif; ?>> <?php echo $this->_var['lang']['label_track_packages']; ?></a>
       </dd>
	   <dd>
         <a href="user.php?act=account_log"<?php if ($this->_var['action'] == 'account_log'): ?>class="curs"<?php endif; ?>> <?php echo $this->_var['lang']['label_user_surplus']; ?></a>
		</dd>
		<?php if ($this->_var['show_transform_points']): ?>
		 <dd>
        <a href="user.php?act=transform_points"<?php if ($this->_var['action'] == 'transform_points'): ?>class="curs"<?php endif; ?>><?php echo $this->_var['lang']['label_transform_points']; ?></a>
		<?php endif; ?>
	</dl>
 </li>
 
        
        
        	
		
</ul>
  
  
 
</div>

 
	 
 
	