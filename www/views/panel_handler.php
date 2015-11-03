<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/libraries/system/Loader.php";

Loader::load_library("Util");
Loader::load_model("WCShop_Model");

if(!Util::is_logged())
{
	header("Location: /?view=login");
}

$dp = WCShop_Model::get_dp(Util::get_session_data("username"));
