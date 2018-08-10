<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-05-07
 * Time: 13:43
 */
    require __DIR__.'/init.inc.php';
    global $_tpl;
    $_details = new DetailsAction($_tpl);
    $_details->_action();
    $_tpl->display('details.tpl');
?>
