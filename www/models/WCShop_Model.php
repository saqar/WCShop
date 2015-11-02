<?php

Loader::load_library("Database");

class WCShop_Model
{
    public static function is_login_valid($user, $sha_pass)
    {
        $db = (new Database())->connect("auth");
        $stmt = $db->prepare("SELECT * FROM account WHERE username = :user AND sha_pass_hash = :sha_pass");
        $stmt->bindParam(":user", $user);
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
    }
}
