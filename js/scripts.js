var userName, pass;

window.onload = function hola() { //cambiar nombre
    document.getElementById("background").style.height = innerHeight + "px";
    document.getElementById("background").style.width = innerWidth + "px";
}

function button() {
    //userName = document.getElementById("user").value;
    //pass = document.getElementById("pass").value;
    alert("Usuario: " + userName + "\n" + "Contraseña: " + pass);
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

$(document).ready(function() {
    $("#loginForm").submit(function(error) {
        error.preventDefault();
        userName = $.trim($("#user").val());
        pass = $.trim($("#pass").val());
        alert("Usuario: " + userName + "\n" + "Contraseña: " + pass);

        if (userName.length == "" || pass.length == "") {
            alert("Datos vacios");
        }
    })
})

