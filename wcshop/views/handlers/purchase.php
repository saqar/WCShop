<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/libraries/Loader.php";

Loader::load_library("Util");
Loader::load_model("WCShop_Model");

if(!Util::is_logged())
{
    header("Location: /?view=login");
}

$item = isset($_POST["item"]) ? $_POST["item"] : null;
$amount = isset($_POST["amount"]) ? $_POST["amount"] : null;
$character = isset($_POST["character"]) ? $_POST["character"] : null;

$command = '.send items ' . $character . ' "|CFFFF0000Recompensa de Doação|r" "Agradecemos pela sua doação, divirta-se!" ' . $item . ':' . $amount;

if(Util::soap_connect($command))
{
    echo 1;
}
else
{
    echo 0;
}
