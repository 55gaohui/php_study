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
        echo "<script type='text/javascript'>window.close();</script>";
        exit();
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
