<?php

if(isset($_POST["ajax"]))
    require_once "../../Loader.php";

Loader::load_library("Util");
Loader::load_model("WCShop_Model");

$item = isset($_POST["item"]) ? $_POST["item"] : null;
$price = isset($_POST["price"]) ? $_POST["price"] : null;
$amount = isset($_POST["amount"]) ? $_POST["amount"] : null;
$character = isset($_POST["character"]) ? $_POST["character"] : null;

if(!Util::is_logged() || !$item || !$price || !$amount)
{
    header("Location: /?view=login");
}

$total = $price * $amount;

$username = Util::get_session_data("username");
$account_id = WCShop_Model::get_account_id($username);

$cur_dp = WCShop_Model::get_dp($account_id);

if($cur_dp < $total)
{
    die("2");
}

$command = '.send items ' . $character . ' "|CFFFF0000Donation Reward|r" "Thank you for your donation, enjoy!" ' . $item . ':' . $amount;
if(Util::soap_connect($command))
{
    $new_dp = $cur_dp - $total;
    WCShop_Model::set_dp($account_id, $new_dp);
    die("1");
}

die("0");
