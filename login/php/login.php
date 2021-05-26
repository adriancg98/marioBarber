<?php
session_start();
include 'conexion_be.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$resultado = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
$usuariosbd = $resultado->fetch_array();
$rol = $usuariosbd['rol'];
if (mysqli_num_rows($resultado) > 0 /*&& password_verify($_POST['contrasena'], $usuariosbd['contrasena'])*/) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['rol'] = $rol;
    header("location: ../../index.php");
    exit();
} else {
    /*echo '
            <script>
                alert("Usuario o contraseña incorrecta. Verifique los datos");
                window.location = "../index.php";
            </script>
        ';
    //exit();*/
}
