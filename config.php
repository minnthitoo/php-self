<?php
    define('mysql_username', 'root');
    define('mysql_password', '');
    define('mysql_db', 'php-self');
    define('host_name', 'localhost');

    $pdoOptions = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    );

    $pdo = new PDO(
        'mysql:host='.host_name.';dbname='.mysql_db,
        mysql_username, mysql_password,
        $pdoOptions
    );
?>