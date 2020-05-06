<?php
    include '../../conexion/Conexion.php';

    header('Content-Type: application/json');

    $id = filter_input(INPUT_POST, 'id');
    $linea = 0;
    $conn = new Conexion();
    try {
        $query = "SELECT * FROM tbl_departamento WHERE departamento_id = $id";
        $conn->conectar();
        $result = mysqli_query($conn->conn,$query) or die (mysqli_error($conn->conn)); 
        while($row = mysqli_fetch_array($result)) {
            echo "{\"id\":\"".$row['departamento_id']."\","
                . "\"nombre\":\"".$row['departamento_nombre']."\","
                . "\"descripcion\":\"".$row['departamento_descripcion']."\","
                . "\"catalogo\":\"".$row['departamento_mostrar_en_catalogo']."\""
                ."}";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }