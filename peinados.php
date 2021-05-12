<?php include('inc/funciones.php');?>

<?php 
$tituloPagina = "Peinados";
$pagina = "peinados";
include('inc/header.php'); ?>

    <!--Ofertas-->
    <div class="container">
      <div class="row">
      <?php foreach ($peinados as $peinado_id => $peinado) {

        echo portada($peinado_id, $peinado);

      } ?>

      </div>
      
      <hr>
    </div>
<?php include('inc/footer.php'); ?>