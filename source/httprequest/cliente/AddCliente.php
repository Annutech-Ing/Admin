<?php
include '../../query/LogDao.php';
session_start();

ini_set('default_charset', 'ISO-8859-1');

$rut = filter_input(INPUT_POST, 'rut');
$nombre = filter_input(INPUT_POST, 'nombre');
$giro = filter_input(INPUT_POST, 'giro');
$mail = filter_input(INPUT_POST, 'mail');
$telefono = filter_input(INPUT_POST, 'telefono');
$direccion = filter_input(INPUT_POST, 'direccion');
$comuna = filter_input(INPUT_POST, 'comuna');
$ciudad = filter_input(INPUT_POST, 'ciudad');
$tipo = filter_input(INPUT_POST, 'tipo');
$descuento = filter_input(INPUT_POST, 'descuento');
$conn = new Conexion();
$conn->conectar();
$query = "INSERT INTO tbl_cliente(cliente_rut, cliente_nombre, cliente_giro,"
        . " cliente_mail,cliente_telefono,cliente_direccion,"
        . " cliente_comuna,cliente_ciudad,cliente_tipo, cliente_descuento)"
        . " VALUES ('$rut','$nombre','$giro','$mail','$telefono','$direccion','$comuna','$ciudad',$tipo,$descuento)";
if (mysqli_query($conn->conn,$query)) {
    $id = mysqli_insert_id($conn->conn);
} else {
    echo mysqli_error($conn->conn);
}