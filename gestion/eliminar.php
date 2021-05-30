<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
include_once "../login/php/conexion_be.php";
$id = $_GET["id"];
$sentencia = $conexion->prepare("DELETE FROM peinados WHERE id = ?");
$sentencia->bind_param("i", $id);
$sentencia->execute();
header("Location: ../listar.php");
