function  admin_top_nav(j) {
    for(i=1;i<5;i++){
        document.getElementById('nav'+i).style.background="#08A3BB";
        document.getElementById('nav'+i).style.color="#fff";
    }
    document.getElementById('nav'+j).style.background="#fff";
    document.getElementById('nav'+j).style.color="#0e47ee";
}