<?php
    define('USER', 'root');
    define('PASSWORD', 'Root@123');
    define('HOST', 'localhost');
    define('DATABASE', 'coupondeck');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>
