<?php


spl_autoload_register(array("Autoloader", "autoload"));

class Autoloader
{
    private static $autoloadPathArray = array(
        "Template.php"
    );

    // TODO 未来要支持多级目录，暂时只支持二级目录
    public static function autoload()
    {
        foreach (self::$autoloadPathArray as $autoloadPath) {
            $autoloadPath = __DIR__ . "Autoloader.php/" . $autoloadPath;
            if (is_file($autoloadPath) and end(explode(".", $autoloadPath)) == "php") {
                require_once $autoloadPath;
            } else {
                $fileList = scandir($autoloadPath);
                foreach ($fileList as $file) {
                    if ($file != ".." && $file != ".") {
                        require_once $autoloadPath."/".$file;
                    }
                }
            }
        }
    }

    public static function addAutoloadPath($path)
    {
        array_push(self::$autoloadPathArray, $path);
    }
}
