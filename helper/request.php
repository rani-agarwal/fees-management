<?php
function request($key='')
{  
    $ob=(object)array('get'=>[],'post'=>[]);
 
    $ob->get=$_GET;
    unset($ob->get['url']);
    $ob->post=$_POST;
    if($key)
    {
         if(array_key_exists($key,$ob->post)){
             return $ob->post[$key];
         }
         
         if(array_key_exists($key,$ob->get)){
            return $ob->get[$key];
        }
        return null;
    }
    return $ob;
}
function dd($pera){
    echo "<pre><div style ='color:#ffffff;background:black'>";
    print_r($pera);
    echo "</div></pre>";
    exit;
}
function reDirect($path){
    $rpath=ROOT.$path;
    $rdir=<<<REDIR
             <script>
             location.href='$rpath';
             </script>
    REDIR;
    echo $rdir;
    exit;
}
function uencode($val){
    return urlencode(base64_encode($val));
}
function udecode($val){
    return base64_decode(urldecode($val));
}
function setstr($str)
{
    return ucfirst(strtolower($str));
}
?>