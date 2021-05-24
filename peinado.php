<?php
if (isset($_GET["id"])) {
    $peinado_id = $_GET["id"];
    if (isset($peinados[$peinado_id])) {
        $peinado = $peinados[$peinado_id];
    }
} else {
    header("Location: peinados.php");
    exit;
}
$tituloPagina = "Peinado";
$pagina = "peinado";
include('inc/header.php'); ?>


<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p><img src="<?php echo $peinado["foto"]; ?>" alt="<?php echo $peinado["nombre"]; ?>" height="350px" width="350px"></p>
            </div>
            <div class="col-md-8">
                <h1><?php echo $peinado["nombre"]; ?></h1>
                <p><?php echo $peinado["descripcion"]; ?></p>
                <h1><?php echo $peinado["precio"]; ?></h1>
            </div>
        </div>
        <div class="row">
            <a href="peinados.php"><button class="btn btn-danger">Volver</button></a>
        </div>
    </div>
</div>

<?php include('inc/footer.php'); ?>