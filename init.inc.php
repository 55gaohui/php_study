<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-05-07
 * Time: 13:45
 */
session_start();
header('Content-Type=text/html;charset=utf-8');
define('ROOT_PATH',__DIR__);
//引入配置信息
require ROOT_PATH.'/config/profile.inc.php';
//设置中国时区
date_default_timezone_set('Asia/Shanghai');
//自动加载类
function __autoload($_className){
    if(substr($_className,-6) == 'Action'){
        require __DIR__.'/action/'.$_className.'.class.php';
    }elseif (substr($_className,-5) == 'Model'){
        require __DIR__.'/model/'.$_className.'.class.php';
    }else{
        require __DIR__.'/includes/'.$_className.'.class.php';
    }
}
//实例化模板类
$_tpl=new Templates();
//初始化
require 'common.inc.php';
?>
