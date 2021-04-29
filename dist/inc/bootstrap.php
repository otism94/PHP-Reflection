<?php

require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/functions.php";

try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../data");
    $dotenv->load();
    $dotenv->required(["SQL_HOST", "SQL_USER", "SQL_PASS"]);
} catch (Exception $e) {
    echo "Missing required environment variables.";
}

error_reporting($_ENV["ERROR_REPORTING"]);
ini_set("display_errors", $_ENV["DISPLAY_ERRORS"]);
ini_set("html_errors", $_ENV["HTML_ERRORS"]);

spl_autoload_register(function($class) {
    require __DIR__ ."/../classes/" . $class . ".php";
});
