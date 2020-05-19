<?php
include '../../query/LogDao.php';

ini_set('default_charset', 'ISO-8859-1');

$id = filter_input(INPUT_POST, 'id');
$nombre = filter_input(INPUT_POST, 'nombre');
$descripcion = filter_input(INPUT_POST, 'descripcion');
echo filter_input(INPUT_POST, 'catalogo');
$catalogo = filter_input(INPUT_POST, 'catalogo');
$conn = new Conexion();
$conn->conectar();
$query = "UPDATE tbl_departamento SET departamento_nombre = '$nombre', departamento_descripcion = '$descripcion', departamento_mostrar_en_catalogo = $catalogo WHERE departamento_id = $id";
if (mysqli_query($conn->conn,$query)) {
    $id = mysqli_insert_id($conn->conn);
} else {
    echo mysqli_error($conn->conn);
}

