<?php 
    session_start();

    if (isset($_SESSION['usuario'])) {
        if ($_SESSION['usuario']['tipo'] != "usuario") {
            if ($_SESSION['usuario']['tipo'] == "admin")
            header('Location: http://localhost/bd2/www/admin.php');
        } 
    } else {
        header('Location: ../');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/scripts.js"></script>
</head>
<body>
    <h1>Usuario: <?php echo $_SESSION['usuario']['username'] ?></h1>
    <h1>Tipo: <?php echo $_SESSION['usuario']['tipo'] ?></h1>
    <a href="../php/logout.php">salir</a>
</body>
</html>