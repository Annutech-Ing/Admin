<?php
include '../../query/LogDao.php';

$rut = filter_input(INPUT_POST, 'rut');
$conn = new Conexion();
$conn->conectar();
$query = "DELETE FROM tbl_cliente WHERE cliente_rut = '$rut'";
if (mysqli_query($conn->conn,$query)) {
    $id = mysqli_insert_id($conn->conn);
} else {
    echo mysqli_error($conn->conn);
}

