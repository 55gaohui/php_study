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
        $this->_tpl->assign('add',true);
        $this->_tpl->assign('prev_url',PREV_URL);
        $this->_tpl->assign('title','新增等级');
    }
    //update
    private function update(){

    }
    //delete
    private function delete(){

    }
}
?>
