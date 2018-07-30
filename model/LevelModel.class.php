<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-06-04
 * Time: 8:28
 */
//等级实体类
class LevelModel extends Model {
    private $_id;
    private $_level_name;
    private $_level_info;
    private $_limit;
    //拦截器（__set）
    public function __set($_key, $_value){
        $this->$_key = Tool::mysqliString($_value);
    }
    //拦截器（__get）
    public function __get($_key){
        return $this->$_key;
    }
    //业务流程控制器
    //获取等级总记录
    public function getLevelTotal(){
        $_sql = "SELECT COUNT(*) FROM cms_level";
        return parent::total($_sql);
    }
    //查询单个
    public function getOneLevel(){
        //获取结果集
        $_sql="SELECT 
                        id,
                        level_name,
                        level_info
                  FROM 
                        cms_level 
                 WHERE 
                        id='$this->_id' 
                    OR 
                        level_name='$this->_level_name'
                 LIMIT 1";
        return parent::one($_sql);
    }
    //查询所有等级不带limit
    public function getAllLevel(){
        //获取结果集
        $_sql="SELECT 
                        id,
                        level_name,
                        level_info
                   FROM 
                        cms_level
               ORDER BY 
                        id DESC";
        return parent::all($_sql);
    }
    //查询所有等级带limit
    public function getAllLimitLevel(){
        //获取结果集
        $_sql="SELECT 
                        id,
                        level_name,
                        level_info
                   FROM 
                        cms_level
               ORDER BY 
                        id DESC 
                   $this->_limit";
        return parent::all($_sql);
    }
    //新增管理员
    public function addLevel(){
        $_sql = "INSERT INTO 
                                cms_level (
                                                level_name,
                                                level_info
                                            ) 
                                    VALUES (
                                                '$this->_level_name',
                                                '$this->_level_info'
                                            )";
        return parent::aud($_sql);
    }
    //修改管理员
    public function updateLevel(){
        $_sql = "UPDATE 
                          cms_level 
                      SET 
                          level_name= '$this->_level_name',
                          level_info='$this->_level_info'
                    WHERE 
                          id='$this->_id'
                    LIMIT 1";
        return parent::aud($_sql);
    }
    //删除管理员
    public function deleteLevel(){
        $_sql="DELETE FROM cms_level WHERE id='$this->_id' LIMIT 1";
        return parent::aud($_sql);
    }
}
?>
