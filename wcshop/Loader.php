<?php

/*
**
** Developed by www.wowcore.com.br
**
*/

define("BASEPATH", __DIR__);

require_once BASEPATH . "/Config.php";

class Loader
{
    public static function load_library($library)
    {
        require_once BASEPATH . "/libraries/" . $library . ".php";
    }

    public static function load_model($model)
    {
        require_once BASEPATH . "/models/" . $model . ".php";
    }

    public static function load_view()
    {
        $page = isset($_GET["view"]) ? $_GET["view"] : null;

        if($page)
        {
            require_once BASEPATH . "/views/" . $page . ".php";
        }
        else
        {
            require_once BASEPATH . "/views/" . self::load_config("default_view_page") . ".php";
        }
    }

    public static function load_config($index)
    {
        return Config::$config[$index];
    }
}
