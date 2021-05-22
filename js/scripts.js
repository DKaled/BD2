var userName, pass;

window.onload = function hola() { //cambiar nombre
    document.getElementById("background").style.height = innerHeight + "px";
    document.getElementById("background").style.width = innerWidth + "px";
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

        if (userName.length == "" || pass.length == "") {
            alert("Datos vacios");
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: "/php/login.php",
                data: {
                    userName: userName, 
                    pass: pass},
                dataType: "json",
                success: function (data) {
                    if (data == 'null') {
                        console.log("mal");
                    } else {
                        console.log("bien");
                        window.location.href = "directivo.html";
                    }
                }
            });
        }

    })
})

