<?php
include_once "../login/php/conexion_be.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];

$consulta = "UPDATE peinados SET nombre='" . $nombre . "', descripcion='" . $descripcion . "', ";

if (!empty($_FILES['foto']) && $_FILES['foto']['size'] > 0){
    $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    $consulta .= "foto='" . $foto . "', ";
}
$consulta .= "precio='" . $precio . "' WHERE id = $id";
$sentencia = $conexion->query($consulta);

header("Location: ../listar.php");
