<?php

try {
    include __DIR__ . "/../data/sql_credentials.php";
    $db = new PDO($mysql, $sql_user, $sql_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
