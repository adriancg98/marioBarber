<?php
$tituloPagina = "Peinados";
$pagina = "peinados";
include('inc/header.php'); 
include('login/php/conexion_be.php');
?>

<!--Peinados-->
<div class="container">
  <div class="row">
    <?php 
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
            <td align="center"><?php echo "<h1>".$resultado['nombre']."</h1>" ?></td>
            <td><?php echo $resultado['descripcion'] ?></td>
            <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($resultado['foto']) .' " style="width: 300px; height: 300px"/>';?></td>
            <td align="center"><?php echo "<h1>".$resultado['precio']."</h1>" ?></td>
            <!--<td><a href=""><button class="btn btn-danger">Ver más</button></a></td>--> 
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>

  <hr>
</div>
<?php include('inc/footer.php'); ?>