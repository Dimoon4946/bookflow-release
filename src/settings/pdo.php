<?php
function getConnection() {
    $dsn = 'mysql:host=localhost;dbname=bookflow;charset=utf8';
    $user = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return [true, $pdo];
    } catch (PDOException $e) {
        return [false, $e->getMessage()];
    }
}