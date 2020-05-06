<?php
    include '../conexion/Conexion.php';

    $id = filter_input(INPUT_POST, 'id');
    $folio = filter_input(INPUT_POST, 'folio');
    if(filter_input(INPUT_POST, 'desde') != '')
    {
        $desde = DateTime::createFromFormat('d/m/Y', filter_input(INPUT_POST, 'desde'))->format('Y/m/d');
    }
    else
    {
        $desde = '2000-01-01 00:00:00';
    }
    if(filter_input(INPUT_POST, 'hasta') != '')
    {
        $hasta = DateTime::createFromFormat('d/m/Y', filter_input(INPUT_POST, 'hasta'))->format('Y/m/d');
    }
    else
    {
        $hasta = '2100-01-01 00:00:00';
    }
    $estado = filter_input(INPUT_POST, 'estado');
    $linea = 0;
    $conn = new Conexion();
    try {
        $qryId = "";
        if($id != ""){
            $qryId = " AND venta_id = $id";
        }
        $qryFolio = "";
        if($folio != ""){
            $qryFolio = " AND folio_codigo = $folio";
        }
        $qryEstado = " AND venta_estado = $estado";
        $query = "SELECT * FROM tbl_venta JOIN tbl_folio ON venta_folio = folio_id LEFT JOIN tbl_dte ON venta_id = dte_venta "
                . " WHERE venta_fecha BETWEEN '$desde' AND '$hasta' ".$qryId.$qryFolio.$qryEstado
                . " ORDER BY venta_fecha DESC LIMIT 50";
        $conn->conectar();
        $result = mysqli_query($conn->conn,$query);
        while($row = mysqli_fetch_array($result)) {
            if($linea % 2 == 0){
                echo "<tr style='background-color:white;'>";
            }
            else{
                echo "<tr'>";
            }
            if($row['venta_estado'] == "3"){
                echo "<td><input disabled type='checkbox' name='check' id='check".$row['venta_id']."'></td>";
            }
            else{
                echo "<td><input type='checkbox' name='check' id='check".$row['venta_id']."'></td>";
            }
                echo "<td>".$row['venta_id']."</td>
                <td>".$row['venta_total']."</td>";
                $date = new DateTime($row['venta_fecha']);
                echo "<td>".$date->format('d-m-Y H:i:s')."</td>";
                if($row['venta_tipo'] == "33"){
                    echo "<td>33 - Factura electrónica</td>";
                }
                else if($row['venta_tipo'] == "39"){
                    echo "<td>39 - Boleta electrónica</td>";
                }
                else if($row['venta_tipo'] == "56"){
                    echo "<td>56 - Nota de débito electrónica</td>";
                }
                else if($row['venta_tipo'] == "61"){
                    echo "<td>61 - Nota de credito electrónica</td>";
                }
                echo "<td>".$row['folio_codigo']."</td>";
                if($row['venta_enviado'] == "0"){
                    echo "<td>No Enviado</td>";
                }
                else if($row['venta_enviado'] == "1"){
                    echo "<td>Enviado</td>";
                }
                echo "<td>".$row['dte_trackid']."</td>
                      <td>".$row['dte_error']."</td>
                <td><a href=\"javascript:void(0)\" onclick=\"enviarDte(".$row['venta_id'].")\">ENVIAR</a></td>";
            $linea++;
            echo "</tr>";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
?>   