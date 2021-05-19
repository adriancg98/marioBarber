<?php include('inc/funciones.php');
  include 'conexion_be.php';
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
      
      <hr>
    </div>
<?php include('inc/footer.php'); ?>