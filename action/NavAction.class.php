<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-06-14
 * Time: 8:01
 */
class NavAction extends Action {

    public function __construct(&$_tpl){
        parent::__construct($_tpl,new NavModel());

    }
    public function _action(){
        switch(@$_GET['action']){
            case 'show':
                $this->show();
                break;
            case 'add':
                $this->add();
                break;
            case 'update':
                $this->update();
                break;
            case 'delete':
                $this->delete();
                break;
            case 'addchild':
                $this->addchild();
                break;
            case 'showchild':
                $this->showchild();
                break;
            case 'sort':
                $this->sort();
                break;
            default:
                exit('非法操作');
        }
    }
    // showfront
    public function showfront(){
        $this->_tpl->assign('FrontNav',$this->_model->getFrontNav());
    }
    //sort
    public function sort(){
        if(@isset($_POST['send'])){
            $this->_model->_sort = $_POST['sort'];
            if($this->_model->setNavSort()) Tool::alertLocation(null,PREV_URL);
        }
    }
    //addchild
    private function addchild(){
        if(isset($_POST['send'])){
            $this->add();
        }
        if(isset($_GET['id'])){
            $this->_model->_id=$_GET['id'];
            $_nav = $this->_model->getOneNav();
            is_object($_nav) ? true : Tool::alertBack('导航传值ID有误！');
            $this->_tpl->assign('pid',$_nav->id);
            $this->_tpl->assign('addchild',true);
            $this->_tpl->assign('title','新增子导航');
            $this->_tpl->assign('prev_name',$_nav->nav_name);
            $this->_tpl->assign('prev_url',PREV_URL);
        }
    }
    //showchild
    private function showchild(){
        if(isset($_GET['id'])){
            $this->_model->_id=$_GET['id'];
            $_nav = $this->_model->getOneNav();
            is_object($_nav) ? true : Tool::alertBack('导航传值ID有误！');
            parent::page($this->_model->getNavTotal());
            $this->_tpl->assign('showchild',true);
            $this->_tpl->assign('id',$_GET['id']);
            $this->_tpl->assign('title','子导航列表');
            $this->_tpl->assign('allChildNav',$this->_model->getAllChildNav());
            $this->_tpl->assign('prev_name',$_nav->nav_name);
        }
    }
    //show
    private function show(){
        parent::page($this->_model->getNavTotal());
        $this->_tpl->assign('show',true);
        $this->_tpl->assign('title','导航列表');
        $this->_tpl->assign('allNav',$this->_model->getAllNav());
    }
    //add
    private function add(){
        if(isset($_POST['send'])){
            if(Validate::checkNull($_POST['nav_name'])) Tool::alertBack('警告，导航名称不得为空！');
            if(Validate::checkLength($_POST['nav_name'],2,'min')) Tool::alertBack('警告，导航名称不得小于2位！');
            if(Validate::checkLength($_POST['nav_name'],20,'max')) Tool::alertBack('警告，导航名称不得大于20位！');
            if(Validate::checkLength($_POST['nav_info'],200,'max')) Tool::alertBack('警告，导航描述不得大于200位！');
            $this->_model->_nav_name = $_POST['nav_name'];
            $this->_model->_pid = $_POST['pid'];
            $_returnurl = $this->_model->_pid ? 'nav.php?action=showchild&id='.$this->_model->_pid : 'nav.php?action=show';
            if($this->_model->getOneNav()) Tool::alertBack('警告，此导航名称被占用！');
            $this->_model->_nav_info = $_POST['nav_info'];
            $this->_model->addNav() ? Tool::alertLocation('恭喜你，新增导航成功！',$_returnurl) : Tool::alertBack('新增导航失败！');
        }
        $this->_tpl->assign('add',true);
        $this->_tpl->assign('prev_url',PREV_URL);
        $this->_tpl->assign('title','新增导航');
    }
    //update
    private function update(){
        if(isset($_POST['send'])){
            if(Validate::checkNull($_POST['nav_name'])) Tool::alertBack('警告，导航名称不得为空！');
            if(Validate::checkLength($_POST['nav_name'],2,'min')) Tool::alertBack('警告，导航名称不得小于2位！');
            if(Validate::checkLength($_POST['nav_name'],20,'max')) Tool::alertBack('警告，导航名称不得大于20位！');
            if(Validate::checkLength($_POST['nav_info'],200,'max')) Tool::alertBack('警告，导航描述不得大于200位！');
            $this->_model->_id=$_POST['id'];
            $this->_model->_nav_name=$_POST['nav_name'];
            $this->_model->_nav_info=$_POST['nav_info'];
            $this->_model->updateNav() ? Tool::alertLocation('恭喜你修改导航成功！',@$_POST['prev_url']) : Tool::alertBack('很遗憾，修改导航失败！');
        }
        if(isset($_GET['id'])){
            $this->_model->_id=$_GET['id'];
            $_nav = $this->_model->getOneNav();
            is_object($_nav) ? true : Tool::alertBack('导航传值ID有误！');
            $this->_tpl->assign('id',$_nav->id);
            $this->_tpl->assign('nav_name',$_nav->nav_name);
            $this->_tpl->assign('nav_info',$_nav->nav_info);
            $this->_tpl->assign('prev_url',PREV_URL);
            $this->_tpl->assign('update',true);
            $this->_tpl->assign('title','修改导航');
        }else{
            Tool::alertBack('非法操作！');
        }
    }
    //delete
    private function delete(){
        if(isset($_GET['id'])){
            $this->_model->_id=$_GET['id'];
            $this->_model->deleteNav() ? Tool::alertLocation('恭喜你，删除导航成功！',PREV_URL) : Tool::alertBack('很遗憾删除导航失败！');
        }else{
            Tool::alertBack('非法操作！');
        }
    }
}
?>
