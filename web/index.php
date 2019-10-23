<?php

namespace GuideSF;

session_start();

spl_autoload_register(function ($class) {
    require_once __DIR__.'/../src/' . strtr($class, '\\', DIRECTORY_SEPARATOR) . '.php';
});

$controller = new Controller();

if (isset($_GET['view'])) {
    $controller->read();
    exit;
}

$controller->home();
