<?php

spl_autoload_register(function($classname)
{
    $namespace = lcfirst(str_replace("\\", "/", $classname));
    $path = __DIR__ . '/../' . $namespace . '.php';
    //$path = __DIR__ . '/../app/' . $namespace . '.php';
    if(file_exists($path))
    {
        require_once($path);
    }
    else
    {
        $class_map = require_once 'rqb/autoload_classmap.php';
        require_once $class_map[$classname];
    }
});
