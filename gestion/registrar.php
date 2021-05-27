<?php
include_once "../login/php/conexion_be.php";
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
print_r($foto);
$precio = $_POST["precio"];
$sentencia = $conexion->prepare("INSERT INTO peinados (nombre, descripcion, foto, precio) VALUES (?, ?, ?, ?)");
$sentencia->bind_param("ssbs", $nombre, $descripcion, $foto, $precio);
$sentencia->execute();
//header("Location: listar.php");
