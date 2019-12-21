<?php

namespace PHPMVC\Lib;

class Autoload
{
    public static function autoload($className){
        $className = str_replace('PHPMVC' , '' , $className);
        $className = str_replace('\\' , '/' , $className);
        $className = $className . '.php';
        $className = strtolower($className);
        if (file_exists(APP_PATH . $className)){
            require APP_PATH . $className;
        }
    }
}

spl_autoload_register(__NAMESPACE__.'\Autoload::autoload');