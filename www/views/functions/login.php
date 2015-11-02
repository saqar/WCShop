<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/libraries/system/Loader.php";

Loader::load_library("Util");
Loader::load_model("WCShop_Model");

$user = isset($_POST["username"]) ? $_POST["username"] : null;
$pass = isset($_POST["password"]) ? $_POST["password"] : null;

if($user != null && $pass != null)
{
    $sha_pass = Util::generate_hash($user, $pass);

    if(WCShop_Model::is_login_valid($user, $sha_pass))
    {
        Util::login($user, $sha_pass);
        echo 1;
    }
    else
    {
        echo 0;
    }
}
else
{
    Header("Location: /?view=login");
}
