<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
$bd = include_once "ser.php";
$sentencia = $bd->query("select * from proveedor");
$proveedores = $sentencia->fetchAll(PDO::FETCH_OBJ);
echo json_encode($proveedores);