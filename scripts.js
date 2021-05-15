var userName, pass;
function button() {
    userName = document.getElementById("user").value;
    pass = document.getElementById("pass").value;
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

window.onload = function hola() {
    document.getElementById("background").style.height = innerHeight + "px";
    document.getElementById("background").style.width = innerWidth + "px";
}