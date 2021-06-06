<?php
    include_once ('mysql.php');

    $num = isset($_POST['num']) ? (int)$_POST['num'] : 0;
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $apep = isset($_POST['apep']) ? $_POST['apep'] : "";
    $apem = isset($_POST['apem']) ? $_POST['apem'] : "";
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : "";
    $date = isset($_POST['date']) ? $_POST['date'] : "";
    $cargo = isset($_POST['cargo']) ? (int)$_POST['cargo'] : 0;
    $code = isset($_POST['code']) ? (int)$_POST['code'] : 0;
    $originalCode = isset($_POST['originalCode']) ? (int)$_POST['originalCode'] : 0;
    $selection = $_POST['selection'];

    if ($selection == "preUpdate") {
        $query = new MySQL();
        $resQuery = $query->selectIdNameEmployee(array($num));
        if ($resQuery) {
            echo json_encode(array('numNomina' => $resQuery['numNomina'], 'nombre' => $resQuery['nombre'], 'apeP' => $resQuery['apeP'], 'apeM' => $resQuery['apeM'], 'sexo' => $resQuery['sexo'], 'fechaContratacion' => $resQuery['fechaContratacion'], 'idCargo' => $resQuery['idCargo'], 'idUsuario' => $resQuery['idUsuario']));
        } else {
            echo json_encode(array('error' => true));
        }
    }

    if ($selection == "insert") {
        $query = new MySQL();
        $resQuery = $query->insertEmployee(array($num, $name, $apep, $apem, $sexo, $date, $cargo, $code));
        
        if ($resQuery) {
            echo json_encode(array('error' => false));
        } else {
            echo json_encode(array('error' => true));
        }
    } else if ($selection == "delete") {
        $query = new MySQL();
        $resQuery = $query->deleteEmployee(array($num));

        if ($resQuery) {
            echo json_encode(array('error' => false));
        } else {
            echo json_encode(array('error' => true));
        }
    } else if ($selection == "update") {
        $query = new MySQL();
        $resQuery = $query->updateEmployee(array($num, $name, $apep, $apem, $sexo, $date, $cargo, $code, $originalCode));
        print_r($resQuery);
        if ($resQuery) {
            echo json_encode(array('error' => false));
        } else {
            echo json_encode(array('error' => true));
        }
    }
    $query->closeConection();
?>