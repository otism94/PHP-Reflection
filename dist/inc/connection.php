<?php

try {
    $db = new PDO($_ENV["SQL_HOST"], $_ENV["SQL_USER"], $_ENV["SQL_PASS"]);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
