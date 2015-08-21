<?php


define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

/*------------------------------------------------------ */
//-- 证书反查
/*------------------------------------------------------ */

if (!empty($_POST['session_id']))
{
    $_POST['session_id'] = trim($_POST['session_id']);
    $sql = "SELECT sesskey FROM " . $ecs->table('sessions') . " WHERE sesskey = '" . $_POST['session_id'] . "' ";
    $sesskey = $db->getOne($sql);
    if ($sesskey != '')
    {
        exit('{"res":"succ","msg":"","info":""}');
    }
    else
    {
        exit('{"res":"fail","msg":"error:000002","info":""}');
    }
}
else
{
    exit('{"res":"fail","msg":"error:000001","info":""}');
}

?>