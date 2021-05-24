<?php include_once "../inc/header.php"; ?>
<div class="row">
    <div class="col-12">
        <h1>Registrar peinado</h1>
        <form action="registrar.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input placeholder="Nombre" class="form-control" type="text" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea placeholder="Descripción" class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" required></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input placeholder="Foto" class="form-control" type="file" name="foto" id="foto" required></input>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input placeholder="Precio" class="form-control" type="text" name="precio" id="precio" required></input>
            </div>
            <div class="form-group"><button class="btn btn-success">Guardar</button></div>
        </form>
    </div>
</div>
<?php include_once "../inc/footer.php"; ?>