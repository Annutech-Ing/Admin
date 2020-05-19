<?php
    include '../../conexion/Conexion.php';

    header('Content-Type: application/json');

    $rut = filter_input(INPUT_POST, 'rut');
    $linea = 0;
    $conn = new Conexion();
    try {
        $query = "SELECT * FROM tbl_cliente WHERE cliente_rut = '$rut'";
        $conn->conectar();
        $result = mysqli_query($conn->conn,$query) or die (mysqli_error($conn->conn)); 
        while($row = mysqli_fetch_array($result)) {
            echo "{\"rut\":\"".$row['cliente_rut']."\","
                . "\"nombre\":\"".$row['cliente_nombre']."\","
                . "\"giro\":\"".$row['cliente_giro']."\","
                . "\"mail\":\"".$row['cliente_mail']."\","
                . "\"telefono\":\"".$row['cliente_telefono']."\","
                . "\"direccion\":\"".$row['cliente_direccion']."\","
                . "\"comuna\":\"".$row['cliente_comuna']."\","
                . "\"ciudad\":\"".$row['cliente_ciudad']."\","
                . "\"descuento\":\"".$row['cliente_descuento']."\""
                ."}";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }