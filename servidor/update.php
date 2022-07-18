<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: *");
if ($_SERVER["REQUEST_METHOD"] != "PUT") {
    exit("Solo acepto peticiones PUT");
}
$jpro = json_decode(file_get_contents("php://input"));
if (!$jpro) {
    exit("No hay datos");
}
$bd = include_once "ser.php";
$sentencia = $bd->prepare("UPDATE proveedor SET nombre = ?, direccion = ?, nit = ?, celular = ? WHERE idProveedor = ?");
$resultado = $sentencia->execute([$jsonprove->nom, $jsonprove->dir, $jsonprove->nit, $jsonprove->celular, $jsonprove->id]);
echo json_encode($resultado);