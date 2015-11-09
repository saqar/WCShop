<?php

/*
**
** Developed by www.wowcore.com.br
**
*/

require_once $_SERVER["DOCUMENT_ROOT"] . "/Config.php";

class Loader extends Config
{
    private function load($folder, $file)
    {
        $path_success = $_SERVER["DOCUMENT_ROOT"] . "/" . $folder . "/" . $file . ".php";
        $path_failure = $_SERVER["DOCUMENT_ROOT"] . "/" . $folder . "/" . "login" . ".php";
        $path = is_file($path_success) ? $path_success : $path_failure;
        include_once "" . $path . "";
    }

    public static function load_config($key)
    {
        return self::$config[$key];
    }

    public static function load_library($library)
    {
        self::load("libraries", $library);
    }

    public static function load_model($model)
    {
        self::load("models", $model);
    }

    public static function load_view($view)
    {
        self::load("views", $view);
    }
}
