<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/libraries/Loader.php";

Loader::load_library("Database");

class WCShop_Model
{
    public static function is_login_valid($username, $sha_pass)
    {
        $db = (new Database())->connect("auth");
        $stmt = $db->prepare("SELECT * FROM account WHERE username = :username AND sha_pass_hash = :sha_pass");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":sha_pass", $sha_pass);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
        $db->disconnect();
    }

    public static function get_account_id($username)
    {
        $db = (new Database())->connect("auth");
        $stmt = $db->prepare("SELECT id FROM account WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            return $stmt->fetch(PDO::FETCH_COLUMN);
        }
        else
        {
            return 0;
        }
        $db->disconnect();
    }

    public static function get_dp($username)
    {
        $account_id = self::get_account_id($username);

        $db = (new Database())->connect("wcshop");
        $stmt = $db->prepare("SELECT dp FROM account_data WHERE account_id = :account_id");
        $stmt->bindParam(":account_id", $account_id);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            return $stmt->fetch(PDO::FETCH_COLUMN);
        }
        else
        {
            return 0;
        }
        $db->disconnect();
    }
}
