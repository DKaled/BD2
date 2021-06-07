<?php
    unlink("../sql/minisuper.sql");
    exec('mysqldump --user=root --password="" --host=localhost minisuper > C:/xampp/htdocs/BD2/sql/minisuper.sql');
?>