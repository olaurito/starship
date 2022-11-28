<?php
include __DIR__ . "/vendor/autoload.php";

if ($_SERVER['REQUEST_URI']) {
    $url = explode('/', $_SERVER['REQUEST_URI']);
    array_shift($url);

    //ROTAS
    switch ($url[2]) {
        case 'read':
            require __DIR__ . "/App/api/read.php";
            break;
        case 'single_read':
            require __DIR__ . "/App/api/single_read.php";
            break;
        case 'create':
            require __DIR__ . "/App/api/create.php";
            break;
        case 'update':
            require __DIR__ . "/App/api/update.php";
            break;
        case 'delete':
            require __DIR__ . "/App/api/delete.php";
            break;
        default:
           echo "não há endpoint";
            break;
    }

}


