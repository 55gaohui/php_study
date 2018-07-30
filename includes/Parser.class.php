<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-05-08
 * Time: 8:40
 */
    class Parser{
        private $_tpl;
        //构造方法获取模板文件
        public function __construct($_tplFile){
            if(!$this->_tpl=file_get_contents($_tplFile)){
                exit('ERROR：模板文件读取错误！');
            }
        }
        //解析普通变量
        private function parVar(){
            $_patten = '/\{\$([\w]+)\}/';
            if(preg_match($_patten,$this->_tpl)){
                $this->_tpl=preg_replace($_patten,"<?php echo \$this->_vars['$1'];?>",$this->_tpl);
            }
        }
        //解析if判断语句
        private function parIf(){
            $_patten='/\{if\s+\$(\w+)\}/';
            $_patten_end_if='/\{\/if\}/';
            $_patten_else='/\{else\}/';
            if(preg_match($_patten,$this->_tpl)){
                if(preg_match($_patten_end_if,$this->_tpl)){
                    //普通变量存在$this->_vars[]数组里
                    $this->_tpl=preg_replace($_patten,"<?php if(@\$this->_vars['$1']) {?>",$this->_tpl);
                    $this->_tpl=preg_replace($_patten_end_if,'<?php } ?>',$this->_tpl);
                    if(preg_match($_patten_else,$this->_tpl)){
                        $this->_tpl=preg_replace($_patten_else,'<?php }else{ ?>',$this->_tpl);
                    }
                }else{
                    exit('ERROR：if语句没有关闭！');
                }
            }
        }
        //解析PHP代码注释
        private function parCommon(){
            $_patten='/\{#\}(.*)\{#\}/';
            if(preg_match($_patten,$this->_tpl)){
                $this->_tpl=preg_replace($_patten,"<?php /* $1 */ ?>",$this->_tpl);
            }
        }
        //解析foreach语句
        private function parForeach(){
            $_patten='/\{foreach\s+\$(\w+)\((\w+),(\w+)\)}/';
            $_pattenEnd='/\{\/foreach\}/';
            $_pattenVar='/\{@(\w+)([\-\+\>\w]*)\}/';
            if(preg_match($_patten,$this->_tpl)){
                if(preg_match($_pattenEnd,$this->_tpl)){
                    $this->_tpl=preg_replace($_patten,"<?php foreach (\$this->_vars['$1'] as \$$2=>\$$3){ ?>",$this->_tpl);
                    $this->_tpl=preg_replace($_pattenEnd,"<?php } ?>",$this->_tpl);
                    if(preg_match($_pattenVar,$this->_tpl)){
                        $this->_tpl=preg_replace($_pattenVar,"<?php echo \$$1$2?>",$this->_tpl);
                    }
                }else{
                    exit('ERROR：foreach语句必须有结尾标签！');
                }
            }
        }
        //解析include方法
        private function parInclude(){
            $_patten='/\{include\s+file=(\"|\')([\w\.\-\/]+)(\"|\')\}/';
            if(preg_match_all($_patten,$this->_tpl,$_file)){
                foreach ($_file[2] as $_value){
                    if(!file_exists('templates/'.$_value)){
                        exit('文件包含出错！');
                    }
                    $this->_tpl=preg_replace($_patten,"<?php  \$_tpl->create('$2')?>",$this->_tpl);
                }
            }
        }
        //解析系统变量
        private function parConfig(){
            $_patten='/<!--\{([\w]+)\}-->/';
            if(preg_match($_patten,$this->_tpl)){
                $this->_tpl=preg_replace($_patten,"<?php echo \$this->_config['$1'];?>",$this->_tpl);
            }
        }
        //对外公共方法
        public function compile($_ParFile){
            //解析模板内容
            $this->parVar();
            $this->parIf();
            $this->parCommon();
            $this->parForeach();
            $this->parInclude();
            $this->parConfig();
            //生成编译文件
            if(!file_put_contents($_ParFile,$this->_tpl)){
                exit('ERROR：编译文件生成错误！');
            }
        }
    }
?>
