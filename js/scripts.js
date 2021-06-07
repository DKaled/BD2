window.onload = function inicio() {
    if (document.getElementById("background")) {
        document.getElementById("background").style.height = innerHeight + "px";
        document.getElementById("background").style.width = innerWidth + "px";
    }
}

function togglePass() {
    var typePass = document.getElementById("pass").getAttribute("type");
    if (typePass == "password") {
        document.getElementById("pass").setAttribute("type", "text");
        document.getElementById("eyePassIcon").innerHTML = "visibility_off";
    } else {
        document.getElementById("pass").setAttribute("type", "password");
        document.getElementById("eyePassIcon").innerHTML = "visibility";
    }
}

$( document ).ready(function() {
    $('#loginForm').on('submit', function(event) {
        event.preventDefault();
        var user = $.trim($("#user").val());
        var prePass = $.trim($("#pass").val());
        pass = CryptoJS.MD5(prePass).toString();
    
        if (user == "" || pass == "") {
            alert("Datos vacíos");
        } else {
            $.ajax({
                type: "POST",
                url: "http://localhost/bd2/php/login.php",
                data: {
                    'user': user,
                    'pass': pass
                },
                dataType: "json",
            })
            .done(function(response) {
                console.log(response);
                if (!response.error) {
                    location.href = 'http://localhost/bd2/www/productos.php';
                } else {
                    alert("Datos invalidos");
                    console.log("Error de validación");
                }
            })
            .fail(function(response) {
                console.log(response.responseText);
            })
            .always(function() {
                console.log("complete");
            });
        }
    });

    //#region Product

    $('.add-product').click(function (event) { 
        event.preventDefault();
        $('#insert-modal').fadeIn();
    });

    $('#form-add-product').on('submit', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var idUser = $.trim($(".side-bar-user").val());
        var name = $.trim($("#product-name").val());
        var price = $.trim($("#product-price").val());
        var amount = $.trim($("#product-amount").val());
        var departament = $.trim($("#product-department").val());
        var code = $.trim($("#product-code").val());
        var selection = "insert";

        $.ajax({
            type: "POST",
            url: "../php/products.php",
            data: {
                'idUser' : idUser,
                'name': name,
                'price': price,
                'amount' : amount,
                'department' : departament,
                'code' : code,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
        })
        .fail(function(response) {
            console.log(response.responseText);
            alert("Los datos ya existen en la tabla");
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    $('.delete-product').on('click', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var idUser = $.trim($(".side-bar-user").val());
        var code = $(this).attr("code");
        var selection = "delete";
        
        var request = $.ajax({
            type: "POST",
            url: "../php/products.php",
            data: {
                'idUser' : idUser,
                'code' : code,
                'selection' : selection
            },
            dataType: "json",
            beforeSend: function (data) { 
                var confirmacion = confirm("¿Seguro que quieres borrar los datos de " + code + "?");
                if (confirmacion) 
                    alert("El elemento " + code + " ha sido eliminado.");
                else
                    request.abort();
            }
        })
        .done(function(response) {
            console.log(response);
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    $('.update-product').click(function (event) { 
        event.preventDefault();
        
        var code = $(this).attr("code");
        var selection = "preUpdate";

        $.ajax({
            type: "POST",
            url: "../php/products.php",
            data: {
                'code' : code,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
            document.getElementById("product-name-update").setAttribute("value", response["nombre"]);
            document.getElementById("product-price-update").setAttribute("value", response["precio"]);
            document.getElementById("product-amount-update").setAttribute("value", response["cantidad"]);
            document.getElementById("product-department-update").setAttribute("value", response["idDepartamento"]);
            document.getElementById("product-code-update").setAttribute("value", response["codBarras"]);
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
           
        });
        
        $('#update-modal').fadeIn();
    });


    $('#form-update-product').on('submit', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var name = $.trim($("#product-name-update").val());
        var price = $.trim($("#product-price-update").val());
        var amount = $.trim($("#product-amount-update").val());
        var departament = $.trim($("#product-department-update").val());
        var code = $.trim($("#product-code-update").val());
        var selection = "update";

        $.ajax({
            type: "POST",
            url: "../php/products.php",
            data: {
                'name': name,
                'price': price,
                'amount' : amount,
                'department' : departament,
                'code' : code,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
            
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    //#endregion Product

    //#region Department

    $('.add-department').click(function (event) { 
        event.preventDefault();
        $('#insert-modal').fadeIn();
    });

    $('#form-add-department').on('submit', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var name = $.trim($("#department-name").val());
        var code = $.trim($("#department-code").val());
        var selection = "insert";

        $.ajax({
            type: "POST",
            url: "../php/departments.php",
            data: {
                'name' : name,
                'code' : code,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    $('.delete-department').on('click', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var code = $(this).attr("code");
        var selection = "delete";
        
        var request = $.ajax({
            type: "POST",
            url: "../php/departments.php",
            data: {
                'code' : code,
                'selection' : selection
            },
            dataType: "json",
            beforeSend: function (data) { 
                var confirmacion = confirm("¿Seguro que quieres borrar los datos de " + code + "?");
                if (confirmacion) 
                    alert("El elemento " + code + " ha sido eliminado.");
                else
                    request.abort();
            }
        })
        .done(function(response) {
            console.log(response);
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    $('.update-department').click(function (event) { 
        event.preventDefault();
        var code = $(this).attr("code");
        var selection = "preUpdate";

        $.ajax({
            type: "POST",
            url: "../php/departments.php",
            data: {
                'code' : code,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
            document.getElementById("department-name-update").setAttribute("value", response["nombre"]);
            document.getElementById("department-code-update").setAttribute("value", response["idDepartamento"]);
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
           
        });
        
        $('#update-modal').fadeIn();
    });


    $('#form-update-department').on('submit', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var name = $.trim($("#department-name-update").val());
        var code = $.trim($("#department-code-update").val());
        var originalCode = $("#department-code-update").attr("value");
        var selection = "update";

        $.ajax({
            type: "POST",
            url: "../php/departments.php",
            data: {
                'name': name,
                'code' : code,
                'originalCode' : originalCode,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
            
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    //#endregion Department

    //#region User

    $('.add-user').click(function (event) { 
        event.preventDefault();
        $('#insert-modal').fadeIn();
    });

    $('#form-add-user').on('submit', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var name = $.trim($("#user-name").val());
        var contrasenna = $.trim($("#user-contrasenna").val());
        var cryptContrasenna = CryptoJS.MD5(contrasenna).toString();
        var type = $.trim($("#user-type").val());
        var code = $.trim($("#user-code").val());
        var selection = "insert";

        $.ajax({
            type: "POST",
            url: "../php/users.php",
            data: {
                'name' : name,
                'cryptContrasenna' : cryptContrasenna,
                'type' : type,
                'code' : code,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    $('.delete-user').on('click', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var code = $(this).attr("code");
        var selection = "delete";
        
        var request = $.ajax({
            type: "POST",
            url: "../php/users.php",
            data: {
                'code' : code,
                'selection' : selection
            },
            dataType: "json",
            beforeSend: function (data) { 
                var confirmacion = confirm("¿Seguro que quieres borrar los datos de " + code + "?");
                if (confirmacion) 
                    alert("El elemento " + code + " ha sido eliminado.");
                else
                    request.abort();
            }
        })
        .done(function(response) {
            console.log(response);
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    $('.update-user').click(function (event) { 
        event.preventDefault();
        var code = $(this).attr("code");
        var selection = "preUpdate";

        $.ajax({
            type: "POST",
            url: "../php/users.php",
            data: {
                'code' : code,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
            document.getElementById("user-name-update").setAttribute("value", response["username"]);
            document.getElementById("user-type-update").setAttribute("value", response["idTipoUsuario"]);
            document.getElementById("user-code-update").setAttribute("value", response["idUsuario"]);
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
           
        });
        
        $('#update-modal').fadeIn();
    });


    $('#form-update-user').on('submit', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var name = $.trim($("#user-name-update").val());
        var type = $.trim($("#user-type-update").val());
        var code = $.trim($("#user-code-update").val());
        var originalCode = $("#user-code-update").attr("value");
        var selection = "update";        

        $.ajax({
            type: "POST",
            url: "../php/users.php",
            data: {
                'name' : name,
                'type' : type,
                'code' : code,
                'originalCode' : originalCode,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
            
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    //#endregion User

    //#region Employee

    $('.add-employee').click(function (event) { 
        event.preventDefault();
        $('#insert-modal').fadeIn();
    });

    $('#form-add-employee').on('submit', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var num = $.trim($("#employee-num").val());
        var name = $.trim($("#employee-name").val());
        var apep = $.trim($("#employee-apep").val());
        var apem = $.trim($("#employee-apem").val());
        var sexo = $.trim($("#employee-sexo").val());
        var date = $.trim($("#employee-date").val());
        var cargo = $.trim($("#employee-cargo").val());
        var code = $.trim($("#employee-code").val());
        var selection = "insert";

        $.ajax({
            type: "POST",
            url: "../php/employees.php",
            data: {
                'num' : num,
                'name' : name,
                'apep' : apep,
                'apem' : apem,
                'sexo' : sexo,
                'date' : date,
                'cargo' : cargo,
                'code' : code,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    $('.delete-employee').on('click', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var num = $(this).attr("code");
        var selection = "delete";
        
        var request = $.ajax({
            type: "POST",
            url: "../php/employees.php",
            data: {
                'num' : num,
                'selection' : selection
            },
            dataType: "json",
            beforeSend: function (data) { 
                var confirmacion = confirm("¿Seguro que quieres borrar los datos de " + num + "?");
                if (confirmacion) 
                    alert("El elemento " + num + " ha sido eliminado.");
                else
                    request.abort();
            }
        })
        .done(function(response) {
            console.log(response);
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    $('.update-employee').click(function (event) { 
        event.preventDefault();
        var num = $(this).attr("code");
        var selection = "preUpdate";
        
        $.ajax({
            type: "POST",
            url: "../php/employees.php",
            data: {
                'num' : num,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
            document.getElementById("employee-num-update").setAttribute("value", response["numNomina"]);
            document.getElementById("employee-name-update").setAttribute("value", response["nombre"]);
            document.getElementById("employee-apep-update").setAttribute("value", response["apeP"]);
            document.getElementById("employee-apem-update").setAttribute("value", response["apeM"]);
            document.getElementById("employee-sexo-update").setAttribute("value", response["sexo"]);
            document.getElementById("employee-date-update").setAttribute("value", response["fechaContratacion"]);
            document.getElementById("employee-cargo-update").setAttribute("value", response["idCargo"]);
            document.getElementById("employee-code-update").setAttribute("value", response["idUsuario"]);
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
           
        });
        
        $('#update-modal').fadeIn();
    });


    $('#form-update-employee').on('submit', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var num = $.trim($("#employee-num-update").val());
        var name = $.trim($("#employee-name-update").val());
        var apep = $.trim($("#employee-apep-update").val());
        var apem = $.trim($("#employee-apem-update").val());
        var sexo = $.trim($("#employee-sexo-update").val());
        var date = $.trim($("#employee-date-update").val());
        var cargo = $.trim($("#employee-cargo-update").val());
        var code = $.trim($("#employee-code-update").val());
        var originalCode = $("#employee-num-update").attr("value");
        var selection = "update";

        $.ajax({
            type: "POST",
            url: "../php/employees.php",
            data: {
                'num' : num,
                'name' : name,
                'apep' : apep,
                'apem' : apem,
                'sexo' : sexo,
                'date' : date,
                'cargo' : cargo,
                'code' : code,
                'originalCode' : originalCode,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
            
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    //#endregion Employee

    //#region Cargo

    $('.add-cargos').click(function (event) { 
        event.preventDefault();
        $('#insert-modal').fadeIn();
    });

    $('#form-add-cargos').on('submit', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var name = $.trim($("#cargos-name").val());
        var code = $.trim($("#cargos-code").val());
        var selection = "insert";

        $.ajax({
            type: "POST",
            url: "../php/cargos.php",
            data: {
                'name' : name,
                'code' : code,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    $('.delete-cargos').on('click', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var code = $(this).attr("code");
        var selection = "delete";
        
        var request = $.ajax({
            type: "POST",
            url: "../php/cargos.php",
            data: {
                'code' : code,
                'selection' : selection
            },
            dataType: "json",
            beforeSend: function (data) { 
                var confirmacion = confirm("¿Seguro que quieres borrar los datos de " + code + "?");
                if (confirmacion) 
                    alert("El elemento " + code + " ha sido eliminado.");
                else
                    request.abort();
            }
        })
        .done(function(response) {
            console.log(response);
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    $('.update-cargos').click(function (event) { 
        event.preventDefault();
        var code = $(this).attr("code");
        var selection = "preUpdate";

        $.ajax({
            type: "POST",
            url: "../php/cargos.php",
            data: {
                'code' : code,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
            document.getElementById("cargos-name-update").setAttribute("value", response["nombre"]);
            document.getElementById("cargos-code-update").setAttribute("value", response["idCargo"]);
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
           
        });
        
        $('#update-modal').fadeIn();
    });


    $('#form-update-cargos').on('submit', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var name = $.trim($("#cargos-name-update").val());
        var code = $.trim($("#cargos-code-update").val());
        var originalCode = $("#cargos-code-update").attr("value");
        var selection = "update";

        $.ajax({
            type: "POST",
            url: "../php/cargos.php",
            data: {
                'name': name,
                'code' : code,
                'originalCode' : originalCode,
                'selection' : selection
            },
            dataType: "json"
        })
        .done(function(response) {
            console.log(response);
            
        })
        .fail(function(response) {
            console.log(response.responseText);
        })
        .always(function() {
            console.log("complete");
            location.reload();
        });
    });

    //#endregion Cargo

    $('#form-backup').submit(function (event) { 
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "../php/backup.php"
        })
        .done(function(response) {
            console.log(response);
        })
        .fail(function(response) {
            console.log(response.responseText);
            alert("Backup no realizado.")
        })
        .always(function() {
            console.log("complete");
            alert("Backup completado.");
            location.reload();
        });
    });

    $('.report-product').click(function (e) { 
        e.preventDefault();
        console.log("show Preport");
        window.open("../php/productsReport.php", "_blank");
    });

    $('.report-employee').click(function (e) { 
        e.preventDefault();
        console.log("show Ereport");
        window.open("../php/employeesReport.php", "_blank");
    });

    $('#form-script').submit(function (event) { 
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "../php/restore.php"
        })
        .done(function(response) {
            console.log(response);
        })
        .fail(function(response) {
            console.log(response.responseText);
            alert("Restauración no realizado.")
        })
        .always(function() {
            console.log("complete");
            alert("Restauración completada.");
            location.reload();
        });
    });
});

function logout() {
    location.href = 'http://localhost/bd2/php/logout.php';
}

function changePageAdmin($page) {
    switch ($page) {
        case 'Departamentos':
            location.href = 'http://localhost/bd2/www/departamentos.php';
            break;
        case 'Productos':
            location.href = 'http://localhost/bd2/www/productos.php';
            break;
        case 'Usuarios':
            location.href = 'http://localhost/bd2/www/usuarios.php';
            break;
        case 'Empleados':
            location.href = 'http://localhost/bd2/www/empleados.php';
            break;
        case 'Cargos':
            location.href = 'http://localhost/bd2/www/cargos.php';
            break;
    }
}

function setDisable($typeuser, $section) {
    //1 admin
    //2 user
    //3 basic
    switch ($section) {
        case 'Departamentos':
            if ($typeuser == 3) {
                $('.delete-department').prop('disabled', true);
                $('.update-department').prop('disabled', true);
                $('.insert').prop('disabled', true);
                $('.usuarios').addClass("setdisable");
                $('.empleados').addClass("setdisable");
                $('.cargos').addClass("setdisable");
                $('#form-backup').addClass("setdisable");
                $('#form-script').addClass("setdisable");
            } else if ($typeuser == 2) {
                $('.delete-department').prop('disabled', true);
                $('.usuarios').addClass("setdisable");
                $('.cargos').addClass("setdisable");
                $('#form-backup').addClass("setdisable");
                $('#form-script').addClass("setdisable");
            }
            break;
        case 'Productos':
            if ($typeuser == 3) {
                $('.delete-product').prop('disabled', true);
                $('.update-product').prop('disabled', true);
                $('.insert').prop('disabled', true);
                $('.usuarios').addClass("setdisable");
                $('.empleados').addClass("setdisable");
                $('.cargos').addClass("setdisable");
                $('#form-backup').addClass("setdisable");
                $('#form-script').addClass("setdisable");
            } else if ($typeuser == 2) {
                $('.delete-product').prop('disabled', true);
                $('.usuarios').addClass("setdisable");
                $('.cargos').addClass("setdisable");
                $('#form-backup').addClass("setdisable");
                $('#form-script').addClass("setdisable");
            }
            break;
        case 'Usuarios':
            if ($typeuser == 3) {
                $('.delete-user').prop('disabled', true);
                $('.update-user').prop('disabled', true);
                $('.insert').prop('disabled', true);
                $('.usuarios').addClass("setdisable");
                $('.empleados').addClass("setdisable");
                $('.cargos').addClass("setdisable");
                $('#form-backup').addClass("setdisable");
                $('#form-script').addClass("setdisable");
            } else if ($typeuser == 2) {
                $('.delete-user').prop('disabled', true);
                $('.usuarios').addClass("setdisable");
                $('.cargos').addClass("setdisable");
                $('#form-backup').addClass("setdisable");
                $('#form-script').addClass("setdisable");
            }
            break;
        case 'Empleados':
            if ($typeuser == 3) {
                $('.delete-employee').prop('disabled', true);
                $('.update-employee').prop('disabled', true);
                $('.insert').prop('disabled', true);
                $('.usuarios').addClass("setdisable");
                $('.empleados').addClass("setdisable");
                $('.cargos').addClass("setdisable");
                $('#form-backup').addClass("setdisable");
                $('#form-script').addClass("setdisable");
            } else if ($typeuser == 2) {
                $('.delete-employee').prop('disabled', true);
                $('.usuarios').addClass("setdisable");
                $('.cargos').addClass("setdisable");
                $('#form-backup').addClass("setdisable");
                $('#form-script').addClass("setdisable");
            }
            break;
        case 'Cargos':
            if ($typeuser == 3) {
                $('.delete-cargos').prop('disabled', true);
                $('.update-cargos').prop('disabled', true);
                $('.insert').prop('disabled', true);
                $('.usuarios').addClass("setdisable");
                $('.empleados').addClass("setdisable");
                $('.cargos').addClass("setdisable");
                $('#form-backup').addClass("setdisable");
                $('#form-script').addClass("setdisable");
            } else if ($typeuser == 2) {
                $('.delete-cargos').prop('disabled', true);
                $('.usuarios').addClass("setdisable");
                $('.cargos').addClass("setdisable");
                $('#form-backup').addClass("setdisable");
                $('#form-script').addClass("setdisable");
            }
            break;
    }
}

function closeModal() {
    $('.modal').fadeOut();
}