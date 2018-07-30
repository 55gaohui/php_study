<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-05-08
 * Time: 8:40
 */
    class Templates{
        //创建字段，动态接收变量（数组）
        private $_vars=array();
        //保存系统变量
        private $_config = array();
        public function __construct(){
            if(!is_dir(TPL_DIR) || !is_dir(TPL_C_DIR) || !is_dir(CACHE_DIR)){
                exit('ERROR：模板文件夹或编译文件夹或缓存文件夹出错！');
            }
            //保存系统变量
            $_sxe = simplexml_load_file(ROOT_PATH.'/config/profile.xml');
            $_taglib = $_sxe->xpath('/root/taglib');
            foreach ($_taglib as $_tag){
                $this->_config["$_tag->name"]=$_tag->value;
            }
        }
        //assign()  用于注入变量

        /**
         * @param $_var 用于同步模板里得变量名
         * @param $_value 表示index.php里的$_name
         */
        public function assign($_var,$_value){
            if(isset($_var) && !empty($_var)){
                $this->_vars[$_var] = $_value;
            }else{
                exit('ERROR：请设置变量名！');
            }
        }
        //display()方法--将模板导入到PHP文件中
        public function display($_file){
            //给include进来的tpl传一个模板操作的对象
            @$_tpl=$this;
            //设置模板文件路径
            $_tplFile=TPL_DIR.$_file;
            //判断模板文件是否存在
            if(!is_file($_tplFile)){
                exit('模板文件不存在！');
            }
            //是否加入参数
            if(!empty($_SERVER['QUERY_STRING'])){
                $_file .= $_SERVER['QUERY_STRING'];
            }
            //设置编译文件名称
            $_ParFile=TPL_C_DIR.md5($_file).$_file.'php';
            //设置缓存文件名称
            $_cacheFile=CACHE_DIR.md5($_file).$_file.'html';
            //当第二次运行相同文件时，直接载入缓存文件
            if(IS_CACHE){
                //缓存文件和编译文件都必须存在
                if(file_exists($_cacheFile) && file_exists($_ParFile) ){
                    //判断编译模板和原模板是否被修改过
                    if(fileatime($_ParFile)>=filemtime($_tplFile) && filemtime($_cacheFile)>=filemtime($_ParFile)){
                        include $_cacheFile;
                        return;
                    }
                }
            }
            //判断编译文件是否存在，模板是否修改过
            //当编译文件不存在或被修改过时执行
            if(!is_file($_ParFile) || filemtime($_ParFile)<filemtime($_tplFile)){
                //引入模板解析类
                include_once ROOT_PATH.'/includes/Parser.class.php';
                $_parser=new Parser($_tplFile);  //模板文件
                $_parser->compile($_ParFile);    //编译文件
            }
            //载入编译文件
            include $_ParFile;
            if(IS_CACHE){
                //获取缓冲器内容
                file_put_contents($_cacheFile,ob_get_contents());
                //清除缓冲区（清除编译文件加载的内容）
                ob_end_clean();
                include $_cacheFile;
            }
        }
        //创建create方法，用于header和footer这种模块解析使用，而不需要生成缓存文件
        public function create($_file){
            //设置模板文件路径
            $_tplFile=TPL_DIR.$_file;
            //判断模板文件是否存在
            if(!is_file($_tplFile)){
                exit('模板文件不存在！');
            }
            //设置编译文件名称
            $_ParFile=TPL_C_DIR.md5($_file).$_file.'php';

            if(!is_file($_ParFile) || filemtime($_ParFile)<filemtime($_tplFile)){
                //引入模板解析类
                include_once ROOT_PATH.'/includes/Parser.class.php';
                $_parser=new Parser($_tplFile);  //模板文件
                $_parser->compile($_ParFile);    //编译文件
            }
            //载入编译文件
            include $_ParFile;
        }
    }
?>
