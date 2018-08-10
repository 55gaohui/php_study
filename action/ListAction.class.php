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
    //执行
    public function _action(){
        $this->getNav();
        $this->getListContent();
    }
    //获取前台列表显示
    private function getListContent(){
        if(isset($_GET['id'])){
            parent::__construct($this->_tpl,new ContentModel());
            $this->_model->id = $_GET['id'];
            $_navid = $this->_model->getNavchild();
            if($_navid){
                $this->_model->nav = Tool::objArrStr($_navid,'id');
            }else{
                $this->_model->nav = $this->_model->id;
            }
            parent::page($this->_model->getListContentTotal(),ARTICLE_SIZE);
            $_object = $this->_model->getListContent();
            $_object = Tool::subStr($_object,'info',120,'utf-8');
            $_object = Tool::subStr($_object,'title',35,'utf-8');
            $this->_tpl->assign('AllListContent',$_object);
        }else{
            Tool::alertBack('警告：非法操作！');
        }
    }
    //获取前台显示的导航
    private function getNav(){
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
