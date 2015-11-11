<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/libraries/Loader.php";

Loader::load_library("Util");
Loader::load_model("WCShop_Model");

if(!Util::is_logged())
{
    header("Location: /?view=login");
}

$username = Util::get_session_data("username");
$account_id = WCShop_Model::get_account_id($username);
$dp = WCShop_Model::get_dp($account_id);
$characters = WCShop_Model::get_account_characters($account_id);
$items = WCShop_Model::get_items_store();
