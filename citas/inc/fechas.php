<?php
//Salto de línea
define ("salto","\n<br>\n");


  if (isset($_POST["fechaEnCurso"])){
	  $fechaEnCurso=$_POST["fechaEnCurso"];
  } else {
	  $fechaEnCurso=date("Y-m-d");
  }

  
  $annioActual=substr($fechaEnCurso,0,4);
  $mesActual=substr($fechaEnCurso,5,2);
  $diaActual=substr($fechaEnCurso,8);
?>