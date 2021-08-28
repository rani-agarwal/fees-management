<?php
//echo md5('rani@agarwal');//used to encruption.
include_once "config/env.php";
include_once "helper/request.php";
include_once "app/Libs/Session.php";
spl_autoload_register(function($classname){
    require_once( "app/Libs/$classname.php");
});
$auto_obj=new Autoload();
?>
