<?php
namespace App\services;

class Autoload
{
 //str_replace('\\', '/', $class) . '.php';  - планирую использоваться str_replace (не хватило времени).
    //	require_once($class);
    public function loadClass($className)
    {
        $baseDir = dirname(__DIR__);

        foreach ($this->dirs as $dir) {
            $fileName = $baseDir . '/' . $dir  . '/' . $className . '.php';
            if (file_exists($fileName)) {
                include $fileName;
                return;
            }
        }
    }
}
