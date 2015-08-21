 
    <div class=" news   " >
       <ul>  
        <?php $_from = $this->_var['new_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');$this->_foreach['no'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['no']['total'] > 0):
    foreach ($_from AS $this->_var['article']):
        $this->_foreach['no']['iteration']++;
?>
        <?php if ($this->_foreach['no']['iteration'] < 7): ?> 
		<li>
        <a href="<?php echo $this->_var['article']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>" <?php if (($this->_foreach['no']['iteration'] - 1) <= 1): ?>  style=' color:#f60'  <?php endif; ?>><?php echo $this->_var['article']['short_title']; ?></a>
		</li>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
