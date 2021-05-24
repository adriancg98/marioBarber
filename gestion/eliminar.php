<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
$mysqli = include_once "../login/php/conexion_be.php";
$id = $_GET["id"];
$sentencia = $mysqli->prepare("DELETE FROM peinados WHERE id = ?");
$sentencia->bind_param("i", $id);
$sentencia->execute();
header("Location: listar.php");
