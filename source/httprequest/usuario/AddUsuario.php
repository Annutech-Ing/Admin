<?php
include '../../query/LogDao.php';

session_start();

ini_set('default_charset', 'ISO-8859-1');

$nombre = filter_input(INPUT_POST, 'nombre');
$clave = filter_input(INPUT_POST, 'clave');
$tipo = filter_input(INPUT_POST, 'tipo');
$saldo = filter_input(INPUT_POST, 'saldo');
$usuario = $_SESSION["agente"];
$conn = new Conexion();
$conn->conectar();
$query = "INSERT INTO tbl_usuario(usuario_nombre, usuario_password, usuario_tipo, usuario_saldo,usuario_creador) VALUES"
        . " ('$nombre','$clave',$tipo, $saldo,$usuario)";
if (mysqli_query($conn->conn,$query)) {
    $id = mysqli_insert_id($conn->conn);
} else {
    echo mysqli_error($conn->conn);
}