<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
$jsonprove = json_decode(file_get_contents("php://input"));
if (!$jsonprove) {
    exit("No hay datos");
}
$bd = include_once "ser.php";
$sentencia = $bd->prepare("insert into proveedor(nombre, direccion, nit,celular) values (?,?,?,?)");
$resultado = $sentencia->execute([$jsonprove->nom, $jsonprove->dir, $jsonprove->nit, $jsonprove->celular]);
echo json_encode([
    "resultado" => $resultado,
]);