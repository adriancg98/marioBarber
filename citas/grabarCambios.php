<?php
// Se incluye el miniscript que abre la base de datos.
  include ("inc/usarBD.php");
// Se toman todos los datos necesarios del formulario de modificaciones.
  $nuevaHora=$_POST["hora"].":".$_POST["minutos"];
  $nuevaFecha=$_POST["annio"]."-".$_POST["mes"]."-".$_POST["dia"];

  $consulta="UPDATE citas SET diaCita='".$nuevaFecha."', horaCita='".$nuevaHora."', usuario='".$_POST["usuario"]."' WHERE idCita=".$_POST["citaSeleccionada"].";";
  $hacerConsulta=$conexion->query($consulta, $conexion);
// Se liberan recursos y se cierra la base de datos.
  @mysqli_free_result($hacerConsulta);
  mysqli_close ($conexion);
?>
<html>
  <head>
    <script language="javascript" type="text/javascript">

      function volver(){
        document.retorno.submit();
      }
    </script>
  </head>
  <body onLoad="javascript:volver();">
<!-- El siguiente formulario es para volver a index con la fecha en curso. -->
    <form action="../citas.php" method="post" name="retorno" id="retorno">
	  <input type="hidden" name="fechaEnCurso" id="fechaEnCurso" value="<?php echo ($_POST['fechaEnCurso']);?>">
	</form>
  </body>
</html>
