<?php

/*
**
** Developed by www.wowcore.com.br
**
*/

class Database
{
    private $db_conn = null;

    public function connect($db_name)
    {
        try
        {
            $dsn = "mysql:host=" . Loader::load_config("db_host") . ";port=" . Loader::load_config("db_port") . ";dbname=" . $db_name;
            $this->db_conn = new PDO($dsn, Loader::load_config("db_user"), Loader::load_config("db_pass"));
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
        $this->db_conn = null;
    }
}
