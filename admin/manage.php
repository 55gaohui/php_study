<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-05-29
 * Time: 9:36
 */
    require substr(__DIR__,0,-6).'/init.inc.php';
    Validate::checkSession();
    global $_tpl;
    $_manage = new ManageAction($_tpl);        //入口
    $_manage->_action();
    $_tpl->display('manage.tpl');
?>
