<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-05-07
 * Time: 13:43
 */
    require __DIR__.'/init.inc.php';
    global $_tpl;
    $_tpl->assign('title','标头');
    $_list = new ListAction($_tpl);
    $_list->getNav();
    $_tpl->display('list.tpl');
?>
