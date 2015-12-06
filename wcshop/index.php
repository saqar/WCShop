<?php

/*
**
** Developed by www.wowcore.com.br
**
*/

require_once "Loader.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="<?php echo Loader::load_config("meta_author"); ?>">
    <meta name="description" content="<?php echo Loader::load_config("meta_description"); ?>">
    <meta name="keywords" content="<?php echo Loader::load_config("meta_keywords"); ?>">

    <title><?php echo Loader::load_config("title"); ?></title>

    <link rel="stylesheet" type="text/css" href="_public/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="_public/css/main.css">

    <link rel="icon" type="image/x-icon" href="_public/img/favicon.png">

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="http://cdn.openwow.com/api/tooltip.js"></script>
    <script type="text/javascript" src="_public/js/main.js"></script>
</head>
<body>
    <header>
        <section>
            <img src="_public/img/logo.jpg" alt="Logo">
        </section>
    </header>
    <div class="box">
        <main>
            <?php
                Loader::load_view();
            ?>
        </main>
        <footer>
            <p>Designed by <a href="http://www.wowcore.com.br" target="_blank">WoWCore</a>.</p>
            <p>WCShop - Online shop for World Of Warcraft private servers.</p>
        </footer>
    </div>
</body>
</html>
