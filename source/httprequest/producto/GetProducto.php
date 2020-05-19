<?php
    include '../../conexion/Conexion.php';

    header('Content-Type: application/json');

    $codigo = filter_input(INPUT_POST, 'codigo');
    $linea = 0;
    $conn = new Conexion();
    try {
        $query = "SELECT * FROM tbl_producto WHERE producto_id = '$codigo'";
        $conn->conectar();
        $result = mysqli_query($conn->conn,$query) or die (mysqli_error($conn->conn)); 
        while($row = mysqli_fetch_array($result)) {
            $cantidad = "0";
            $queryCant = "SELECT SUM(inventario_entrada) - SUM(inventario_salida) AS producto_cantidad FROM tbl_inventario WHERE inventario_producto = '".$row['producto_id']."'";
            $resultCant = mysqli_query($conn->conn,$queryCant) or die (mysqli_error($conn->conn)); 
            while($rowCant = mysqli_fetch_array($resultCant)) {
                if($rowCant["producto_cantidad"] != ""){
                    $cantidad = $rowCant["producto_cantidad"];
                }
            }
            echo "{\"codigo\":\"".$row['producto_id']."\","
                . "\"nombre\":\"".$row['producto_nombre']."\","
                . "\"descripcion\":\"".$row['producto_descripcion']."\","
                . "\"precio_costo\":\"".$row['producto_coste']."\","
                . "\"precio_venta\":\"".$row['producto_precio']."\","
                . "\"depto\":\"".$row['producto_departamento']."\","
                . "\"stock\":\"".$cantidad."\","
                . "\"catalogo\":\"".$row['producto_mostrar_en_catalogo']."\","
                . "\"iva\":\"".$row['producto_afecto']."\","
                . "\"descuento1\":\"".$row['producto_descuento_nuevo']."\","
                . "\"descuento2\":\"".$row['producto_descuento_normal']."\","
                . "\"descuento3\":\"".$row['producto_descuento_premium']."\""
                ."}";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }