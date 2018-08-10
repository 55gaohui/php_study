<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-06-14
 * Time: 8:01
 */
class DetailsAction extends Action {

    public function __construct(&$_tpl){
        parent::__construct($_tpl);
    }
    //执行
    public function _action(){
        $this->getDetails();
    }
    //获取文档详细内容
    private function getDetails(){
        if(isset($_GET['id'])){
            parent::__construct($this->_tpl,new ContentModel());
            $this->_model->id = $_GET['id'];
            $_content = $this->_model->getOneContent();
            if(!$_content) Tool::alertBack('不存在此文档！');
            $this->_tpl->assign('title_c',$_content->title);
            $this->_tpl->assign('count',$_content->count);
            $this->_tpl->assign('date',$_content->date);
            $this->_tpl->assign('source',$_content->source);
            $this->_tpl->assign('author',$_content->author);
            $this->_tpl->assign('info',$_content->info);
            $this->_tpl->assign('content',Tool::unHtml($_content->content));
            $this->getNav($_content->nav);
        }else{
            Tool::alertBack('非法操作！');
        }
    }
    //获取前台显示的导航
    private function getNav($_id){
        $_nav = new NavModel();
        $_nav->_id = $_id;
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
    }
}
?>
