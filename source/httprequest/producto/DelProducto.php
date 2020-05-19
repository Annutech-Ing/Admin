<?php
include '../../query/LogDao.php';

$codigo = filter_input(INPUT_POST, 'codigo');
$conn = new Conexion();
$conn->conectar();
$query = "DELETE FROM tbl_producto WHERE producto_id = $codigo";
if (mysqli_query($conn->conn,$query)) {
    $id = mysqli_insert_id($conn->conn);
} else {
    echo mysqli_error($conn->conn);
}

