<?php
class autoloader_header{
    
    static function register()
    {
       spl_autoload_register(array(__CLASS__,'autoload')); 
    }
    
    static function autoload($class)
    {
        $file1 = 'class/'.$class.'.php';
        $file2 = ''.$class.'.php';
        if(file_exists($file1))
        {
            require $file1;
        }
        else
        {
            require $file2;
        }
    }
}