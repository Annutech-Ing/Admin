<?php
include '../../query/LogDao.php';

ini_set('default_charset', 'ISO-8859-1');

$nombre = filter_input(INPUT_POST, 'nombre');
$descripcion = filter_input(INPUT_POST, 'descripcion');
$catalogo = filter_input(INPUT_POST, 'catalogo');
$conn = new Conexion();
$conn->conectar();
$query = "INSERT INTO tbl_departamento (departamento_nombre,departamento_descripcion,departamento_mostrar_en_catalogo) VALUES ('$nombre','$descripcion',$catalogo)";
if (mysqli_query($conn->conn,$query)) {
    $id = mysqli_insert_id($conn->conn);
} else {
    echo mysqli_error($conn->conn);
}