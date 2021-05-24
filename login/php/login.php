<?php
include 'conexion_be.php';


$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
print_r($contrasena);
$resultado = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
$usuariosbd = $resultado->fetch_array();
print_r($usuariosbd);
if (mysqli_num_rows($resultado) > 0 /*&& password_verify($_POST['contrasena'], $usuariosbd['contrasena'])*/) {
    $_SESSION['usuario'] = $usuario;
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
