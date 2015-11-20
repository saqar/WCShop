<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/libraries/Loader.php";

Loader::load_library("Util");

if(!Util::is_logged())
{
    header("Location: /?view=login");
}

Util::logout();
