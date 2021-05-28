<html>
  <head>
  <script language="javascript" type="text/javascript">
    function volver(){
      document.retorno.submit();
    }
  </script>
  </head>
  <body onLoad="javascript:volver();">
  <?php
  session_start();
// Se incluye el miniscript de tratamiento de fechas
  include ("inc/fechas.php");
// Se incluye el miniscript que abre la base de datos.
  include ("inc/usarBD.php");
// Se crea la hora, a partir de las horas y minutos establecidos en el formulario de nueva cita.
  $horaDeCita=$_POST["hora"].":".$_POST["minutos"];
  print_r($_POST['dia']);
// Se monta la consulta para grabar una nueva cita.
  $consulta="INSERT INTO citas (diaCita, horaCita, usuario, aceptada) VALUES ('" . $_POST["dia"] . "','$horaDeCita','" . $_SESSION['usuario'] . "'false');";
// Se ejecuta la consulta.
  $hacerConsulta=$conexion->query ($consulta);
// Se liberan recursos y se cierra la base de datos.
  mysqli_close($conexion);
  ?>
  <form action="../citas.php" name="retorno" id="retorno" method="post">
    <input type="hidden" name="fechaEnCurso" id="fechaEnCurso" value="<?php echo ($fechaEnCurso); ?>">
  </form>
  </body>
</html>
