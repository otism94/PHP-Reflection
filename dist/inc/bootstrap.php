<?php

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/functions.php";

try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../data");
    $dotenv->load();
    $dotenv->required(["SQL_HOST", "SQL_USER", "SQL_PASS"]);
} catch (Exception $e) {
    echo "Environment variable error. Please ensure the required variables have been set up.";
}

spl_autoload_register(function($class) {
    require __DIR__ ."/../classes/" . $class . ".php";
});
