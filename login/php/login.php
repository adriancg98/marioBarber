<?php
include 'conexion_be.php';


$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena);

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");

if (mysqli_num_rows($validar_login) > 0 && password_verify($_POST['contrasena'], $usuario->password)) {
    $_SESSION['usuario'] = $usuario;
    header("location: ../../index.php");
    exit();
} else {
    echo '
            <script>
                alert("Usuario o contraseña incorrecta. Verifique los datos");
                window.location = "../index.php";
            </script>
        ';
    exit();
}
