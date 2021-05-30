<?php

$tituloPagina = "Gestionar";
$pagina = "gestion";
include('inc/header.php'); 
include_once "login/php/conexion_be.php";

if ($_SESSION['rol'] != 'Administrador') {
    echo '<script>
        alert("¡Debes ser administrador para entrar aquí!");
        window(location= "index.php");
      </script>';
}

$resultado = $conexion->query("SELECT id, nombre, descripcion, foto, precio FROM peinados");
$peinados = $resultado->fetch_all(MYSQLI_ASSOC);
?>
<div class="row">
    <div class="col-12">
        <h1>Listado de peinados</h1>
    </div>
    <div class="col-12">
        <a class="btn btn-success my-2" href="gestion/formulario_registrar.php">Agregar nuevo</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Foto</th>
                    <th>Precio</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($peinados as $peinado) { ?>
                    <tr>
                        <td><?php echo $peinado["id"] ?></td>
                        <td><?php echo $peinado["nombre"] ?></td>
                        <td><?php echo $peinado["descripcion"] ?></td>
                        <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($peinado['foto'])  .' " style="width: 300px; height: 300px"/>';?></td>
                        <td><?php echo $peinado["precio"] ?></td>
                        <td>
                            <a href="gestion/editar.php?id=<?php echo $peinado["id"] ?>"><button class="btn btn-warning">Editar</button></a>
                        </td>
                        <td>
                            <a href="gestion/eliminar.php?id=<?php echo $peinado["id"] ?>"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once "inc/footer.php" ?>