<?php
include_once "../inc/header.php";
include_once "../login/php/conexion_be.php";
$id = $_GET["id"];
$sentencia = $conexion->prepare("SELECT id, nombre, descripcion, foto, precio FROM peinados WHERE id = ?");
$sentencia->bind_param("i", $id);
$sentencia->execute();
$resultado = $sentencia->get_result();

# Obtenemos solo una fila, que será el peinado a editar
$peinado = $resultado->fetch_assoc();
if (!$peinado) {
    exit("No hay resultados para ese ID");
}

?>
<div class="row" style="margin-left: 20px;">
    <div class="col-12">
        <h1>Actualizar peinado</h1>
        <form action="actualizar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $peinado["id"] ?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input value="<?php echo $peinado["nombre"] ?>" placeholder="Nombre" class="form-control" type="text" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea placeholder="Descripción" class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" required><?php echo $peinado["descripcion"] ?></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($peinado['foto']);?>" style="width: 300px; height: 300px"/>
                <input class="form-control" type="file" name="foto" id="foto">
                
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input value="<?php echo $peinado["precio"] ?>" placeholder="Precio" class="form-control" type="text" name="precio" id="precio" required>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-warning" href="../listar.php">Volver</a>
            </div>
        </form>
    </div>
</div>
<?php include_once "../inc/footer.php"; ?>