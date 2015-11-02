<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/libraries/system/Loader.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="<?php echo Loader::load_config("meta_author"); ?>">
    <meta name="description" content="<?php echo Loader::load_config("meta_description"); ?>">
    <meta name="keywords" content="<?php echo Loader::load_config("meta_keywords"); ?>">

    <title><?php echo Loader::load_config("title"); ?></title>

    <link rel="stylesheet" type="text/css" href="public/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="public/fonts/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald:300,400,700">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT+Sans:400,700">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Orbitron:400,500,700,900">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cinzel:400,700,900">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Electrolize">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Cantarell">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ruda">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Actor">

    <link rel="icon" type="image/x-icon" href="public/img/favicon.png">

    <script type="text/javascript" src="public/js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="public/js/main.js"></script>
</head>
<body>
    <header>
        <section>
            <img src="" alt="Logo">
        </section>
    </header>
    <div class="box">
        <main>
            <?php
                Loader::load_view(isset($_GET["view"]) ? $_GET["view"] : null);
            ?>
        </main>
        <footer>
            <p>Designed by WoWCore.</p>
            <p>WCShop - Online shop for World Of Warcraft private servers</p>
        </footer>
    </div>
</body>
</html>
