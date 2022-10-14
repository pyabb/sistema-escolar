<?php

$class_map = include_once 'rqb/autoload_classmap.php';


spl_autoload_register(function($classname) use ($class_map) {
    $namespace = lcfirst(str_replace("\\", "/", $classname));
    $path = __DIR__ . '/../' . $namespace . '.php';
    //$path = __DIR__ . '/../app/' . $namespace . '.php';
    if(file_exists($path))
    {
        include_once($path);
    }
    else
    {
        include_once $class_map[$classname];
    }
});
