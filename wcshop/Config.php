<?php

/*
**
** Developed by www.wowcore.com.br
**
*/

class Config
{
    public static $config = array(
        // Page Config
        "title"            => "WC Shop - Online shop for World Of Warcraft",
        "meta_author"      => "WoWCore",
        "meta_description" => "Online shop for World Of Warcraft private servers",
        "meta_keywords"    => "wowcore, wow, donate, shop, store, item",

        // General Config
        "email" => "email@email.com",

        // Database Config
        "db_host" => "localhost",
        "db_port" => "3306",
        "db_user" => "trinity",
        "db_pass" => "trinity",

        // Soap Config - Set [SOAP.Enabled = 1] in the worldserver.conf file
        "soap_host" => "127.0.0.1",
        "soap_port" => "7878",
        "soap_user" => "account",
        "soap_pass" => "password",
    );
}
