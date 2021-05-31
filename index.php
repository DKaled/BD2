<?php 
    session_start();

    if (isset($_SESSION['usuario'])) {
        if ($_SESSION['usuario']['tipo'] == "admin") {
            header('Location: http://localhost/bd2/www/admin.php');
        } else if ($_SESSION['usuario']['tipo'] == "user") {
            header('Location: http://localhost/bd2/www/usuario.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="bootstrap-5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="js/scripts.js"></script>
</head>
<body>
    <div id="background"></div>
    <div class="login-container">
        <div class="login">
            <div class="login-logo"></div>
            <form id="loginForm" class="login-form" action="" method="POST">
                <label class="login-title">Iniciar Sesión</label>
                <label for="user" class="text">Usuario</label>
                <div class="user-input">
                    <input type="text" name="user" id="user" requiered pattern="[A-Za-z0-9_-]{1,15}" placeholder="Usuario">
                    <span class="user-icon input-group-text"><i id="userIcon" class="fas fa-user"></i></span>
                </div>
                <label for="pass" class="text">Contraseña</label>
                <div class="pass-input">
                    <input type="password" name="pass" id="pass" requiered pattern="[A-Za-z0-9_-]{1,15}" placeholder="Contraseña" data-toggle="password">
                    <div class="input-group-append">
                        <span class="eye-pass-icon input-group-text"><i id="eyePassIcon" class="fas fa-eye" onclick="togglePass()"></i></span>
                    </div>
                </div>
                <div class="btn-container">
                    <button class="login-btn" type="submit" name="submit">Conectar</button>
                </div>
            </form>
        </div>
    </div>  

</body>
</html>