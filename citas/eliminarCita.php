<?php
/* Si se intenta acceder sin haber seleccionado una cita, se regresa al index. */
  if (!isset($_POST["citaSeleccionada"])) header("Location: ../index.php");
?>
<html>
  </head>
  <?php
// Se incluye el miniscript de tratamiento de fechas
    include ("inc/fechas.php");
// Se incluye el miniscript que abre la base de datos.
    include ("inc/usarBD.php");
  ?>
  <script language="javascript" type="text/javascript">
    function volver(){
      document.retorno.submit();
    }
  </script>
  </head>

  <body onLoad="javascript:volver();">
  <?php

    $consulta="DELETE FROM citas WHERE id='".$_POST["citaSeleccionada"]."';";

    $hacerConsulta=$conexion->query($consulta);
// Se liberan recursos y se cierra la base de datos.
    mysqli_close ($conexion);
  ?>
  <form action="../citas.php" method="post" name="retorno" id="retorno">
    <input type="hidden" name="fechaEnCurso" id="fechaEnCurso" value="<?php echo ($fechaEnCurso); ?>">
  </form>
  </body>
</html>

