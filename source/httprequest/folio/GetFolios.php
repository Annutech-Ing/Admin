<?php
    include '../../conexion/Conexion.php';

    $id = filter_input(INPUT_POST, 'id');
    $tipo = filter_input(INPUT_POST, 'tipo');
    $estado = filter_input(INPUT_POST, 'estado');
    $linea = 0;
    $conn = new Conexion();
    try {
        $qryId = "";
        if($id != ""){
            $qryId = " AND folio_codigo = $id";
        }
        $qryTipo = "";
        if($tipo != ""){
            $qryTipo = " AND folio_codigo = $folio";
        }
        
        $qryEstado = "";
        if($estado != ""){
            $qryEstado = " AND folio_estado = $estado";
        }
        $query = "SELECT * FROM tbl_folio WHERE 1=1 $qryId $qryTipo $qryEstado"
                . " ORDER BY folio_id DESC LIMIT 500";

        $conn->conectar();
        $result = mysqli_query($conn->conn,$query) or die (mysqli_error($conn->conn)); 
        while($row = mysqli_fetch_array($result)) {
            if($linea % 2 == 0){
                echo "<tr style='background-color:white;'>";
            }
            else{
                echo "<tr'>";
            }
            echo "<td>".$row['folio_codigo']."</td>";
            $date = new DateTime($row['folio_creado']);
            echo "<td>".$date->format('d-m-Y H:i:s')."</td>";
            if($row['folio_tipo'] == "33"){
                echo "<td>33 - Factura electrónica</td>";
            }
            else if($row['folio_tipo'] == "39"){
                echo "<td>39 - Boleta electrónica</td>";
            }
            else if($row['folio_tipo'] == "56"){
                echo "<td>56 - Nota de débito electrónica</td>";
            }
            else if($row['folio_tipo'] == "61"){
                echo "<td>61 - Nota de crédito electrónica</td>";
            }
            if($row['folio_estado'] == "0"){
                echo "<td>Disponible</td>";
            }
            else{
                echo "<td>Ocupado</td>";
            }
            echo "<td>".$row['folio_archivo']."</td>";
//            echo "<td>".$row['folio_asignado']."</td>";
            $linea++;
            echo "</tr>";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
?>   