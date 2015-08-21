<?php


session_start();

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
/* 载入语言文件 */

require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');
if ($_SESSION['user_id'] > 0)
{
	$smarty->assign('user_name', $_SESSION['user_name']);
}

$smarty->assign('shop_name',     $GLOBALS['_CFG']['shop_name']);
$smarty->assign('shop_address',     $GLOBALS['_CFG']['shop_address']);
$smarty->assign('qq',     $GLOBALS['_CFG']['qq']);
$smarty->assign('ww',     $GLOBALS['_CFG']['ww']);
$smarty->assign('skype',     $GLOBALS['_CFG']['skype']);
$smarty->assign('ym',     $GLOBALS['_CFG']['ym']);
$smarty->assign('msn',     $GLOBALS['_CFG']['msn']);

$smarty->assign('service_email',     $GLOBALS['_CFG']['service_email']);
$smarty->assign('service_phone',     $GLOBALS['_CFG']['service_phone']);




/* 用户中心 */
//if ($_SESSION['user_id'] > 0){
//	$smarty->display('kefu.html');
//}else{
//	$smarty->assign('footer', get_footer());
//	$smarty->display('login.html');
//}
$smarty->display('kefu.html');

?>