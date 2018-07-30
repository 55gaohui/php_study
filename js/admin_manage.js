window.onload = function () {
    var level = document.getElementById('level');
    var options = document.getElementsByTagName('option');
    if(level){
        for(var i=0; i<options.length;i++){
            if(options[i].value == level.value){
                options[i].setAttribute('selected','selected');
            }
        }
    }
    var title= document.getElementById('title');
    var ol=document.getElementsByTagName('ol');
    var a= ol[0].getElementsByTagName('a');
    for(i=0;i<a.length;i++){
        a[i].className=null;
        if(title.innerHTML == a[i].innerHTML){
            a[i].className='selected';
        }
    }

}
//验证Manageupdate
function checkUpdateForm() {
    var fm=document.update;
    if(fm.admin_pass.value != ''){
        if(fm.admin_pass.value.length<6){
            alert('密码修改不得小于6位！');
            fm.admin_pass.focus();
            return false;
        }
        if(fm.admin_pass.value != fm.admin_notpass.value){
            alert('密码和密码确认必须一致！');
            fm.admin_notpass.focus();
            return false;
        }
    }
    return true;
}
//验证Manageadd
function checkAddForm() {
    var fm=document.add;
    if(fm.admin_user.value == '' || fm.admin_user.value.length<2 || fm.admin_user.value.length>20){
        alert('用户名不得为空或者小于2位大于20位！');
        fm.admin_user.focus();
        return false;
    }
    if(fm.admin_pass.value == '' || fm.admin_pass.value.length<6){
        alert('密码不得为空或者小于6位！');
        fm.admin_pass.focus();
        return false;
    }
    if(fm.admin_pass.value != fm.admin_notpass.value){
        alert('密码和密码确认必须一致！');
        fm.admin_notpass.focus();
        return false;
    }
    return true;
}