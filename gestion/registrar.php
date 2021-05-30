<?php
include_once "../login/php/conexion_be.php";
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));

$precio = $_POST["precio"];
$sentencia = $conexion->query("INSERT INTO peinados (nombre, descripcion, foto, precio) VALUES ('" . $nombre . "', '" . $descripcion . "', '" . $foto . "', '" . $precio . "')");

header("Location: ../listar.php");
