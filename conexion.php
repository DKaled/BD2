<?php
$server = "localhost";
$db = "_pruebabd2";
$username = "root";
$pass = "";

$conexion = mysqli_connect($server, $username, $pass, $db);

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
//mysqli_close($conn);
?>