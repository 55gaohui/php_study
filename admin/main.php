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
$_tpl->display('main.tpl');
?>
