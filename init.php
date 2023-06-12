<?php
    require_once 'models\Databaze.php';
    require_once 'models\Film.php';
    require_once 'models\Uzivatel.php';
    require_once 'models\Recenze.php';
    require_once 'models\Admin.php';
    require_once 'vendor/steampixel/simple-php-router/src/Steampixel/Route.php';



Databaze::vytvoreni('localhost', 'root', 'root', 'tom');