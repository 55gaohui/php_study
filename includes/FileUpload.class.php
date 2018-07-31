<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/31/031
 * Time: 21:21
 */
//上传文件类
class FileUpload{
    private $error;
    //构造方法，初始化
    public function __construct($_file){
        $this->error = $_FILES[$_file]['error'];
    }
    //验证错误
    private function checkError(){
        if(!empty($this->error)){
            switch ($this->error){
                case 1 :
                    Tool::alertBack('警告：上传值超过了约定最大值！');
                    break;
                case 2 :
                    Tool::alertBack('警告：上传值超过了200KB！');
                    break;
                case 3 :
                    Tool::alertBack('警告：只有部分文件被上传！');
                    break;
                case 4 :
                    Tool::alertBack('警告：没有任何文件被上传！');
                    break;
                default :
                    Tool::alertBack('警告：未知错误！');
            }
        }
    }
}