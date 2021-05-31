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
        document.getElementById("eyePassIcon").setAttribute("class", "fas fa-eye-slash");
    } else {
        document.getElementById("pass").setAttribute("type", "password");
        document.getElementById("eyePassIcon").setAttribute("class", "fas fa-eye");
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
                url: "php/login.php",
                data: {
                    'user': user,
                    'pass': pass
                },
                dataType: "json",
            })
            .done(function(response) {
                console.log(response);
                if (!response.error) {
                    if (response.tipo == 'admin') {
                        location.href = 'http://localhost/bd2/www/admin.php';
                    } else if (response.tipo == 'usuario') {
                        location.href = 'http://localhost/bd2/www/usuario.php';
                    }
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
});
