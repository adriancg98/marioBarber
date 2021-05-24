<?php
$mysqli = include_once "../login/php/conexion_be.php";
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$foto = $_POST["foto"];
$precio = $_POST["precio"];
$sentencia = $mysqli->prepare("INSERT INTO peinados
(nombre, descripcion, foto, precio)
VALUES
(?, ?)");
$sentencia->bind_param("ssss", $nombre, $descripcion, $foto, $precio);
$sentencia->execute();
header("Location: listar.php");
