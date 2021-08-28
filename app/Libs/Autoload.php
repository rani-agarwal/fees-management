<?php
class Autoload
{
    public function __construct()
        {
        Session::init();
        if(isset($_GET['url'])){
                $url=explode('/',rtrim($_GET['url'],'/'));
                $controllername=ucfirst(strtolower($url[0])).'Controller';
                $methodname=strtolower($url[1]??'index');
                $pera = $url[2]??'';
        }      
        if(Session::get('logininfo'))
        { 
                if(isset($controllername) && $controllername=='LoginController'&& $methodname=='login')
                {
                        $controllername='StudentController';
                        $methodname='index';
                }else
                {
                        $controllername= $controllername ??'StudentController';
                        $methodname=$methodname??'index';
                }
        }else{
                $controllername='LoginController';
                $methodname='login';
        }
         $pera = $pera??'';
         $path="app/Controllers/$controllername.php";
    if(file_exists($path)){
            include_once $path;
            $ob=new $controllername();
            if(method_exists($ob,$methodname)){

                $ob->$methodname($pera);
    }else{
                 echo " method not found";
         }
        }
else{
         echo "404 file not found";
    }     
    }
}
?>