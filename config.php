<?php
    define('USER', 'root');
    define('PASSWORD', 'mItraksh@123mitraksh');
    define('HOST', 'localhost');
    define('DATABASE', 'coupondeck');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>
