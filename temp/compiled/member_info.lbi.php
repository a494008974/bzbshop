

<?php if ($this->_var['user_info']): ?>

<span><?php echo $this->_var['lang']['hello']; ?>，</span><span class="f4_b" style=" color:#c00"><?php echo $this->_var['user_info']['username']; ?></span>    
 <a href="user.php">[<?php echo $this->_var['lang']['user_center']; ?>]</a> 
 <a href="user.php?act=logout">[<?php echo $this->_var['lang']['user_logout']; ?>]</a> 

<?php else: ?>
<span>您好，欢迎光临本站！</span>
<a href="user.php">登录</a><a href="user.php?act=register">注册</a> 
<?php endif; ?>


 
