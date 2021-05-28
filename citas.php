<?php
$tituloPagina = "Pide tu cita";
$pagina = "citas";
include('inc/header.php');
if (empty($_SESSION['usuario'])) {
  echo '<script>
      alert("¡Debes registrarte o iniciar sesión!");
      window(location= "index.php");
    </script>';
}
?>

<html>

<head>
  <script language="javascript" type="text/javascript">
    function saltar(pagina) {
      document.formularioCitasPrincipal.action = pagina;
      document.formularioCitasPrincipal.submit();
    }
  </script>

  <title>Citas</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
  <?php
  // Se incluye el miniscript que abre la base de datos.
  include("citas/inc/fechas.php");
  // Se incluye el miniscript de tratamiento de fechas
  include("citas/inc/usarBD.php");
  if ($_SESSION['rol'] != 'Administrador') {
    $consulta = "SELECT * FROM citas WHERE diacita='" . $fechaEnCurso . "' WHERE usuario =" . $_SESSION['usuario'] . "ORDER BY horacita;";

    $hacerConsulta = $conexion->query($consulta);

    $numeroDeCitasDelDia = mysqli_num_rows($hacerConsulta);
    echo ("Citas del día: " . $numeroDeCitasDelDia . salto);
  ?>
    AGENDA DEL D&Iacute;A:
    <?php

    echo ($diaActual . " del " . $mesActual . " de " . $annioActual);
    ?>

    <form action="" method="post" name="formularioCitasPrincipal" id="formularioCitasPrincipal">

      <input type="hidden" name="fechaEnCurso" id="fechaEnCurso" value="<?php echo ($fechaEnCurso); ?>">
      <table width="500" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th>CITAS</th>
        </tr>
      </table>
      <hr>
      <?php
      if ($numeroDeCitasDelDia > 0) {

        echo ("<table width='500' border='0' cellspacing='0' cellpadding='0'>");

        while ($cita = mysqli_fetch_array($hacerConsulta, MYSQLI_ASSOC)) {
          echo ("<tr><td>" . $cita["horacita"] . "</td>");
          echo ("<td>" . $cita["usuario"] . "</td>");

          echo ("<td><input type='radio' id='citaSeleccionada' name='citaSeleccionada' value='" . $cita["idcita"] . "'>");
          echo ("</td></tr>");
        }
        echo ("</table>");

        echo ("<input name='borrarCita' type='button' id='borrarCita' value='Eliminar Cita' onClick='javascript:saltar(\"citas/eliminarCita.php\");'>" . salto);
        echo ("<input name='cambiarCita' type='button' id='cambiarCita' value='Modificar cita' onClick='javascript:saltar(\"citas/cambiarCita.php\");'>" . salto);
      }

      echo ("<input name='nuevaCita' type='button' id='nuevaCita' value='Agregar cita' onClick='javascript:saltar(\"citas/agregarCita.php\");'>" . salto);
      echo ("<input name='cambiarFecha' type='button' id='cambiarFecha' value='Otro d&iacute;a' onClick='javascript:saltar(\"citas/cambiarFecha.php\");'>" . salto);
      ?>
    </form>
  <?php } ?>

  <?php if ($_SESSION['rol'] == 'Administrador') { ?>

    <!--Todas las citas-->
    <div class="container">
      <div class="row">
        <?php
        $consulta = "SELECT * FROM citas WHERE diacita='" . $fechaEnCurso . "' ORDER BY horacita;";

        $hacerConsulta = $conexion->query($consulta);

        $numeroDeCitasDelDia = mysqli_num_rows($hacerConsulta);
        echo ("Citas del día: " . $numeroDeCitasDelDia . salto);
        $consulta = $conexion->query("SELECT id, horacita, diacita, usuario FROM citas ORDER BY diacita, horacita");
        $resultados = $consulta->fetch_all(MYSQLI_ASSOC);
        
        ?>

        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Hora</th>
              <th>Día</th>
              <th>Usuario</th>
              <th>Aceptar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($resultados as $resultado) { ?>
              <tr>
                <td align="center"><?php echo "<h1>" . $resultado['id'] . "</h1>" ?></td>
                <td align="center"><?php echo "<h1>" . $resultado['horacita'] . "</h1>" ?></td>
                <td align="center"><?php echo "<h1>" . $resultado['diacita'] . "</h1>" ?></td>
                <td align="center"><?php echo "<h1>" . $resultado['usuario'] . "</h1>" ?></td>
                <?php if ($_SESSION['estado'] == false){
                  echo '<td align="center"><a href="citas/correo.php?id=<?php echo $resultado["id"] ?><button class="btn btn-success">Aceptar cita</button></a></td>';
                } else{
                  echo '<h1>ACEPTADA</h1>';
                  }
                ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
    <?php } ?>
    <hr>
    </div>
    <?php include('inc/footer.php'); ?>
</body>

</html>