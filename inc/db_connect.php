<?php
/*
$dsn = 'mysql:host=localhost;dbname=blog_db';
// $dsn = "mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname=blog_db;";
$username = 'root';
$password = '';
// $password = 'root';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

$db = new PDO($dsn, $username, $password, $options);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/
$db = new PDO("mysql:host=localhost;dbname=blog_db;", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
