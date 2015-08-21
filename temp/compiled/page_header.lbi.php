<?php
function get_brands1($cat = 0, $app = 'brand')
{
    $children = ($cat > 0) ? ' AND ' . get_children($cat) : '';

    $sql = "SELECT b.brand_id, b.brand_name, b.brand_logo, b.brand_desc, COUNT(*) AS goods_num, IF(b.brand_logo > '', '1', '0') AS tag ".
            "FROM " . $GLOBALS['ecs']->table('brand') . "AS b, ".
                $GLOBALS['ecs']->table('goods') . " AS g ".
            "WHERE g.brand_id = b.brand_id $children AND is_show = 1 " .
            " AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
            "GROUP BY b.brand_id HAVING goods_num > 0 ORDER BY tag DESC, b.sort_order ASC";
    $row = $GLOBALS['db']->getAll($sql);

    foreach ($row AS $key => $val)
    {
        $row[$key]['url'] = build_uri($app, array('cid' => $cat, 'bid' => $val['brand_id']), $val['brand_name']);
        $row[$key]['brand_desc'] = htmlspecialchars($val['brand_desc'],ENT_QUOTES);
    }

    return $row;
}
//
function get_promotion_info1($goods_id = '')
{
    $snatch = array();
    $group = array();
    $auction = array();
    $package = array();
    $favourable = array();

    $gmtime = gmtime();
    $sql = 'SELECT act_id, act_name, act_type, start_time, end_time FROM ' . $GLOBALS['ecs']->table('goods_activity') . " WHERE is_finished=0 AND start_time <= '$gmtime' AND end_time >= '$gmtime'";
    if(!empty($goods_id))
    {
        $sql .= " AND goods_id = '$goods_id'";
    }
    $res = $GLOBALS['db']->getAll($sql);
    foreach ($res as $data)
    {
        switch ($data['act_type'])
        {
            case GAT_SNATCH: //夺宝奇兵
                $snatch[$data['act_id']]['act_name'] = $data['act_name'];
                $snatch[$data['act_id']]['url'] = build_uri('snatch', array('sid' => $data['act_id']));
                $snatch[$data['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $data['start_time']), local_date('Y-m-d', $data['end_time']));
                $snatch[$data['act_id']]['sort'] = $data['start_time'];
                $snatch[$data['act_id']]['type'] = 'snatch';
                break;

            case GAT_GROUP_BUY: //团购
                $group[$data['act_id']]['act_name'] = $data['act_name'];
                $group[$data['act_id']]['url'] = build_uri('group_buy', array('gbid' => $data['act_id']));
                $group[$data['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $data['start_time']), local_date('Y-m-d', $data['end_time']));
                $group[$data['act_id']]['sort'] = $data['start_time'];
                $group[$data['act_id']]['type'] = 'group_buy';
                break;

            case GAT_AUCTION: //拍卖
                $auction[$data['act_id']]['act_name'] = $data['act_name'];
                $auction[$data['act_id']]['url'] = build_uri('auction', array('auid' => $data['act_id']));
                $auction[$data['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $data['start_time']), local_date('Y-m-d', $data['end_time']));
                $auction[$data['act_id']]['sort'] = $data['start_time'];
                $auction[$data['act_id']]['type'] = 'auction';
                break;

            case GAT_PACKAGE: //礼包
                $package[$data['act_id']]['act_name'] = $data['act_name'];
                $package[$data['act_id']]['url'] = 'package.php#' . $data['act_id'];
                $package[$data['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $data['start_time']), local_date('Y-m-d', $data['end_time']));
                $package[$data['act_id']]['sort'] = $data['start_time'];
                $package[$data['act_id']]['type'] = 'package';
                break;
        }
    }

    $user_rank = ',' . $_SESSION['user_rank'] . ',';
    $favourable = array();
    $sql = 'SELECT act_id, act_range, act_range_ext, act_name, start_time, end_time FROM ' . $GLOBALS['ecs']->table('favourable_activity') . " WHERE start_time <= '$gmtime' AND end_time >= '$gmtime'";
    if(!empty($goods_id))
    {
        $sql .= " AND CONCAT(',', user_rank, ',') LIKE '%" . $user_rank . "%'";
    }
    $res = $GLOBALS['db']->getAll($sql);

    if(empty($goods_id))
    {
        foreach ($res as $rows)
        {
            $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
            $favourable[$rows['act_id']]['url'] = 'activity.php';
            $favourable[$rows['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
            $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
            $favourable[$rows['act_id']]['type'] = 'favourable';
        }
    }
    else
    {
        $sql = "SELECT cat_id, brand_id FROM " . $GLOBALS['ecs']->table('goods') .
           "WHERE goods_id = '$goods_id'";
        $row = $GLOBALS['db']->getRow($sql);
        $category_id = $row['cat_id'];
        $brand_id = $row['brand_id'];

        foreach ($res as $rows)
        {
            if ($rows['act_range'] == FAR_ALL)
            {
                $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
                $favourable[$rows['act_id']]['url'] = 'activity.php';
                $favourable[$rows['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
                $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
                $favourable[$rows['act_id']]['type'] = 'favourable';
            }
            elseif ($rows['act_range'] == FAR_CATEGORY)
            {
                /* 找出分类id的子分类id */
                $id_list = array();
                $raw_id_list = explode(',', $rows['act_range_ext']);
                foreach ($raw_id_list as $id)
                {
                    $id_list = array_merge($id_list, array_keys(cat_list($id, 0, false)));
                }
                $ids = join(',', array_unique($id_list));

                if (strpos(',' . $ids . ',', ',' . $category_id . ',') !== false)
                {
                    $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
                    $favourable[$rows['act_id']]['url'] = 'activity.php';
                    $favourable[$rows['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
                    $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
                    $favourable[$rows['act_id']]['type'] = 'favourable';
                }
            }
            elseif ($rows['act_range'] == FAR_BRAND)
            {
                if (strpos(',' . $rows['act_range_ext'] . ',', ',' . $brand_id . ',') !== false)
                {
                    $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
                    $favourable[$rows['act_id']]['url'] = 'activity.php';
                    $favourable[$rows['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
                    $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
                    $favourable[$rows['act_id']]['type'] = 'favourable';
                }
            }
            elseif ($rows['act_range'] == FAR_GOODS)
            {
                if (strpos(',' . $rows['act_range_ext'] . ',', ',' . $goods_id . ',') !== false)
                {
                    $favourable[$rows['act_id']]['act_name'] = $rows['act_name'];
                    $favourable[$rows['act_id']]['url'] = 'activity.php';
                    $favourable[$rows['act_id']]['time'] = sprintf($GLOBALS['_LANG']['promotion_time'], local_date('Y-m-d', $rows['start_time']), local_date('Y-m-d', $rows['end_time']));
                    $favourable[$rows['act_id']]['sort'] = $rows['start_time'];
                    $favourable[$rows['act_id']]['type'] = 'favourable';
                }
            }
        }
    }

    $sort_time = array();
    $arr = array_merge($snatch, $group, $auction, $package, $favourable);
    foreach($arr as $key => $value)
    {
        $sort_time[] = $value['sort'];
    }
    array_multisort($sort_time, SORT_NUMERIC, SORT_DESC, $arr);

    return $arr;
}
$this->assign('promotion_info1', get_promotion_info1());
?>




<?php
 include_once('themes/' . $GLOBALS['_CFG']['template'].'/init.php');
?>
 
<script src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/transport.js"></script>
  
<script src="themes/<?php echo $GLOBALS['_CFG']['template']; ?>/js/js.js"></script>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script>





<div class="topNav">

<div class="block">
<div class="f_l">
<a style="cursor: pointer"  
onClick="window.external.AddFavorite(location.href,document.title);">收藏</a> 
|    
 <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
   <font id="ECS_MEMBERZONE"><?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?> </font>
</div>
<div class="f_r">

 <div class="f_l log"  style="position:relative; z-index:999999999; ">
  <ul class="ul1" onmouseover="this.className='ul1 ul1_on'" onmouseout="this.className='ul1'">
 <a class="a1" href="user.php">我的账户</a>
  <div class="ul1_float">
  
  <ul>
  
     <a href="user.php?act=order_list">我的订单</a>
     <a href="user.php?act=message_list">我的留言</a>
     <a href="user.php?act=collection_list">我的收藏</a>
     <a href="user.php?act=affiliate">我的推荐</a>
     <a href="user.php?act=profile">用户信息</a>
     <a href="user.php?act=address_list">收货地址</a>
     
 </ul>    
  </div>
    <div class="dang"></div>
 </ul>
 
 
 
  
  
  
 </div>
    <?php if ($this->_var['navigator_list']['top']): ?>

    <?php $_from = $this->_var['navigator_list']['top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_top_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_top_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_top_list']['iteration']++;
?>  
    |
    
     <a href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?> target="_blank" <?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a>
           
           
         
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> <?php endif; ?>
</div>






</div>







</div>

<div class="headBg">

<div   class="block clearfix" style=" position:relative; z-index:999; ">
 <div class="logo  " >
 <a  href="index.php" name="top"><img src="themes/suning/images/logo.png" /></a></div>
<div id="search" >   
  <form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()"  >
  <div class="B_input_box">
   <input name="keywords" type="text" id="keyword" value="品名或商品号" onclick="javascript:this.value=''" class="B_input"/>
   </div>
   <input name="imageField" type="submit" value="" class="go" style="cursor:pointer;" />
  
   </form>
   <div class="keys  ">
   <script type="text/javascript">
    
    <!--
    function checkSearchForm()
    {
        if(document.getElementById('keyword').value)
        {
            return true;
        }
        else
        {
           alert("<?php echo $this->_var['lang']['no_keywords']; ?>");
            return false;
        }
    }
    -->
    
    </script>
    <?php if ($this->_var['searchkeywords']): ?>
  <b> 热门搜索：</b>
   <?php $_from = $this->_var['searchkeywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?>
   <a href="search.php?keywords=<?php echo urlencode($this->_var['val']); ?>"><?php echo $this->_var['val']; ?></a>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
   <?php endif; ?>
  </div>
</div> 
</div>

 
 

<div   class="block clearfix" style=" position:relative; z-index:999; ">
<div id="mainNav" class="clearfix">

<div class="category_all2"  onmouseover="this.className='category_all2 category_all2_on'" onmouseout="this.className='category_all2'">
<a class="all" href="allcate.php">全部商品分类</a>


<div class="my_left_category my_left_category2" style=" position:absolute; left:0; top:34px;  background: #0078C0;">


    <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
     <dl>
     <dt onmouseover="this.className='category_over'" onmouseout="this.className=''">
     <a class="a1" href="<?php echo $this->_var['cat']['url']; ?>" ><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a>
     
     
     <div class="category_over_box">
     <ul class="clearfix">
       <div style="float:left; width:470px; padding:0 10px; overflow:hidden">
     <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
     <li>
     
     <div style="clear:both"></div>
     
     
     <div class="f_l">
     <a class="over_2" href="<?php echo $this->_var['child']['url']; ?>"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a>  
     </div>
     <div class="f_r">
     <?php $_from = $this->_var['child']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');if (count($_from)):
    foreach ($_from AS $this->_var['childer']):
?>
     <b>
     | <a class="over_3" href="<?php echo $this->_var['childer']['url']; ?>"><?php echo htmlspecialchars($this->_var['childer']['name']); ?></a>
     </b>  
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
      
       <div style="clear:both"></div>
     </li>  
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>  
      
      <div class=" hotBrand " >
<div class="tit">推荐品牌 </div>
<div class="  clearfix1">
<?php $_from = get_brands1($GLOBALS[smarty]->_var[cat][id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bchilder');if (count($_from)):
    foreach ($_from AS $this->_var['bchilder']):
?>
<a href="<?php echo $this->_var['bchilder']['url']; ?>"><?php echo htmlspecialchars($this->_var['bchilder']['brand_name']); ?></a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>
      
     <div class="csActive">
<div class="tit">促销活动  </div>
<div class="clearfix clearfix2">
<?php $_from = $this->_var['promotion_info1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item1');$this->_foreach['item1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['item1']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['item1']):
        $this->_foreach['item1']['iteration']++;
?>

	
<div>
    <a href="<?php echo $this->_var['item1']['url']; ?>" title="<?php echo $this->_var['lang'][$this->_var['item1']['type']]; ?> <?php echo $this->_var['item1']['act_name']; ?><?php echo $this->_var['item1']['time']; ?>" ><?php echo $this->_var['item1']['act_name']; ?></a> 
    
    </div>

    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
</div>
</div>
     
     </ul>
     </div>
     
     
     
     
     <div class="dang" ></div>
     
     
     
     </dt>
     
    </dl>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 


</div>



</div>

<div class="mainNav_r">
  <a class="aa" href="index.php"  <?php if ($this->_var['navigator_list']['config']['index'] == 1): ?> id="aa_on"   <?php endif; ?>><?php echo $this->_var['lang']['home']; ?> </a>
  
  
  <?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
 
  <a  class="aa" <?php if ($this->_var['nav']['active'] == 1): ?>  id="aa_on" <?php endif; ?>  href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?>target="_blank" <?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a>
 
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 
 
 

 
 </div>
 
 <div class="buy_car_bg_box" >  
 
<div class="buy_car_bg " id="ECS_CARTINFO" onmouseover="this.className='buy_car_bg ul1_on'" onmouseout="this.className='buy_car_bg'">

<?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
   <div class="dang"></div>
</div> 
<div class="jiesuan"><a href="flow.php" >去结算</a> </div>
</div> 
  </div>
 </div>
</div>
 
