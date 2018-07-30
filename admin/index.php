<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-05-29
 * Time: 8:04
 */
require substr(__DIR__,0,-6).'/init.inc.php';
isset($_SESSION['admin']) ? Tool::alertLocation(null,'Location:admin.php') : Tool::alertLocation(null,'Location:admin_login.php');

?>
