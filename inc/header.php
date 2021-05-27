<!doctype html>

<html class="no-js" lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo $tituloPagina; ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="img/favicon.ico" type="image/ico" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <style>
    body {
      padding-top: 50px;
      padding-bottom: 20px;
    }
  </style>
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">

  <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
  <?php
    session_start();
  ?>
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" width="40px" style="margin-top: -10px;"></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li <?php if ($pagina == "inicio") {
                echo "class = 'active'";
              } ?>><a href="index.php">Inicio</a></li>
          <li <?php if ($pagina == "peinados") {
                echo "class = 'active'";
              } ?>><a href="peinados.php">Peinados</a></li>
          <li <?php if ($pagina == "citas") {
                echo "class = 'active'";
              } ?>><a href="citas.php">Pide tu cita</a></li>
          <li <?php if ($pagina == "contacto") {
                echo "class = 'active'";
              } ?>><a href="contacto.php">Contacto</a></li>
          <li <?php if ($pagina == "gestion") {
                echo "class = 'active'";
              } ?>><a href="gestion/listar.php">Gestionar peinados</a></li>
        </ul>
        <?php
        if (empty($_SESSION['usuario'])) {
          echo '<form action="login/index.php" class="navbar-form navbar-right">';
          echo '<button type="submit" class="btn btn-success">Iniciar sesión / Registrarse</button>';
          echo '</form>';
        } else {
          echo '<form action="login/php/cerrar_sesion.php" class="navbar-form navbar-right">';
          echo '<button type="submit" class="btn btn-danger">Cerrar sesión</button>';
          echo '</form>';
        }
        ?>

        </form>
      </div>

    </div>
  </nav>
  <?php if (isset($_SESSION['mensaje'])) {
    echo '<div class="alert alert-primary" role="alert">' . $_SESSION['mensaje'] . '</div>';
    unset($_SESSION['mensaje']);
  }