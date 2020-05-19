<?php
    
    include '../../conexion/Conexion.php';
    
    
    $tipo = filter_input(INPUT_GET, "tipo");
    $archivo = filter_input(INPUT_GET, "archivo");
    $inicio = filter_input(INPUT_GET, "inicio");
    $fin = filter_input(INPUT_GET, "fin");
    $fecha = filter_input(INPUT_GET, "fecha");
    $query = "";
    if($tipo != "")
    {
        for($i = $inicio; $i < $fin+1; $i++ ){
            $query .= "INSERT INTO tbl_folio (folio_codigo, folio_tipo, folio_archivo, folio_fecha_res, folio_id_unico) VALUES ('$i','$tipo','$archivo','$fecha','$i-$tipo');";
        }
            $conn = new Conexion();
            $conn->conectar();
            if ($conn->conn->multi_query($query) === TRUE) {
                echo "OK";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn->conn);
            }
            $conn->desconectar();

    }