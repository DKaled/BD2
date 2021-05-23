<?php
    echo "<script>console.log('hola');</script>";
    session_start();
    include_once "conection.php";
    $con = new Conexion();
    $con = $con->connect();
    print_r($con);

    //Recepción de datos POST
    $dbUser = (isset($_POST["userName"])) ? $_POST["userName"] : "";
    $dbPass = (isset($_POST["pass"])) ? $_POST["pass"] : "";

    $cryptDBPass = md5($dbPass);

    $query = "SELECT * FROM usuario WHERE usuario = '$dbUser' AND contraseña = '$cryptDBPass'";
    $result = $con->prepare($query);
    $result->execute();

    if ($result->rowCount() >= 1) {
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["s_user"] = $dbUser;
    } else {
        $_SESSION["s_user"] = NULL;
        $data = NULL;
    }

    print json_encode($data);
    $con = NULL;
?>