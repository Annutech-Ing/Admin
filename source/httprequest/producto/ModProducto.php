<?php
include '../../query/LogDao.php';

ini_set('default_charset', 'ISO-8859-1');

$codigo = filter_input(INPUT_POST, 'codigo');
$nombre = filter_input(INPUT_POST, 'nombre');
$descripcion = filter_input(INPUT_POST, 'descripcion');
$precioCosto = filter_input(INPUT_POST, 'precioCosto');
$precioVenta = filter_input(INPUT_POST, 'precioVenta');
$departamento = filter_input(INPUT_POST, 'departamento') != '' ? filter_input(INPUT_POST, 'departamento') : "0";
$stock = filter_input(INPUT_POST, 'stock');
$catalogo = filter_input(INPUT_POST, 'catalogo');
$iva = filter_input(INPUT_POST, 'iva');
$desc1 = filter_input(INPUT_POST, 'desc1');
$desc2 = filter_input(INPUT_POST, 'desc2');
$desc3 = filter_input(INPUT_POST, 'desc3');
$conn = new Conexion();
$conn->conectar();
$query = "UPDATE tbl_producto SET producto_nombre = '$nombre', producto_descripcion = '$descripcion',"
        . " producto_precio = $precioCosto, producto_coste = $precioVenta, producto_departamento = $departamento,"
        . " producto_descuento_nuevo = $desc1, producto_descuento_normal = $desc2, producto_descuento_premium = $desc3,"
        . " producto_afecto = $iva, producto_mostrar_en_catalogo = $catalogo "
        . "WHERE producto_id = '$codigo';";
echo $query;
if (mysqli_query($conn->conn,$query)) {
    $id = mysqli_insert_id($conn->conn);
} else {
    echo mysqli_error($conn->conn);
}

