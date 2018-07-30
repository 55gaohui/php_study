<?php
/**
 * Created by PhpStorm.
 * User: ASUR
 * Date: 2018-07-10
 * Time: 8:33
 */
require substr(dirname(__FILE__),0,-7).'/init.inc.php';
$_vc = new ValidateCode();
echo $_vc->doimg();
$_SESSION['code'] = $_vc->getCode();