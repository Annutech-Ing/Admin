<?php
include '../../query/LogDao.php';

ini_set('default_charset', 'ISO-8859-1');

$id = filter_input(INPUT_POST, 'id');
$nombre = filter_input(INPUT_POST, 'nombre');
$clave = filter_input(INPUT_POST, 'clave');
$tipo = filter_input(INPUT_POST, 'tipo');
$saldo = filter_input(INPUT_POST, 'saldo');
$conn = new Conexion();
$conn->conectar();
$query = "UPDATE tbl_usuario SET usuario_nombre = '$nombre', usuario_password = '$clave',"
        . " usuario_tipo = $tipo, usuario_saldo = $saldo "
        . "WHERE usuario_id = '$id';";
if (mysqli_query($conn->conn,$query)) {
    $id = mysqli_insert_id($conn->conn);
} else {
    echo mysqli_error($conn->conn);
}

