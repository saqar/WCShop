<?php

/*
**
** Developed by www.wowcore.com.br
**
*/

require_once $_SERVER["DOCUMENT_ROOT"] . "/libraries/Loader.php";

Loader::load_library("Database");

class WCShop_Model
{
    public static function is_login_valid($username, $sha_pass)
    {
        $db = new Database();
        $stmt = $db->connect("auth")->prepare("SELECT id FROM account WHERE username = :username AND sha_pass_hash = :sha_pass");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":sha_pass", $sha_pass);
        $stmt->execute();

        $result = null;
        if($stmt->rowCount() > 0)
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        $db->disconnect();
        return $result;
    }

    public static function get_account_id($username)
    {
        $db = new Database();
        $stmt = $db->connect("auth")->prepare("SELECT id FROM account WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $result = null;
        if($stmt->rowCount() > 0)
        {
            $result = $stmt->fetch(PDO::FETCH_COLUMN);
        }
        else
        {
            $result = 0;
        }
        $db->disconnect();
        return $result;
    }

    public static function get_dp($account_id)
    {
        $db = new Database();
        $stmt = $db->connect("wcshop")->prepare("SELECT dp FROM account_data WHERE account_id = :account_id");
        $stmt->bindParam(":account_id", $account_id);
        $stmt->execute();

        $result = null;
        if($stmt->rowCount() > 0)
        {
            $result = $stmt->fetch(PDO::FETCH_COLUMN);
        }
        else
        {
            $result = 0;
        }
        $db->disconnect();
        return $result;
    }

    public static function set_dp($account_id, $dp)
    {
        $db = new Database();
        $stmt = $db->connect("wcshop")->prepare("UPDATE account_data SET dp = :dp WHERE account_id = :account_id");
        $stmt->bindParam(":dp", $dp);
        $stmt->bindParam(":account_id", $account_id);
        $stmt->execute();
    }

    public static function get_items_store()
    {
        $db = new Database();
        $stmt = $db->connect("wcshop")->prepare("SELECT a1.item AS id, a2.name AS name, a1.price AS price FROM wcshop.item_store AS a1 LEFT JOIN world.item_template AS a2 ON a1.item = a2.entry");
        $stmt->execute();

        $result = null;
        if($stmt->rowCount() > 0)
        {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $result = array();
        }
        $db->disconnect();
        return $result;
    }

    public static function get_account_characters($account_id)
    {
        $db = new Database();
        $stmt = $db->connect("characters")->prepare("SELECT name FROM characters WHERE account = :account_id");
        $stmt->bindParam(":account_id", $account_id);
        $stmt->execute();

        $result = null;
        if($stmt->rowCount() > 0)
        {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $result = array();
        }
        $db->disconnect();
        return $result;
    }
}
