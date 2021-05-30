<?php
include_once "../login/php/conexion_be.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$foto = $_POST["foto"];
$precio = $_POST["precio"];

$sentencia = $conexion->prepare("UPDATE peinados SET
nombre = ?,
descripcion = ?,
foto = ?,
precio = ?
WHERE id = ?");
$sentencia->bind_param("ssiss", $nombre, $descripcion, $id, $foto, $precio);
$sentencia->execute();
header("Location: ../listar.php");
