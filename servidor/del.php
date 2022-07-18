<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: DELETE");
$metodo = $_SERVER["REQUEST_METHOD"];
if ($metodo != "DELETE" && $metodo != "OPTIONS") {
    exit("Solo se permite método DELETE");
}

if (empty($_GET["id"])) {
    exit("No hay id de proveedor para eliminar");
}
$idpro = $_GET["id"];
$bd = include_once "ser.php";
$sentencia = $bd->prepare("DELETE FROM proveedor WHERE idProveedor = ?");
$resultado = $sentencia->execute([$idpro]);
echo json_encode($resultado);