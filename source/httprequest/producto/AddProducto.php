<?php
include '../../query/LogDao.php';
session_start();

ini_set('default_charset', 'ISO-8859-1');

$codigo = filter_input(INPUT_POST, 'codigo');
$nombre = filter_input(INPUT_POST, 'nombre');
$descripcion = filter_input(INPUT_POST, 'descripcion');
$precioCosto = filter_input(INPUT_POST, 'precioCosto');
$precioVenta = filter_input(INPUT_POST, 'precioVenta');
$departamento = filter_input(INPUT_POST, 'depto');
$stock = filter_input(INPUT_POST, 'stock');
$usuario = $_SESSION["agente"];
$catalogo = filter_input(INPUT_POST, 'catalogo');
$iva = filter_input(INPUT_POST, 'iva');
$desc1 = filter_input(INPUT_POST, 'desc1');
$desc2 = filter_input(INPUT_POST, 'desc2');
$desc3 = filter_input(INPUT_POST, 'desc3');
$conn = new Conexion();
$conn->conectar();
$query = "INSERT INTO tbl_producto(producto_id, producto_nombre, producto_descripcion,"
        . " producto_precio,producto_coste,producto_departamento,"
        . " producto_usuario,producto_descuento_nuevo,producto_descuento_normal,"
        . " producto_descuento_premium,producto_afecto, producto_mostrar_en_catalogo)"
        . " VALUES ('$codigo','$nombre','$descripcion',$precioVenta,$precioCosto,$departamento,'$usuario',$desc1,$desc2,$desc3,$iva,$catalogo)";
if (mysqli_query($conn->conn,$query)) {
    $id = mysqli_insert_id($conn->conn);
} else {
    echo mysqli_error($conn->conn);
}