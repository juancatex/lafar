<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
if (empty($_GET["id"])) {
    exit("No hay id de proveedor");
}
//pablo.montenegro@lafar.net
$idprove = $_GET["id"];
$bd = include_once "ser.php";
$sentencia = $bd->prepare("select * from proveedor where idProveedor = ?");
$sentencia->execute([$idprove]);
$proveedor = $sentencia->fetchObject();
echo json_encode($proveedor);