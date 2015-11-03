<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/libraries/system/Loader.php";

Loader::load_library("Util");

Util::logout();

header("Location: /?view=login");
