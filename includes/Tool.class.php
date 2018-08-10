<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-06-11
 * Time: 8:08
 */
class Tool{
    //弹窗跳转
    static public function alertLocation($_info,$_url){
        if(!empty($_info)){
            echo "<script type='text/javascript'>alert('$_info');location.href='$_url'</script>";
            exit();
        }else{
            header('Location:'.$_url);
            exit();
        }

    }
    //弹窗赋值关闭（上传专用）
    static public function alertOpenerClose($_info,$_path){
        echo "<script type='text/javascript'>alert($_info)</script>";
        echo "<script type='text/javascript'>opener.document.content.thumbnail.value = '$_path'</script>";
        echo "<script type='text/javascript'>opener.document.content.pic.style.display= 'block'</script>";
        echo "<script type='text/javascript'>opener.document.content.pic.src= '$_path'</script>";
        echo "<script type='text/javascript'>window.close();</script>";
        exit();
    }
    //将html字符串转换成html标签
    static public function unHtml($_str){
        return htmlspecialchars_decode($_str);
    }
    //将对象数组转换成字符串，并且去掉最后的逗号
    static public function objArrStr($_object,$_field){
        if($_object){
            $_html = null;
            foreach ($_object as $value){
                $_html .= $value->$_field.',';
            }
        }
        return substr($_html,0,strlen($_html)-1);

    }
    //字符串截取
    static public function subStr($_object,$_field,$_length,$_encoding){
        if($_object){
            foreach ($_object as $_value) {
                if(mb_strlen($_value->$_field,$_encoding) >$_length ){
                    $_value->$_field = mb_substr($_value->$_field,0,$_length,$_encoding).'...';
                }
            }
        }
        return $_object;
    }
    //弹窗返回
    static public function alertBack($_info){
        echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
        exit();
    }
    //显示过滤html
    static public function htmlString($_date){
        if(is_array($_date)){
            foreach ($_date as $_key=>$_value){
                $_date[$_key] = self::htmlString($_value);
            }
        }elseif (is_object($_date)){
            foreach ($_date as $_key=>$_value){
                $_date->$_key = self::htmlString($_value);
            }
        }else{
            $_date = htmlspecialchars($_date);
        }
        return $_date;
    }
    //数据库输入过滤
    static public function mysqliString($_date){
        if (is_array($_date)){
            return $_date;
        }else{
            return mysqli_real_escape_string(DB::getDB(),$_date);
        }

    }
    //清理SESSION
    static public function unSession(){
        if(session_start()){
            session_destroy();
        }
    }
}


?>
