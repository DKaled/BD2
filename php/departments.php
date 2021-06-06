<?php
    include_once ('mysql.php');

    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $code = isset($_POST['code']) ? (int)$_POST['code'] : 0;
    $originalCode = isset($_POST['originalCode']) ? (int)$_POST['originalCode'] : 0;
    $selection = $_POST['selection'];

    if ($selection == "preUpdate") {
        $query = new MySQL();
        $resQuery = $query->selectIdNameDepartment(array($code));
        
        if ($resQuery) {
            echo json_encode(array('idDepartamento' => $resQuery['idDepartamento'], 'nombre' => $resQuery['nombre']));
        } else {
            echo json_encode(array('error' => true));
        }
    }

    if ($selection == "insert") {
        $query = new MySQL();
        $resQuery = $query->insertDepartment(array($code, $name));

        if ($resQuery) {
            echo json_encode(array('error' => false));
        } else {
            echo json_encode(array('error' => true));
        }
    } else if ($selection == "delete") {
        $query = new MySQL();
        $resQuery = $query->deleteDepartment(array($code));

        if ($resQuery) {
            echo json_encode(array('error' => false));
        } else {
            echo json_encode(array('error' => true));
        }
    } else if ($selection == "update") {
        $query = new MySQL();
        $resQuery = $query->updateDepartment(array($code, $name, $originalCode));

        if ($resQuery) {
            echo json_encode(array('error' => false));
        } else {
            echo json_encode(array('error' => true));
        }
    }
    $query->closeConection();
?>