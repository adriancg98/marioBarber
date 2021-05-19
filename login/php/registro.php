<?php

    include 'conexion_be.php';

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];

    //Encriptamiento de la contraseña (Para la BBDD)
    $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

    $query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena, rol) 
              VALUES('$nombre', '$correo', '$usuario', '$contrasena', '$rol')";

    //Verificación para correo no repetido en BBDD
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya está registrado.");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    //Verificación para usuario no repetido en BBDD
    $verificar_usuario = mysqli_query($conexion,  "SELECT * FROM usuarios WHERE usuario = '$usuario'");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este usuario ya está registrado.");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../../index.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Intentelo de nuevo, usuario no guardado");
                window.location = "../index.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>