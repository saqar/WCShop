<?php

/*
**
** Developed by www.wowcore.com.br
**
*/

require_once $_SERVER["DOCUMENT_ROOT"] . "/Config.php";

class Database extends Config
{
    private $db_conn = NULL;

    public function connect($db_name)
    {
        try
        {
            $dsn = "mysql:host=" . self::$config["db_host"] . ";port=" . self::$config["db_port"] . ";dbname=" . $db_name;
            $this->db_conn = new PDO($dsn, self::$config["db_user"], self::$config["db_pass"]);
            $this->db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "DB ERROR: " . $e->getMessage();
        }
        return $this->db_conn;
    }

    public function disconnect()
    {
        $this->db_conn = NULL;
    }
}
