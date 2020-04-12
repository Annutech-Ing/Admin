<?php
include '../../query/LogDao.php';

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
$query = "UPDATE tbl_cliente SET cliente_nombre = '$nombre', cliente_giro = '$giro',"
        . " cliente_mail = '$mail', cliente_telefono = '$telefono', cliente_direccion = '$direccion',"
        . " cliente_comuna = '$comuna', cliente_ciudad = '$ciudad', cliente_descuento = '$descuento' "
        . "WHERE cliente_rut = '$rut';";
if (mysqli_query($conn->conn,$query)) {
    $id = mysqli_insert_id($conn->conn);
} else {
    echo mysqli_error($conn->conn);
}

