<?php
class Login extends MainModel
{
    public function validate()
    {
        //be9da7c1e87bdf8b57b51127e15c7712
        $username=addslashes(request('username'));
        $password= md5(addslashes(request('password')));
        $sql="select * from $this->table where username='$username'";
        
        if($info=$this->execQuery($sql))
        {
            if($info['password']==$password){
                return $info;
            }
         
        }
        return false;
    }
}
?>