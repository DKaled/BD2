<?php 
    include_once ('../php/mysql.php');
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('Location: ../');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/core.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>
    <link rel="stylesheet" href="../bootstrap-5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="../js/scripts.js"></script>
</head>
<body>
    <div id="fullContainer">
        <div class="sidebar-container">
            <div class="sidebar">
                <div class="image"></div>
                <h5 class="sidebar-user"><span class="material-icons">account_circle</span><?php echo $_SESSION['usuario']['username'] ?></h5>
                <h5 class="sidebar-item selection departamentos" onclick="changePageAdmin('Departamentos')"><span class="material-icons">store</span>Departamentos</h5>
                <h5 class="sidebar-item selection productos" onclick="changePageAdmin('Productos')"><span class="material-icons">shopping_cart</span>Productos</h5>
                <h5 class="sidebar-item selection usuarios" onclick="changePageAdmin('Usuarios')"><span class="material-icons">people</span>Usuarios</h5>
                <h5 id="actual" class="sidebar-item selection empleados" onclick="changePageAdmin('Empleados')"><span class="material-icons">badge</span>Empleados</h5>
                <h5 class="sidebar-item selection cargos" onclick="changePageAdmin('Cargos')"><span class="material-icons">inventory</span>Cargos</h5>
                <h5 class="sidebar-item selection" onclick="logout()"><span class="material-icons">logout</span>Cerrar sesión</h5>
                <form id="form-backup" action="" method="POST">
                    <input class="backup"  type="submit" value="Backup">
                </form>
                <form id="form-script" action="" method="POST">
                    <input class="script-code"  type="submit" value="Script">
                </form>
            </div>    
        </div>

        <div id="table-container">
            <div class="table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nómina</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">A. paterno</th>
                            <th scope="col">A. materno</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">F. contratación</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Usuario</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php  
                        $query = new MySQL();
                        $data = $query->selectAllEmployee();
                        foreach ($data as $row) { ?>
                            <tr>
                                <th scope="row"><?php echo $row->numNomina ?></th>
                                <td><?php echo $row->nombre ?></td>
                                <td><?php echo $row->apeP ?></td>
                                <td><?php echo $row->apeM ?></td>
                                <td><?php echo $row->sexo ?></td>
                                <td><?php echo $row->fechaContratacion ?></td>
                                <td><?php echo $row->idCargo ?></td>
                                <td><?php echo $row->idUser ?></td>
                                <td class="row-btn"><button class="btn btn-primary update-employee" code="<?php echo $row->numNomina ?>">Actualizar</button></td>
                                <td class="row-btn"><button class="btn btn-danger delete-employee" code="<?php echo $row->numNomina ?>">Borrar</button></td>
                            </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
            <button class="btn btn-success insert add-employee">Agregar</button>    
            <button class="btn btn-outline-info report-employee">Generar reporte</button>            
        </div>
    </div>

    <div id="insert-modal" class="modal">
        <div class="body-modal">
            <form action="" method="post" name="form-add-employee" id="form-add-employee">
                <div>
                    <h2>Numero de nómina</h2>
                    <input type="number" name="employee-num" id="employee-num" placeholder="Número de nómina" required autocomplete="off">
                </div>
                <div>
                    <h2>Nombre</h2>
                    <input type="text" name="employee-name" id="employee-name" placeholder="Nombres" required autocomplete="off">
                </div>
                <div>
                    <h2>Apellido paterno</h2>
                    <input type="text" name="employee-apep" id="employee-apep" placeholder="Apellido paterno" required autocomplete="off">
                </div>
                <div>
                    <h2>Apellido materno</h2>
                    <input type="text" name="employee-apem" id="employee-apem" placeholder="Apellido materno" required autocomplete="off">
                </div>
                <div>
                    <h2>Sexo</h2>
                    <input type="text" name="employee-sexo" id="employee-sexo" placeholder="Sexo" required autocomplete="off">
                </div>
                <div>
                    <h2>Fecha de contratacion</h2>
                    <input type="date" name="employee-date" id="employee-date" placeholder="aaaa/mm/dd" required autocomplete="off">
                </div>            
                <div>
                    <h2>ID de cargo</h2>
                    <input type="number" name="employee-cargo" id="employee-cargo" min="1" placeholder="Cargo" required autocomplete="off">
                </div>
                <div>
                    <h2>ID de usuario</h2>
                    <input type="number" name="employee-code" id="employee-code" min="1" placeholder="ID de usuario" required autocomplete="off">
                </div>
                <div>
                    <button class="btn btn-warning" onclick="closeModal()">Cerrar</button>
                    <button id="insert-employee" type="submit" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="update-modal" class="modal">
        <div class="body-modal">
            <form action="" method="post" name="form-update-employee" id="form-update-employee">
            <div>
                    <h2>Numero de nómina</h2>
                    <input type="number" name="employee-num-update" id="employee-num-update" placeholder="Número de nómina" required autocomplete="off">
                </div>
                <div>
                    <h2>Nombre</h2>
                    <input type="text" name="employee-name-update" id="employee-name-update" placeholder="Nombres" required autocomplete="off">
                </div>
                <div>
                    <h2>Apellido paterno</h2>
                    <input type="text" name="employee-apep-update" id="employee-apep-update" placeholder="Apellido paterno" required autocomplete="off">
                </div>
                <div>
                    <h2>Apellido materno</h2>
                    <input type="text" name="employee-apem-update" id="employee-apem-update" placeholder="Apellido materno" required autocomplete="off">
                </div>
                <div>
                    <h2>Sexo</h2>
                    <input type="text" name="employee-sexo-update" id="employee-sexo-update" placeholder="Sexo" required autocomplete="off">
                </div>
                <div>
                    <h2>Fecha de contratacion</h2>
                    <input type="date" name="employee-date-update" id="employee-date-update" placeholder="aaaa/mm/dd" required autocomplete="off">
                </div>            
                <div>
                    <h2>ID de cargo</h2>
                    <input type="number" name="employee-cargo-update" id="employee-cargo-update" min="1" placeholder="Cargo" required autocomplete="off">
                </div>
                <div>
                    <h2>ID de usuario</h2>
                    <input type="number" name="employee-code-update" id="employee-code-update" min="1" placeholder="ID de usuario" required autocomplete="off">
                </div>
                <div>
                    <button class="btn btn-warning" onclick="closeModal()">Cerrar</button>
                    <button id="update-employee" type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
        
</body>
</html>

<?php 
    $typeuser = $_SESSION['usuario']['tipo'];
    if ($typeuser == "basic") 
        echo "<script>setDisable(3, 'Empleados');</script>";
    else if ($typeuser == "user") 
    echo "<script>setDisable(2, 'Empleados');</script>";
?>