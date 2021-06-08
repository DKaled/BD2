<?php
    include_once ('mysql.php');

    $idUser = isset($_POST['idUser']) ? $_POST['idUser'] : "";
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $price = isset($_POST['price']) ? (int)$_POST['price'] : 0;
    $amount = isset($_POST['amount']) ? (int)$_POST['amount'] : 0;
    $departament = isset($_POST['department']) ? (int)$_POST['department'] : 0;
    $code = isset($_POST['code']) ? (int)$_POST['code'] : 0;
    $selection = $_POST['selection'];

    if ($selection == "preUpdate") {
        $query = new MySQL();
        $resQuery = $query->selectIdNameProduct(array($code));
        
        if ($resQuery) {
            echo json_encode(array('codBarras' => $resQuery['codBarras'], 'nombre' => $resQuery['nombre'], 'precio' => $resQuery['precio'], 'cantidad' => $resQuery['cantidad'], 'idDepartamento' => $resQuery['idDepartamento']));
        } else {
            echo json_encode(array('error' => true));
        }
    }

    if ($selection == "insert") {
        $query = new MySQL();
        $resQuery = $query->insertProduct(array($code, $name, $price, $amount, $departament));
        $callQuery = $query->callAdministra(array($idUser, $code));
        if ($resQuery) {
            echo json_encode(array('error' => false));
        } else {
            echo json_encode(array('error' => true, 'message' => "Error"));
        }
    } else if ($selection == "delete") {
        $query = new MySQL();
        $resQuery = $query->deleteProduct(array($code));
        $callQuery = $query->callAdministra(array($idUser, $code));
        if ($resQuery) {
            echo json_encode(array('error' => false));
        } else {
            echo json_encode(array('error' => true));
        }
    } else if ($selection == "update") {
        $query = new MySQL();
        $resQuery = $query->updateProduct(array($name, $price, $amount, $departament, $code));

        if ($resQuery) {
            echo json_encode(array('error' => false));
        } else {
            echo json_encode(array('error' => true));
        }
    }
    $query->closeConection();
?>