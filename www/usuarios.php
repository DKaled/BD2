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
    <title>Usuarios</title>
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
                <h5 id="actual" class="sidebar-item selection usuarios" onclick="changePageAdmin('Usuarios')"><span class="material-icons">people</span>Usuarios</h5>
                <h5 class="sidebar-item selection empleados" onclick="changePageAdmin('Empleados')"><span class="material-icons">badge</span>Empleados</h5>
                <h5 class="sidebar-item selection cargos" onclick="changePageAdmin('Cargos')"><span class="material-icons">inventory</span>Cargos</h5>
                <h5 class="sidebar-item selection" onclick="logout()"><span class="material-icons">logout</span>Cerrar sesión</h5>
            </div>    
        </div>

        <div id="table-container">
            <div class="table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre de usuario</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Tipo de usuario</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php  
                        $query = new MySQL();
                        $data = $query->selectAllUser();
                        foreach ($data as $row) { ?>
                            <tr>
                                <th scope="row"><?php echo $row->idUsuario ?></th>
                                <td><?php echo $row->username ?></td>
                                <td><?php echo $row->contrasenna ?></td>
                                <td><?php echo $row->idTipoUsuario ?></td>
                                <td class="row-btn"><button class="btn btn-primary update-user" code="<?php echo $row->idUsuario ?>">Actualizar</button></td>
                                <td class="row-btn"><button class="btn btn-danger delete-user" code="<?php echo $row->idUsuario ?>">Borrar</button></td>
                                <!--Comprobacion de contraseña para saber si se borra o no-->
                            </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
            <button class="btn btn-success insert add-user">Agregar</button>               
        </div>
    </div>

    <div id="insert-modal" class="modal">
        <div class="body-modal">
            <form action="" method="post" name="form-add-user" id="form-add-user">
                <div>
                    <h2>Nombre de usuario</h2>
                    <input type="text" name="user-name" id="user-name" placeholder="Nombre de usuario" required autocomplete="off">
                </div>
                <div>
                    <h2>Contraseña</h2>
                    <input type="password" name="user-contrasenna" id="user-contrasenna" placeholder="Contraseña" required autocomplete="off">
                </div>
                <div>
                    <h2>Tipo de usuario</h2>
                    <input type="number" name="user-type" id="user-type" min="1" placeholder="Tipo de usuario" required autocomplete="off">
                </div>
                <div>
                    <h2>ID de usuario</h2>
                    <input type="number" name="user-code" id="user-code" min="1" placeholder="ID de usuario" required autocomplete="off">
                </div>
                <div>
                    <button class="btn btn-warning" onclick="closeModal()">Cerrar</button>
                    <button id="insert-user" type="submit" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="update-modal" class="modal">
        <div class="body-modal">
            <form action="" method="post" name="form-update-user" id="form-update-user">
                <div>
                    <h2>Nombre de usuario</h2>
                    <input type="text" name="user-name-update" id="user-name-update" placeholder="Nombre de usuario" require autocomplete="off">
                </div>
                <div>
                    <h2>Tipo de usuario</h2>
                    <input type="number" name="user-type-update" id="user-type-update" min="1" placeholder="Tipo de usuario" required autocomplete="off">
                </div>
                <div>
                    <h2>ID de usuario</h2>
                    <input type="number" name="user-code-update" id="user-code-update" min="1" placeholder="ID de usuario" require autocomplete="off">
                </div>
                <div>
                    <button class="btn btn-warning" onclick="closeModal()">Cerrar</button>
                    <button id="update-user" type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
        
</body>
</html>

<?php 
    $typeuser = $_SESSION['usuario']['tipo'];
    if ($typeuser == "basic") 
        echo "<script>setDisable(3, 'Usuarios');</script>";
    else if ($typeuser == "user") {
        echo "<script>setDisable(2, 'Usuarios');</script>";
    }
?>