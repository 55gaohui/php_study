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
    $_path = $_fileupload->getPath();
    $_img = new Image($_path);
    $_img->thumb3(150,100);
    $_img->out();
    Tool::alertOpenerClose('缩略图上传成功！',$_path);
}else{
    Tool::alertBack('警告：文件过大或者其他位置错误导致浏览器崩溃！');
}


