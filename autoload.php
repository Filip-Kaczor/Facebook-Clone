<?php
    function autoloader($class)
    {
        $classFile = __DIR__."/app/".str_replace('\\', '/', $class) . '.php';
        if (file_exists($classFile)) {
            include $classFile;
        }
    }

    spl_autoload_register('autoloader');
?>
