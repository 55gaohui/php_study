<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-05-29
 * Time: 9:35
 */
require substr(__DIR__,0,-6).'/init.inc.php';
global $_tpl;
Validate::checkSession();
@$_tpl->assign('admin_user',$_SESSION['admin']['admin_user']);
@$_tpl->assign('level_name',$_SESSION['admin']['level_name']);
$_tpl->display('top.tpl');
?>
