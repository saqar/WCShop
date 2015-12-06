<?php

if(isset($_POST["ajax"]))
    require_once "../../Loader.php";

Loader::load_library("Util");

if(!Util::is_logged())
{
    header("Location: /?view=login");
}

Util::logout();
