<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-05-29
 * Time: 8:04
 */
    require substr(__DIR__,0,-6).'/init.inc.php';
    global $_tpl;
    $_login = new LoginAction($_tpl);
    $_login->_action();
    if(isset($_SESSION['admin'])) Tool::alertLocation(null,'admin.php');
    $_tpl->display('admin_login.tpl');
?>
