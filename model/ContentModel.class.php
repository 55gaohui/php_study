<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-06-04
 * Time: 8:28
 */
//内容实体类
class ContentModel extends Model {

    //拦截器（__set）
    public function __set($_key, $_value){
        $this->$_key = Tool::mysqliString($_value);
    }
    //拦截器（__get）
    public function __get($_key){
        return $this->$_key;
    }

}
?>
