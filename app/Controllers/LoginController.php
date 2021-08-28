<?php
class LoginController extends MainController
{
    public function __construct(){

        parent::__construct();
        $this->loadModel('Login');
    }
    public function login()
    {
        $valid=1;
        $error='<ul>';
        if(request('username'))
            {
                if(!preg_match('/^[A-z]{3,25}$/',request('username')))
                {
                        $error.='<li>Enter a valid username</li>';
                        $valid=0;
                }
                if(!trim(request('password')))
                {
                        $error.='<li>Enter a valid password</li>';
                        $valid=0;
                }
                if($valid)
                {
                   if($info=$this->login->validate())
                {
                    Session::set('logininfo',$info);
                    reDirect('student');
                    
                }else{
                    $error.='<li>Enter a valid username or password</li>';
                    $valid=0;
                }
            }
                $error.="</ul>";
                if(!$valid)
                {
                    Session::set('emsg',$error);
                }
            }
        $this->view->loadview('login/login');
         
        }  
        public function logout(){
            Session::destroy();
            reDirect('login/login');
        } 
}        
?>