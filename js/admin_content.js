window.onload = function () {
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
function centerWindow(url,name,width,height) {
    var left = (screen.width-width)/2;
    var top = (screen.height-height)/2-50;
    window.open(url,name,'width='+width+',height='+height+',top='+top+',left='+left);

}
//验证addContent
function checkAddContent() {
    var fm=document.content;
    if(fm.nav_name.value == '' || fm.nav_name.value.length<2 || fm.nav_name.value.length>20){
        alert('导航名称不得为空或者小于2位大于20位！');
        fm.nav_name.focus();
        return false;
    }
    if(fm.nav_info.value.length>200){
        alert('导航描述不得大于200位！');
        fm.nav_info.focus();
        return false;
    }
    return true;
}