<?php
class MainView{
    public function loadview($viewname,$pera=[],$hf=1){
        $viewname=str_replace('.','/',$viewname);
        $path="app/Views/$viewname.php";
        if(file_exists($path)){
            extract($pera);
            if($hf){
                include_once "app/Views/design/header.php";
            }
            include_once $path;
            if($hf){
                include_once "app/Views/design/footer.php";
            }
        }
    }
}
?> 