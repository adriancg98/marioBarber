<?php 
$tituloPagina = "Pide tu cita";
$pagina = "citas";
include('inc/header.php'); ?>

<html>
  <head>
    <script language="javascript" type="text/javascript">

      function saltar(pagina){
        document.formularioCitasPrincipal.action=pagina;
		  document.formularioCitasPrincipal.submit();
      }
    </script>
	
  <title>Citas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  </head>

  <body>
    <?php
// Se incluye el miniscript que abre la base de datos.
      include ("citas/inc/fechas.php");
// Se incluye el miniscript de tratamiento de fechas
      include ("citas/inc/usarBD.php");

      $consulta="SELECT * FROM citas WHERE diacita='".$fechaEnCurso."' ORDER BY horacita;";

      $hacerConsulta=$conexion->query($consulta, $conexion);

      $numeroDeCitasDelDia=mysqli_num_rows($hacerConsulta);
      echo ("Citas del día: ".$numeroDeCitasDelDia.salto);
    ?>
    AGENDA DEL D&Iacute;A:
    <?php

    echo ($diaActual." del ".$mesActual." de ".$annioActual);
	?>

    <form action="" method="post" name="formularioCitasPrincipal" id="formularioCitasPrincipal">

      <input type="hidden" name="fechaEnCurso" id="fechaEnCurso" value="<?php echo($fechaEnCurso); ?>">
      <table width="500" border="0" cellspacing="0" cellpadding="0">
        <tr><th>CITAS</th></tr>
      </table>
      <hr>
      <?php
        if ($numeroDeCitasDelDia>0){

          echo ("<table width='500' border='0' cellspacing='0' cellpadding='0'>");

          while ($cita = mysqli_fetch_array($hacerConsulta, MYSQLI_ASSOC)) {
            echo ("<tr><td>".$cita["horacita"]."</td>");
            echo ("<td>".$cita["usuario"]."</td>");

            echo ("<td><input type='radio' id='citaSeleccionada' name='citaSeleccionada' value='".$cita["idcita"]."'>");
            echo ("</td></tr>");
          }
          echo ("</table>");

          echo ("<input name='borrarCita' type='button' id='borrarCita' value='Eliminar Cita' onClick='javascript:saltar(\"eliminarCita.php\");'>".salto);
          echo ("<input name='cambiarCita' type='button' id='cambiarCita' value='Modificar cita' onClick='javascript:saltar(\"cambiarCita.php\");'>".salto);
        }

        echo ("<input name='nuevaCita' type='button' id='nuevaCita' value='Agregar cita' onClick='javascript:saltar(\"agregarCita.php\");'>".salto);
        echo ("<input name='cambiarFecha' type='button' id='cambiarFecha' value='Otro d&iacute;a' onClick='javascript:saltar(\"cambiarFecha.php\");'>".salto);
      ?>
    </form>
  </body>
</html>