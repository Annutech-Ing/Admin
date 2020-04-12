<?php
include '../../query/LogDao.php';

$id = filter_input(INPUT_POST, 'id');
$conn = new Conexion();
$conn->conectar();
$query = "DELETE FROM tbl_usuario WHERE usuario_id = $id AND usuario_nombre != 'admin'";
if (mysqli_query($conn->conn,$query)) {
    $id = mysqli_insert_id($conn->conn);
} else {
    echo mysqli_error($conn->conn);
}

