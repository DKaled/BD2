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
    <title>Productos</title>
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
                <h5 class="sidebar-item selection departamentos" onclick="changePageAdmin('Departamentos')"><span class="material-icons">store</span>Departamentos</h5>
                <h5 id="actual" class="sidebar-item selection productos" onclick="changePageAdmin('Productos')"><span class="material-icons">shopping_cart</span>Productos</h5>
                <h5 class="sidebar-item selection usuarios" onclick="changePageAdmin('Usuarios')"><span class="material-icons">people</span>Usuarios</h5>
                <h5 class="sidebar-item selection empleados" onclick="changePageAdmin('Empleados')"><span class="material-icons">badge</span>Empleados</h5>
                <h5 class="sidebar-item selection cargos" onclick="changePageAdmin('Cargos')"><span class="material-icons">inventory</span>Cargos</h5>
                <h5 class="sidebar-item selection" onclick="logout()"><span class="material-icons">logout</span>Cerrar sesión</h5>
                <form id="form-backup" action="" method="POST">
                    <input class="backup"  type="submit" value="Backup">
                </form>
            </div>    
        </div>

        <div id="table-container">
            <div class="table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Código de Barras</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Departamento</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php  
                        $query = new MySQL();
                        $data = $query->selectAllProduct();
                        //y si la tabla esta vacía
                        foreach ($data as $row) { ?>
                            <tr>
                                <th class="codbarras" scope="row"><?php echo $row->codBarras ?></th>
                                <td><?php echo $row->nombre ?></td>
                                <td><?php echo $row->precio ?></td>
                                <td><?php echo $row->cantidad ?></td>
                                <td><?php echo $row->idDepartamento ?></td>
                                <td class="row-btn"><button class="btn btn-primary update-product" code="<?php echo $row->codBarras ?>">Actualizar</button></td>
                                <td class="row-btn"><button class="btn btn-danger delete-product" code="<?php echo $row->codBarras ?>">Borrar</button></td>
                                <!--Comprobacion de contraseña para saber si se borra o no-->
                            </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
            <button class="btn btn-success insert add-product">Agregar</button>     
            <button class="btn btn-outline-info report">Generar reporte</button>          
        </div>
    </div>

    <div id="insert-modal" class="modal">
        <div class="body-modal">
            <form action="" method="post" name="form-add-product" id="form-add-product">
                <div>
                    <h2>Nombre del producto</h2>
                    <input type="text" name="product-name" id="product-name" placeholder="Nombre del producto" required autocomplete="off">
                </div>
                <div>
                    <h2>Precio</h2>
                    <input type="number" name="product-price" id="product-price" min="0" placeholder="Precio" required autocomplete="off">
                </div>
                <div>
                    <h2>Cantidad</h2>
                    <input type="number" name="product-amount" id="product-amount" min="1" placeholder="Cantidad" required autocomplete="off">
                </div>
                <div>
                    <h2>Departamento</h2>
                    <input type="number" name="product-department" id="product-department" min="1" max="15" placeholder="Departamento" required autocomplete="off">
                </div>
                <div>
                    <h2>Código de Barras</h2>
                    <input type="number" name="product-code" id="product-code" min="1" placeholder="Código de Barras" required autocomplete="off">
                </div>
                <div>
                    <button class="btn btn-warning" onclick="closeModal()">Cerrar</button>
                    <button id="insert-product" type="submit" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="update-modal" class="modal">
        <div class="body-modal">
            <form action="" method="post" name="form-update-product" id="form-update-product">
                <div>
                    <h2>Nombre del producto</h2>
                    <input type="text" name="product-name-update" id="product-name-update" placeholder="Nombre del producto" require autocomplete="off">
                </div>
                <div>
                    <h2>Precio</h2>
                    <input type="number" name="product-price-update" id="product-price-update" min="1" placeholder="Precio" required autocomplete="off">
                </div>
                <div>
                    <h2>Cantidad</h2>
                    <input type="number" name="product-amount-update" id="product-amount-update" min="1" placeholder="Cantidad" required autocomplete="off">
                </div>
                <div>
                    <h2>Departamento</h2>
                    <input type="number" name="product-department-update" id="product-department-update" min="1" max="15" placeholder="Departamento" required autocomplete="off">
                </div>
                <div>
                    <h2>Código de Barras</h2>
                    <input type="number" name="product-code-update" id="product-code-update" min="1" placeholder="Código de Barras" readonly>
                </div>
                <div>
                    <button class="btn btn-warning" onclick="closeModal()">Cerrar</button>
                    <button id="update-product" type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
        
</body>
</html>

<?php 
    $typeuser = $_SESSION['usuario']['tipo'];
    if ($typeuser == "basic") 
        echo "<script>setDisable(3, 'Productos');</script>";
    else if ($typeuser == "user") {
        echo "<script>setDisable(2, 'Productos');</script>";
    }
?>