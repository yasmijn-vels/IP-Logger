<?php

require_once "function.php";

$dbhost = 'localhost';
$dbname = 'ip';
$dbusername = 'ip';
$dbpassword = '';

$link = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $getUserIP = $link->prepare('INSERT INTO user_ip (user_ip) VALUES (:ip)');

    $getUserIP->execute([
        'ip' => getUserIP(),
    ]);
} catch(PDOException $e) {
    echo $e->getMessage();
}