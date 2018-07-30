<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-05-29
 * Time: 8:14
 */
//后台专用
@define("IS_CACHE",false);
//判断是否开启缓冲区
IS_CACHE ? ob_start() : null;
?>
