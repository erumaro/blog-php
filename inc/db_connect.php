<?php
$dsn = "mysql:host=localhost;dbname=blog_db";
// $dsn = "mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname=blog_db;";
$user = "root";
$password = "";
// $password = "root";
$db = new PDO($dsn, $user, $password);
$db->exec("set names utf8");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
