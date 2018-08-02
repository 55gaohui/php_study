<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/31/031
 * Time: 21:19
 */
require substr(dirname(__FILE__),0,-7).'/init.inc.php';
if(isset($_POST['send'])){
    $_fileupload = new FileUpload('pic',$_POST['MAX_FILE_SIZE']);
    $_fileupload->getPath();
}

