<?php
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            include_once ('conection.php');
            $con = new Conexion();
            $con = $con->connect();
            //print_r($con);

            session_start();
    
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $cryptPass = md5($pass);
            //Y si en vez de usar otra tabla en usuario uso cargo?
            $query = $con->prepare("SELECT usuario.username, tipousuario.tipo FROM usuario INNER JOIN tipousuario ON usuario.idTipoUsuario = tipousuario.idTipoUsuario WHERE username = ? AND contrasenna = ?");
            $result = $query->execute(array($user, $cryptPass));
            $rows = $query->rowCount();

            if ($rows && $result) {
                $data = $query->fetch(PDO::FETCH_ASSOC);
                $_SESSION['usuario'] = $data;
                echo json_encode(array('error' => false, 'usuario' => $data['username'], 'tipo' => $data['tipo']));
            } else {
                echo json_encode(array('error' => true));
            }

            $con = NULL;
        }
?>