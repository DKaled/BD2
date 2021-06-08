<?php
    include_once ('mysql.php');

    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $cryptContrasenna = isset($_POST['cryptContrasenna']) ? $_POST['cryptContrasenna'] : "";
    $type = isset($_POST['type']) ? (int)$_POST['type'] : 0;
    $code = isset($_POST['code']) ? (int)$_POST['code'] : 0;
    $originalCode = isset($_POST['originalCode']) ? (int)$_POST['originalCode'] : 0;
    $selection = $_POST['selection'];

    if ($selection == "preUpdate") {
        $query = new MySQL();
        $resQuery = $query->selectIdNameUser(array($code));
        
        if ($resQuery) {
            echo json_encode(array('idUsuario' => $resQuery['idUsuario'], 'username' => $resQuery['username'], 'contrasenna' => $resQuery['contrasenna'], 'idTipoUsuario' => $resQuery['idTipoUsuario']));
        } else {
            echo json_encode(array('error' => true));
        }
    }

    if ($selection == "insert") {
        $query = new MySQL();
        $resQuery = $query->insertUser(array($code, $name, $cryptContrasenna, $type));

        if ($resQuery) {
            echo json_encode(array('error' => false));
        } else {
            echo json_encode(array('error' => true));
        }
    } else if ($selection == "delete") {
        $query = new MySQL();
        $resQuery = $query->deleteUser(array($code));

        if ($resQuery) {
            echo json_encode(array('error' => false));
        } else {
            echo json_encode(array('error' => true));
        }
    } else if ($selection == "update") {
        $query = new MySQL();
        $resQuery = $query->updateUser(array($code, $name, $type, $originalCode));

        if ($resQuery) {
            echo json_encode(array('error' => false));
        } else {
            echo json_encode(array('error' => true));
        }
    }
    $query->closeConection();
?>