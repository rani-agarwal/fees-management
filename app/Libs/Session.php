<?php
class Session
{
    public static function init()
    {
        @session_start();
    }
    public static function set($key,$value)
    {
        $_SESSION[$key]=$value;
    }
    public static function get($key)
    {
       if(array_key_exists($key,$_SESSION))
       {
           return $_SESSION[$key];
       }
       return null;
    }
    public static function delete($key)
    {
        if(array_key_exists($key,$_SESSION)){
            unset($_SESSION[$key]);
        }
    }
    public static function destroy()
    { 
        session_destroy();
    }
}
?>