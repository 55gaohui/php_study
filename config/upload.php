<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/31/031
 * Time: 21:19
 */
require substr(dirname(__FILE__),0,-7).'/init.inc.php';
if(isset($_POST['send'])){
<<<<<<< HEAD
    new FileUpload('pic',$_POST['MAX_FILE_SIZE']);
=======
    new FileUpload();
>>>>>>> 65c2f3ed76004ce22453a8a5e7d9181f81e799e2
}

