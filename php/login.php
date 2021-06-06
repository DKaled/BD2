<?php
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            include_once ('mysql.php');

            session_start();
    
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $cryptPass = md5($pass);

            $query = new MySQL();
            $resQuery = $query->login(array($user, $cryptPass));
            $rows = $resQuery->rowCount();

            if ($rows && $resQuery) {
                $data = $resQuery->fetch(PDO::FETCH_ASSOC);
                $_SESSION['usuario'] = $data;
                echo json_encode(array('error' => false, 'usuario' => $data['username'], 'tipo' => $data['tipo']));
            } else {
                echo json_encode(array('error' => true));
            }

            $query->closeConection();
        }
?>