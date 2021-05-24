<head>
  <link href="css/estilo.css" rel="stylesheet">
  <?php
  $tituloPagina = "Contacta con nosotros";
  $pagina = "contacto";
  include('inc/header.php'); ?>
</head>

<body>

  <div class="container" style="text-align: center;">
    <h2>Ubicación</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1119.6052375121083!2d-5.341725759696215!3d37.46728941317729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd12bfd2e7ce24d7%3A0x4a239e9ccc16e370!2sMario%20Barber!5e0!3m2!1ses!2ses!4v1621759961486!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
  <!-- Formulario de contacto-->
  <section class="formulario">
  <h1>Formulario de contacto</h1>
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