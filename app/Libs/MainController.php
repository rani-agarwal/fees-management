<?php
class MainController{
    public $view;
    public function __construct()
    {
        $this->view=new MainView();
    }
    public function loadModel($modelname,$ob=''){
     if($ob==''){
            $ob=strtolower($modelname);
        }
        $modelname=ucfirst(strtolower($modelname));
        $path="app/Models/$modelname.php";
        if(file_exists($path)){
            include_once $path;
            $this->$ob= new $modelname();
        }
    } 
}
?>