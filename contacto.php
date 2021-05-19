<head>
  <link href="css/estilo.css" rel="stylesheet">
  <?php
  $tituloPagina = "Contacta con nosotros";
  $pagina = "contacto";
  include('inc/header.php'); ?>
</head>

<body>

  


  <!-- Formulario de contacto-->
  <section class="formulario">
    <form action="contact.php" method="post">
      <label for="nombre">Nombre:</label>
      <input id="nombre" type="text" name="nombre" placeholder="Nombre y Apellido" required="" />
      <label for="email">Email:</label>
      <input id="email" type="email" name="email" placeholder="ejemplo@correo.com" required="" />
      <label for="mensaje">Mensaje:</label>
      <textarea id="mensaje" name="mensaje" placeholder="Mensaje" required=""></textarea>
      <input id="submit" type="submit" name="submit" value="Enviar" />
    </form>
  </section>


  <?php include('inc/footer.php'); ?>
</body>