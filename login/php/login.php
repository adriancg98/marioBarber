<?php
include 'conexion_be.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$db = getDB();
$hash_password = hash('sha256', $contrasena); //Password encryption 
$stmt = $db->prepare("SELECT id FROM usuarios WHERE usuario=:$usuario AND contrasena=:$hash_password");
$stmt->bindParam("usuario", $usuario, PDO::PARAM_STR);
$stmt->bindParam("hash_password", $hash_password, PDO::PARAM_STR);
$stmt->execute();
$count = $stmt->rowCount();
$data = $stmt->fetch(PDO::FETCH_OBJ);
$db = null;
if ($count) {
    $_SESSION['id'] = $data->id;
    return true;
} else {
    return false;
}
