<?php
$server = 'localhost';
$username = 'root';
$password = '';
$bd = 'php_login_bd';

try {
    $conn = new PDO("mysql:host=$server;dbname=$bd;",$username,$password);
} catch (PDOException $ERROR) {
    die('Connected failed:'.$e->getMessage());
}