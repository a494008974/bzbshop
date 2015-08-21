<?php


if (!defined('IN_ECS'))
{
	die('Hacking attempt');
}

/**
 * 对输出编码
 *
 * @access  public
 * @param   string   $str
 * @return  string
 */
function encode_output($str)
{
	return htmlspecialchars($str);
}

/**
 * wap分页函数
 *
 * @access		public
 * @param		int		$num		总记录数
 * @param		int		$perpage	每页记录数
 * @param		int		$curr_page	当前页数
 * @param		string	$mpurl		传入的连接地址
 * @param		string	$pvar		分页变量
 */
function get_wap_pager($num, $perpage, $curr_page, $mpurl,$pvar)
{
	$multipage = '';
	if($num > $perpage)
	{
		$page = 2;
		$offset = 1;
		$pages = ceil($num / $perpage);
		$all_pages = $pages;
		$tmp_page = $curr_page;
		$setp = strpos($mpurl, '?') === false ? "?" : '&amp;';
		$multipage .= "<div class=\"pages\">";
		if($curr_page > 1)
		{
			$multipage .= "<a href=\"$mpurl${setp}${pvar}=".($curr_page-1)."\" class=\"pre\">上一页</a> ";
		}
		$multipage .= $curr_page."/".$pages;
		if(($curr_page++) < $pages)
		{
			$multipage .= " <a href=\"$mpurl${setp}${pvar}=".$curr_page++."\" class=\"next\">下一页</a><br/>";
		}
		$multipage .= "</div>";
	}
	return $multipage;
}

/**
 * 返回尾文件
 *
 * @return	string
 */
function get_footer()
{
	if ($_SESSION['user_id'] > 0)
	{
		$footer = "<br/><a href='user.php?act=user_center'>用户中心</a>|<a href='user.php?act=logout'>退出</a>|<a href='javascript:scroll(0,0)' hidefocus='true'>回到顶部</a><br/>Copyright 2009<br/>Powered by ECShop v2.7.2";
	}
	else
	{
		$footer = "<br/><a href='user.php?act=login'>登陆</a>|<a href='user.php?act=register'>免费注册</a>|<a href='javascript:scroll(0,0)' hidefocus='true'>回到顶部</a><br/>Copyright 2009<br/>Powered by ECShop v2.7.2";
	}

	return $footer;
}
function cart_info()
{
    $sql = 'SELECT SUM(goods_number) AS number, SUM(goods_price * goods_number) AS amount' .
           ' FROM ' . $GLOBALS['ecs']->table('cart') .
           " WHERE session_id = '" . SESS_ID . "' AND rec_type = '" . CART_GENERAL_GOODS . "'";
    $row = $GLOBALS['db']->GetRow($sql);

    if ($row)
    {
        $number = intval($row['number']);
        $amount = floatval($row['amount']);
    }
    else
    {
        $number = 0;
        $amount = 0;
    }

    //$str = sprintf($GLOBALS['_LANG']['cart_info'], $number, price_format($amount, false));

    return $number;
}

?>