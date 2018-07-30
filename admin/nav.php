<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-05-29
 * Time: 9:36
 */
    require substr(__DIR__,0,-6).'/init.inc.php';
    global $_tpl;
    Validate::checkSession();
    $_nav = new NavAction($_tpl);        //入口
    $_nav->_action();
    $_tpl->display('nav.tpl');
?>
