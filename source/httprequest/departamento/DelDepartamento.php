<?php
include '../../query/LogDao.php';

$id = filter_input(INPUT_POST, 'id');
$conn = new Conexion();
$conn->conectar();
$query = "DELETE FROM tbl_departamento WHERE departamento_id = $id";
if (mysqli_query($conn->conn,$query)) {
    $id = mysqli_insert_id($conn->conn);
} else {
    echo mysqli_error($conn->conn);
}

