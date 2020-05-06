<?php
    include '../conexion/Conexion.php';
    include './Funciones.php';
    
    $file = "archivo.txt";
    $arrayText = array ("Código: ", "Nombre: " ,"Precio Costo: "," Precio Venta: ");
    
    
    $resumen = filter_input(INPUT_POST, 'resumen');//valor formulario <--------------------------
    $usuario = filter_input(INPUT_POST, 'usuario');
    $ip      = filter_input(INPUT_POST, 'ip');
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
    $tipo = filter_input(INPUT_POST, 'tipo');
    $linea = 0;
    $conn = new Conexion();
    try {
        $qryResumen = "";//esta variable trae el where si resumen no es vacio
        if($resumen != ""){
            $qryResumen = "WHERE log_resumen LIKE '%$resumen%' AND log_usuario = '%$usuario%' AND log_ip LIKE'%$ip%' AND log_fecha BETWEEN CAST('%$desde%' AS DATE) AND CAST('%$hasta%' AS DATE) AND log_tipo ='%$tipo%'";
        }
        $query = "SELECT * FROM tbl_log LEFT JOIN tbl_usuario ON log_usuario = usuario_id ".$qryResumen." ORDER BY log_fecha DESC LIMIT 100";
        $archivo = Funciones::archivoTexto($file);
        '<tr><td>'.$query. '</td></tr>' ;
        $conn->conectar();
        $result = mysqli_query($conn->conn,$query); 
        while($row = mysqli_fetch_array($result)) {
            if($linea % 2 == 0){
                echo "<tr style='background-color:white;'>";
            }
            else{
                echo "<tr>";
            }
                echo "<td>".$row['log_id']."</td>
                <td>".Funciones::formatoResumen($row['log_resumen'], $arrayText, $row['log_tipo'])."</td>
                <td>".Funciones::formatoFecha($row['log_fecha'])."</td>
                <td>".$row['usuario_nombre']."</td>";
                echo "<td>".$row['log_ip']."</td>";
            $linea++;
            echo "</tr>";
        }
        echo '<tr><td>'.$query. '</td></tr>' ;
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
    

?>   