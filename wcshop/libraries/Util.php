<?php

/*
**
** Developed by www.wowcore.com.br
**
*/

require_once $_SERVER["DOCUMENT_ROOT"] . "/Config.php";

class Util extends Config
{
    public static function get_session_data($index)
    {
        if(!isset($_SESSION))
        {
            session_start();
        }

        if(self::is_logged())
        {
            return $_SESSION[$index];
        }
        else
        {
            return null;
        }
    }

    public static function is_logged()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }

        if(isset($_SESSION["username"]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function login($username)
    {
        if(!isset($_SESSION))
        {
            session_start();
        }

        if(!self::is_logged())
        {
            $_SESSION["username"] = $username;
        }
    }

    public static function logout()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        session_destroy();
    }

    public static function generate_hash($username, $password)
    {
        $password = sha1(strtoupper($username) . ":" . strtoupper($password));
        return strtoupper($password);
    }

    public static function soap_connect($command)
    {
        try
        {
            $soap = new SoapClient(NULL, array(
                    "location" => "http://" . self::$config["soap_host"] . ":" . self::$config["soap_port"],
                    "uri"      => "urn:TC",
                    "style"    => SOAP_RPC,
                    "login"    => self::$config["soap_user"],
                    "password" => self::$config["soap_pass"]
                )
            );
            $soap->executeCommand(new SoapParam($command, "command"));
            return true;
        }
        catch (Exception $e)
        {
            return false;
        }
    }
}
