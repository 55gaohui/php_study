<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-06-14
 * Time: 8:01
 */
class ContentAction extends Action {

    public function __construct(&$_tpl){
        parent::__construct($_tpl,new ContentModel());

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
            default:
                echo '非法操作';
        }
    }
    //show
    private function show(){

    }
    //add
    private function add(){

        if(isset($_POST['send'])){
//            if(Validate::checkNull($_POST['title'])) Tool::alertBack('警告：标题不得为空！');
//            if(Validate::checkLength($_POST['title'],2,'min')) Tool::alertBack('警告：标题不得小于2位！');
//            if(Validate::checkLength($_POST['title'],50,'max')) Tool::alertBack('警告，标题不得大于50位！');
//            if(Validate::checkNull($_POST['nav'])) Tool::alertBack('警告：必须选择一个栏目！');
            if(Validate::checkLength($_POST['tag'],30,'max')) Tool::alertBack('警告，tag标签不得大于30位！');
            if(Validate::checkLength($_POST['keyword'],30,'max')) Tool::alertBack('警告，关键字不得大于30位！');
            if(Validate::checkLength($_POST['source'],20,'max')) Tool::alertBack('警告，文章来源不得大于20位！');
            if(Validate::checkLength($_POST['author'],10,'max')) Tool::alertBack('警告，发布者不得大于10位！');
            if(Validate::checkLength($_POST['info'],200,'max')) Tool::alertBack('警告，内容摘要不得大于200位！');
            if(Validate::checkNull($_POST['content'])) Tool::alertBack('警告：详细内容不得为空！');
            if(Validate::checkNum($_POST['count'])) Tool::alertBack('警告：浏览次数必须是数字！');
            if(Validate::checkNum($_POST['gold'])) Tool::alertBack('警告：消费金币必须是数字！');
            if (isset($_POST['attr'])){
                $this->_model->attr = implode('.',$_POST['attr']);
            }else{
                $this->_model->attr = '无属性';
            }
            $this->_model->title = $_POST['title'];
            $this->_model->nav = $_POST['nav'];
            $this->_model->tag = $_POST['tag'];
            $this->_model->keyword = $_POST['keyword'];
            $this->_model->thumbnail = $_POST['thumbnail'];
            $this->_model->info = $_POST['info'];
            $this->_model->source = $_POST['source'];
            $this->_model->author = $_POST['author'];
            $this->_model->content = $_POST['content'];
            $this->_model->commend = $_POST['commend'];
            $this->_model->count = $_POST['count'];
            $this->_model->gold = $_POST['gold'];
            $this->_model->color = $_POST['color'];
            $this->_model->addContent() ? Tool::alertLocation('文档发布成功！','?action=add') : Tool::alertBack('警告：文档发布失败！');
        }
        $this->_tpl->assign('add',true);
        $this->_tpl->assign('title','新增文档');
        $_nav = new NavModel();
        $_html = null;
        foreach ($_nav->getAllFrontNav() as $_object){
            $_html .= '<optgroup label="'.$_object->nav_name.'">';
            $_nav->_id  = $_object->id;
            if(!!$_childnav = $_nav->getAllChildFrontNav()){
                foreach ($_childnav as $_object){
                    $_html .= '<option value="'.$_object->id.'">'.$_object->nav_name.'</option>';
                }
            }
            $_html .= '</optgroup>';
        }
        $this->_tpl->assign('nav',$_html);
        $this->_tpl->assign('author',$_SESSION['admin']['admin_user']);
    }
    //update
    private function update(){

    }
    //delete
    private function delete(){

    }
}
?>
