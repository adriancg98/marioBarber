<?php include 'conexion_be.php';
session_start();
?>
<?php
$tituloPagina = "Gestionar";
$pagina = "gestion";
include('inc/header.php'); ?>
<?php
if (empty($_SESSION['usuario'])) {
  echo '<script>
      alert("¡Debes ser administrador para entrar aquí!");
      window(location= "index.php");
    </script>';
}
?>
<div class="container">
  <div class="row">
    <button class="btn btn-success">Añadir nuevo peinado</button>
  </div>
  <div class="row">
    <button class="btn btn-primary">Ver un peinado</button>
  </div>
  <div class="row">
    <button class="btn btn-warning">Editar un peinado</button>
  </div>
  <div class="row">
    <button onclick="editar()" class="btn btn-danger">Borrar un peinado</button>
  </div>
</div>

<hr>
</div>
<?php include('inc/footer.php'); ?>