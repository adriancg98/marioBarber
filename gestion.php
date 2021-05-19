<?php include('inc/funciones.php');?>

<?php 
$tituloPagina = "Gestionar";
$pagina = "gestion";
include('inc/header.php'); ?>
      <script>
        var con_admin = prompt("Introduce la contraseña de administrador");
        if(con_admin != "administrador123"){
          window(location= "index.php");
        }
      </script>
      
      <hr>
    </div>
<?php include('inc/footer.php'); ?>