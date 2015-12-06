<?php

if(isset($_POST["ajax"]))
    require_once "../../Loader.php";

Loader::load_library("Util");
Loader::load_model("WCShop_Model");

$user = isset($_POST["username"]) ? $_POST["username"] : null;
$pass = isset($_POST["password"]) ? $_POST["password"] : null;

if(!$user || !$pass)
{
    header("Location: /?view=login");
}

$sha_pass = Util::generate_hash($user, $pass);

if(WCShop_Model::is_login_valid($user, $sha_pass))
{
    Util::login($user);
    die("1");
}
else
{
    die("0");
}
