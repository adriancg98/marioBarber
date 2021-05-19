<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header("location: ../../index.php");
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login & Registro</title>
        <link rel="stylesheet" href="assets/css/estilo.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <main>
            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar sesión</button>
                    </div>
                    <div class="caja__trasera-registro">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para poder iniciar sesión</p>
                        <button id="btn__registrarse">Registrarse</button>
                    </div>
                </div>
                <div class="contenedor__login-registro">
                    <!--Login-->
                    <form action="php/login.php" method="POST" class="formulario__login">
                        <h2>Iniciar sesión</h2>
                        <input type="text" placeholder="Correo electrónico" name="correo">
                        <input type="password" placeholder="Contraseña" name="contrasena">
                        <button>Entrar</button>
                    </form>
                    <!--Registro-->
                    <form action="php/registro.php" method="POST" class="formulario__registro">
                        <h2>Registrarse</h2>
                        <input type="text" placeholder="Nombre completo" name="nombre">
                        <input type="text" placeholder="Correo electrónico" name="correo">
                        <input type="text" placeholder="Usuario" name="usuario">
                        <input type="password" placeholder="Contraseña" name="contrasena">
                        <button>Registrarse</button>
                    </form>
                </div>
            </div>
            <div class="row" style="text-align: center;margin-top:80px">
                    <a href="../index.php"><button>Volver</button></a>
                </div>
        </main>
        <script src="assets/js/script.js"></script>
    </body>
</html>