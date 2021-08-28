function confirmMsg(path,msg=''){
    if(!msg){
        msg="Do you really want to delete";
    }
    if(confirm(msg)){
        location.href=path;
    }
}