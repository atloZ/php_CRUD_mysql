<?php
    include 'database.php';
    include 'db_data.php';

    $database = new Database("localhost:3306", "root", "root", "apiMysql");
    $db_data = new Db_data($database->getConnection());
?>