<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/31/031
 * Time: 21:21
 */
//上传文件类
class FileUpload{
    private $error;     //错误代码
    private $maxsize;   //表单最大值
    private $type;      //类型
    private $typeArr = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif');   //类型合集
    private $path;      //主目录路径
    private $today;     //今天的目录
    private $name;      //文件名

    //构造方法，初始化
    public function __construct($_file,$_maxsize){
        $this->error = $_FILES[$_file]['error'];
        $this->maxsize = $_maxsize/1024;
        $this->type = $_FILES[$_file]['type'];
        $this->path = ROOT_PATH.UPDIR;
        $this->today =$this->path.'image/'.date('Ymd').'/';
        $this->name = $_FILES[$_file]['name'];
        $this->checkError();
        $this->checkType();
        $this->checkPath();
    }
    //设置新文件名
    private function setNewName(){

    }
    //验证目录
    private function checkPath(){
        if(!is_dir($this->path) || !is_writeable($this->path)){
            if(!mkdir($this->path)){
                Tool::alertBack('警告：主目录创建失败！');
            }
        }
        if(!is_dir($this->today) || !is_writeable($this->today)){
            if(!mkdir($this->today)){
                Tool::alertBack('警告：子目录创建失败！');
            }
        }
    }
    //验证类型
    private function checkType(){
        if(!in_array($this->type,$this->typeArr)){
            Tool::alertBack('警告：不合法的上传类型！');
        }
    }
    //验证错误
    private function checkError(){
        if(!empty($this->error)){
            switch ($this->error){
                case 1 :
                    Tool::alertBack('警告：上传值超过了约定最大值！');
                    break;
                case 2 :
                    Tool::alertBack('警告：上传值超过了'.$this->maxsize.'KB！');
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