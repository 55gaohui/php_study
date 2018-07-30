<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-05-28
 * Time: 8:38
 */
//数据库配置文件
define('DB_HOST','localhost');          //主机IP
define('DB_USER','root');               //账号
define('DB_PASS','');                   //密码
define('DB_NAME','cms');                //数据库名
//系统配置文件
define('PAGE_SIZE',5);                  //每页多少条
define('PREV_URL',@$_SERVER['HTTP_REFERER']); //上一页地址
define('NAV_SIZE',10);                  //主导航在前台显示个数
//模板配置信息
define('TPL_DIR',ROOT_PATH.'/templates/');              //模板文件目录
define('TPL_C_DIR',ROOT_PATH.'/templates_c/');          //编译文件目录
define('CACHE_DIR',ROOT_PATH.'/cache/');                //缓存文件目录
?>
