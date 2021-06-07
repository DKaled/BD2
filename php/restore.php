<?php
    require ('mysql.php');

    $sql= file_get_contents('../sql/scriptBackup.sql');
	echo exec($sql);   
?>