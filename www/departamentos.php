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
    <title>Departamentos</title>
    <script src="../js/jquery-3.6.0.min.js"></script>
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
                <h5 id="actual" class="sidebar-item selection departamentos" onclick="changePageAdmin('Departamentos')"><span class="material-icons">store</span>Departamentos</h5>
                <h5 class="sidebar-item selection productos" onclick="changePageAdmin('Productos')"><span class="material-icons">shopping_cart</span>Productos</h5>
                <h5 class="sidebar-item selection usuarios" onclick="changePageAdmin('Usuarios')"><span class="material-icons">people</span>Usuarios</h5>
                <h5 class="sidebar-item selection empleados" onclick="changePageAdmin('Empleados')"><span class="material-icons">badge</span>Empleados</h5>
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
                            <th scope="col">ID</th>
                            <th scope="col">Departamento</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php  
                        $query = new MySQL();
                        $data = $query->selectAllDepartment();
                        foreach ($data as $row) { ?>
                            <tr>
                                <th scope="row"><?php echo $row->idDepartamento ?></th>
                                <td><?php echo $row->nombre ?></td>
                                <td class="row-btn"><button class="btn btn-primary update-department" code="<?php echo $row->idDepartamento ?>">Actualizar</button></td>
                                <td class="row-btn"><button class="btn btn-danger delete-department" code="<?php echo $row->idDepartamento ?>">Borrar</button></td>
                                <!--Comprobacion de contraseña para saber si se borra o no-->
                            </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
            <button class="btn btn-success insert add-department">Agregar</button>               
        </div>
    </div>

    <div id="insert-modal" class="modal">
        <div class="body-modal">
            <form action="" method="post" name="form-add-department" id="form-add-department">
                <div>
                    <h2>Nombre del departamento</h2>
                    <input type="text" name="department-name" id="department-name" placeholder="Nombre del departamento" required autocomplete="off">
                </div>
                <div>
                    <h2>ID del departamento</h2>
                    <input type="number" name="department-code" id="department-code" min="1" placeholder="ID del departamento" required autocomplete="off">
                </div>
                <div>
                    <button class="btn btn-warning" onclick="closeModal()">Cerrar</button>
                    <button id="insert-department" type="submit" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="update-modal" class="modal">
        <div class="body-modal">
            <form action="" method="post" name="form-update-department" id="form-update-department">
                <div>
                    <h2>Nombre del departamento</h2>
                    <input type="text" name="department-name-update" id="department-name-update" placeholder="Nombre del departamento" require autocomplete="off">
                </div>
                <div>
                    <h2>ID del departamento</h2>
                    <input type="number" name="department-code-update" id="department-code-update" min="1" placeholder="ID del departamento" require autocomplete="off">
                </div>
                <div>
                    <button class="btn btn-warning" onclick="closeModal()">Cerrar</button>
                    <button id="update-department" type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
        
</body>
</html>

<?php 
    $typeuser = $_SESSION['usuario']['tipo'];
    if ($typeuser == "basic") 
        echo "<script>setDisable(3, 'Departamentos');</script>";
    else if ($typeuser == "user") {
        echo "<script>setDisable(2, 'Departamentos');</script>";
    }
?>