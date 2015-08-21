<?php
if($_REQUEST['id'])
{
	$id = $_REQUEST['id'];
}
else
{
	$id = $_REQUEST['category'];
}
function get_categories($cat_id = 0)
{
    if ($cat_id > 0)
    {
			  $parent_id = $cat_id;
    }
    else
    {
        $parent_id = 0;
    }

    /*
     判断当前分类中全是是否是底级分类，
     如果是取出底级分类上级分类，
     如果不是取当前分类及其下的子分类
    */
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('category') . " WHERE parent_id = '$cat_id' AND is_show = 1 ";
    if ($GLOBALS['db']->getOne($sql) || $parent_id == 0)
    {
        /* 获取当前分类及其子分类 */
        $sql = 'SELECT a.cat_id, a.cat_name, a.sort_order AS parent_order, a.cat_id, a.is_show,' .
                    'b.cat_id AS child_id, b.cat_name AS child_name, b.sort_order AS child_order ' .
                'FROM ' . $GLOBALS['ecs']->table('category') . ' AS a ' .
                'LEFT JOIN ' . $GLOBALS['ecs']->table('category') . ' AS b ON b.parent_id = a.cat_id AND b.is_show = 1 ' .
                "WHERE a.parent_id = '$parent_id' ORDER BY parent_order ASC, a.cat_id ASC, child_order ASC";
    }
    else
    {
        /* 获取当前分类及其父分类 */
        $sql = 'SELECT a.cat_id, a.cat_name, b.cat_id AS child_id, b.cat_name AS child_name, b.sort_order, b.is_show ' .
                'FROM ' . $GLOBALS['ecs']->table('category') . ' AS a ' .
                'LEFT JOIN ' . $GLOBALS['ecs']->table('category') . ' AS b ON b.parent_id = a.cat_id AND b.is_show = 1 ' .
                "WHERE b.parent_id = '$parent_id' ORDER BY sort_order ASC";
    }
    $res = $GLOBALS['db']->getAll($sql);

    $cat_arr = array();
    foreach ($res AS $row)
    {
        if ($row['is_show'])
        {
            $cat_arr[$row['cat_id']]['id']   = $row['cat_id'];
            $cat_arr[$row['cat_id']]['name'] = $row['cat_name'];
            $cat_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);

            if ($row['child_id'] != NULL)
            {
                $cat_arr[$row['cat_id']]['children'][$row['child_id']]['id']   = $row['child_id'];
                $cat_arr[$row['cat_id']]['children'][$row['child_id']]['name'] = $row['child_name'];
                $cat_arr[$row['cat_id']]['children'][$row['child_id']]['url']  = build_uri('category', array('cid' => $row['child_id']), $row['child_name']);
            }
        }
    }

    return $cat_arr;
}
function get_cat_name_add($id)
{
    $sql = 'SELECT cat_name ' . 'FROM ' . $GLOBALS['ecs']->table('category')  . "WHERE cat_id =$id " ;
		$cat_name = $GLOBALS['db']->getOne($sql);
		return $cat_name;
}
function get_parent($value,$id='')
{

    if($value!=0)
    {
			$sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE cat_id = '$value'";
			$res = $GLOBALS['db']->getOne($sql);
			return get_parent($res,$value);
    }
		else
		{
			return $id;
		}
}
include_once("includes/lib_goods.php");
$this->assign('categories1'     ,    get_categories(get_parent($id)));
$this->assign('cat_name'     ,       get_cat_name_add(get_parent($id)))
?>
<div id="categoryTree" class="leftMenu">
<h3 class="h32"><span><?php echo $this->_var['cat_name']; ?></span> </h3>
<div style="clear:both"></div>  
<div id="global_box" > 
  <div class="box1 cate" id="cate">
	<?php $_from = $this->_var['categories1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat_0_23372100_1440040422');$this->_foreach['cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat']['total'] > 0):
    foreach ($_from AS $this->_var['cat_0_23372100_1440040422']):
        $this->_foreach['cat']['iteration']++;
?>
		<h1>
		<a href="<?php echo $this->_var['cat_0_23372100_1440040422']['url']; ?>" class="f_l" ><?php echo htmlspecialchars($this->_var['cat_0_23372100_1440040422']['name']); ?></a>
		
		</h1>
		<ul style="display:block">
		<?php $_from = $this->_var['cat_0_23372100_1440040422']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_0_23385100_1440040422');if (count($_from)):
    foreach ($_from AS $this->_var['child_0_23385100_1440040422']):
?>
		<li><a href="<?php echo $this->_var['child_0_23385100_1440040422']['url']; ?>"><?php echo htmlspecialchars($this->_var['child_0_23385100_1440040422']['name']); ?></a></li>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
		<div style="clear:both"></div>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
</div>
<div style="clear:both"></div>  
</div>  
</div>
<div class="blank"></div>
