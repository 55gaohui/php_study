<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-06-04
 * Time: 8:28
 */
//导航实体类
class NavModel extends Model {
    private $_id;
    private $_nav_name;
    private $_nav_info;
    private $_pid;
    private $_sort;
    private $_limit;
    //拦截器（__set）
    public function __set($_key, $_value){
        $this->$_key = Tool::mysqliString($_value);
    }
    //拦截器（__get）
    public function __get($_key){
        return $this->$_key;
    }
    //导航排序
    public function setNavSort(){
        foreach ($this->_sort as $_key=>$_value){
            if(!is_numeric($_value)) continue;
            $_sql  .= "UPDATE cms_nav SET sort='$_value' WHERE id='$_key';";
        }
        return @parent::multi($_sql);
    }
    //前台显示指定的导航
    public function getFrontNav(){
        $_sql="SELECT 
                        id,
                        nav_name
                   FROM 
                        cms_nav
                  WHERE
                        pid=0 
               ORDER BY 
                        sort ASC 
                  LIMIT
                        0,".NAV_SIZE;
        return parent::all($_sql);
    }

    //后台业务流程控制器

    //查询单个
    public function getOneNav(){
        //获取结果集
        $_sql="SELECT 
                        n1.id,
                        n1.nav_name,
                        n1.nav_info,
                        n2.id iid,
                        n2.nav_name nnav_name
                  FROM 
                        cms_nav n1
             LEFT JOIN
                        cms_nav n2
                    ON 
                        n1.pid=n2.id
                 WHERE 
                        n1.id='$this->_id' 
                    OR 
                        n1.nav_name='$this->_nav_name'
                 LIMIT 1";
        return parent::one($_sql);
    }
    //获取导航总记录
    public function getNavTotal(){
        $_sql = "SELECT COUNT(*) FROM cms_nav WHERE pid=0";
        return parent::total($_sql);
    }
    //查询所有等级带limit
    public function getAllNav(){
        //获取结果集
        $_sql="SELECT 
                        id,
                        nav_name,
                        nav_info,
                        sort
                   FROM 
                        cms_nav
                  WHERE
                        pid=0 
                  ORDER BY
                         sort ASC
                   $this->_limit";
        return parent::all($_sql);
    }
    //获取子导航总记录
    public function getChildNavTotal(){
        $_sql = "SELECT COUNT(*) FROM cms_nav WHERE pid='$this->_pid'";
        return parent::total($_sql);
    }
    //查询子导航
    public function getAllChildNav(){
        //获取结果集
        $_sql="SELECT 
                        id,
                        nav_name,
                        nav_info,
                        sort
                   FROM 
                        cms_nav
                  WHERE
                        pid='$this->_id'
               ORDER BY 
                        sort ASC
                   $this->_limit";
        return parent::all($_sql);
    }
    //查询所有子导航，不带limit
    public function getAllChildFrontNav(){
        //获取结果集
        $_sql="SELECT 
                        id,
                        nav_name,
                        nav_info,
                        sort
                   FROM 
                        cms_nav
                  WHERE
                        pid='$this->_id'
               ORDER BY 
                        sort ASC";
        return parent::all($_sql);
    }
    //新增
    public function addNav(){
        $_sql = "INSERT INTO 
                                cms_nav (
                                                nav_name,
                                                nav_info,
                                                pid,
                                                sort
                                            ) 
                                    VALUES (
                                                '$this->_nav_name',
                                                '$this->_nav_info',
                                                $this->_pid,
                                                ".parent::nextid('cms_nav')."
                                            )";
        return parent::aud($_sql);
    }
    //修改
    public function updateNav(){
        $_sql = "UPDATE 
                          cms_nav
                      SET 
                          nav_name= '$this->_nav_name',
                          nav_info='$this->_nav_info'
                    WHERE 
                          id='$this->_id'
                    LIMIT 1";
        return parent::aud($_sql);
    }
    //删除
    public function deleteNav(){
        $_sql="DELETE FROM cms_nav WHERE id='$this->_id' LIMIT 1";
        return parent::aud($_sql);
    }

}
?>
