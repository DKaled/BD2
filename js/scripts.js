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
        var pass = $.trim($("#pass").val());
    
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

    $('.add-product').click(function (event) { 
        event.preventDefault();
        $('#insert-modal').fadeIn();
    });

    $('#form-add-product').on('submit', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

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

    $('.delete').on('click', function(event) {
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }

        var code = $(this).attr("code");
        var selection = "delete";
        
        var request = $.ajax({
            type: "POST",
            url: "../php/products.php",
            data: {
                'name': "",
                'price': 0, //probar quitandolos
                'amount' : 0,
                'department' : 0,
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
        case 'Productos':
            if ($typeuser == 3) {
                $('.delete').prop('disabled', true);
                $('.update').prop('disabled', true);
                $('.insert').prop('disabled', true);
                $('.usuarios').addClass("setdisable");
                $('.empleados').addClass("setdisable");
                $('.cargos').addClass("setdisable");
            }
            break;
    }
}

function closeModal() {
    $('.modal').fadeOut();
}