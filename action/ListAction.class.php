<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-06-14
 * Time: 8:01
 */
class ListAction extends Action {

    public function __construct(&$_tpl){
        parent::__construct($_tpl);
    }
    //获取前台显示的导航
    public function getNav(){
        if(isset($_GET['id'])){
            $_nav = new NavModel();
            $_nav->_id = $_GET['id'];
            if($_nav->getOneNav()){
                //主导航
                $_nav1 ='<a href="list.php?id='.$_nav->getOneNav()->iid.'">'.$_nav->getOneNav()->nnav_name.'</a> &gt;';
                $_nav2 = '<a href="list.php?id='.$_nav->getOneNav()->id.'">'.$_nav->getOneNav()->nav_name.'</a>';
                $_nav->getOneNav()->nnav_name ? $this->_tpl->assign('nav',$_nav1.$_nav2) : $this->_tpl->assign('nav',$_nav2);
                //子导航集
                $this->_tpl->assign('childnav',$_nav->getAllChildFrontNav());

            }else{
                Tool::alertBack('警告：主导航不存在！');
            }
        }else{
            Tool::alertBack('警告：非法操作！');
        }
    }
}
?>
