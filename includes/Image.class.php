<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/3/003
 * Time: 20:57
 */
class Image{
    private $file;      //图片地址
    private $width;     //图片宽度
    private $height;    //图片高度
    private $type;      //图片类型
    private $img;       //原图资源句柄
    private $new;       //新图的资源句柄
    //构造方法
    public function __construct($_file){
        $this->file = $_SERVER["DOCUMENT_ROOT"].$_file;
        list($this->width,$this->height,$this->type) = getimagesize($this->file);
        $this->img = $this->getFromImg($this->file,$this->type);
    }
    //缩略图（百分比）
    public function thumb($_per){
        $new_width = $this->width*($_per/100);
        $new_height = $this->height*($_per/100);
        $this->new = imagecreatetruecolor($new_width,$new_height);
        imagecopyresampled($this->new,$this->img,0,0,0,0,$new_width,$new_height,$this->width,$this->height);
    }
    //缩略图（等比例）
    public function thumb2($new_width,$new_height){
        if($this->width < $this->height){
            $new_width = ($new_height / $this->height)*$this->width;
        }else{
            $new_height = ($new_width / $this->width)*$this->height;
        }
        $this->new = imagecreatetruecolor($new_width,$new_height);
        imagecopyresampled($this->new,$this->img,0,0,0,0,$new_width,$new_height,$this->width,$this->height);
    }
    //缩略图（固定长高容器，图像等比例，扩容填充，裁剪）
    public function thumb3($new_width=0,$new_height=0){
        if(empty($new_width) && empty($new_height)){
            $new_width = $this->width;
            $new_height = $this->height;
        }
        if(!is_numeric($new_width) || !is_numeric($new_height)){
            $new_width = $this->width;
            $new_height = $this->height;
        }
        //创建一个容器
        $_n_w = $new_width;
        $_n_h = $new_height;
        //创建裁剪点
        $_cut_width = 0;
        $_cut_height = 0;
        if($this->width < $this->height){
            $new_width = ($new_height / $this->height)*$this->width;
        }else{
            $new_height = ($new_width / $this->width)*$this->height;
        }
        if($new_width < $_n_w){         //如果新高度小于新容器高度
            $r = $_n_w / $new_width;    //按宽度求出等比例因子
            $new_width *= $r;           //扩展填充后的宽度
            $new_height *= $r;          //扩展填充后的高度
            $_cut_height = ($new_height - $_n_h) / 2;     //求出裁剪点的高度
        }
        if($new_height < $_n_h){         //如果新高度小于新容器高度
            $r = $_n_h / $new_height;    //按高度求出等比例因子
            $new_width *= $r;           //扩展填充后的宽度
            $new_height *= $r;          //扩展填充后的高度
            $_cut_width = ($new_width - $_n_w) / 2;     //求出裁剪点的长度
        }
        $this->new = imagecreatetruecolor($_n_w,$_n_h);
        imagecopyresampled($this->new,$this->img,0,0,$_cut_width,$_cut_height,$new_width,$new_height,$this->width,$this->height);
    }
    //加载图片各种类型,返回图片的资源句柄
    private function getFromImg($_file,$_type){
        switch ($_type){
            case 1 :
                $img = imagecreatefromgif($_file);
                break;
            case 2 :
                $img = imagecreatefromjpeg($_file);
                break;
            case 3 :
                $img = imagecreatefrompng($_file);
                break;
            default:
                Tool::alertBack('警告：此图片类型本系统不支持！');
        }
        return $img;
    }
    //图像输出
    public function out(){
        imagepng($this->new,$this->file);
        imagedestroy($this->img);
        imagedestroy($this->new);
    }
}