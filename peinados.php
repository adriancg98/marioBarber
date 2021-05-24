<?php
$tituloPagina = "Peinados";
$pagina = "peinados";
include('inc/header.php'); 
?>

<!--Peinados-->
<div class="container">
  <div class="row">
    <?php
    $conexion = include('login/php/conexion_be.php');
      $consulta = $conexion->query("SELECT id, nombre, descripcion, foto, precio FROM peinados");
      $resultados = $consulta->fetch_all(MYSQLI_ASSOC);
    ?>

    <table class="table">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Foto</th>
          <th>Precio</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($resultados as $resultado){ ?>
          <tr>
            <td><?php echo $resultado['nombre'] ?></td>
            <td><?php echo $resultado['descripcion'] ?></td>
            <td><?php echo $resultado['foto'] ?></td>
            <td><?php echo $resultado['precio'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>

  <hr>
</div>
<?php include('inc/footer.php'); ?>