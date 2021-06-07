<?php

    $date = date("Y-m-d_H:i:s");
    $dbHost = "localhost";
    $dbName = "_pruebabd2";
    $dbUser = "root";
    $dbPass = "";
    $name = $dbName . '_' . $date . '.sql';

    $query = "C:/xampp/mysql/bin/mysqldump -u " . $dbUser . " -h " . $dbHost . " -p " . $dbName . " > C:/xampp/htdocs/BD2/backup/backup.sql";
    exec($query, $options);
?>