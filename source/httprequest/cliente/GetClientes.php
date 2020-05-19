<?php
    include '../../conexion/Conexion.php';

    $rut = filter_input(INPUT_POST, 'rut');
    $nombre = filter_input(INPUT_POST, 'nombre');
    $giro = filter_input(INPUT_POST, 'giro');    
    $mail = filter_input(INPUT_POST, 'mail');    
    $linea = 0;
    $conn = new Conexion();
    try {
        $qryRut = "";
        if($rut != ""){
            $qryRut = " AND cliente_rut LIKE '%$rut%' ";
        }
        $qryNombre = "";
        if($nombre != ""){
            $qryNombre = " AND cliente_nombre LIKE '%$nombre%' ";
        }
        $qryGiro = "";
        if($giro != ""){
            $qryGiro = " AND cliente_giro LIKE '%$giro%' ";
        }
        $qryMail = "";
        if($mail != ""){
            $qryMail = " AND cliente_descripcion LIKE '%$mail%' ";
        }
        $query = "SELECT * FROM tbl_cliente WHERE 1=1 $qryRut $qryNombre $qryGiro $qryMail LIMIT 100";
        $conn->conectar();
        $result = mysqli_query($conn->conn,$query) or die (mysqli_error($conn->conn)); 
        while($row = mysqli_fetch_array($result)) {
            if($linea % 2 == 0){
                echo "<tr style='background-color:white;'>";
            }
            else{
                echo "<tr'>";
            }
                echo "<td>".$row['cliente_rut']."</td>";
                echo "<td>".$row['cliente_nombre']."</td>";
                echo "<td>".$row['cliente_giro']."</td>";
                echo "<td>".$row['cliente_mail']."</td>";
                echo "<td>".$row['cliente_telefono']."</td>";
                echo "<td>".$row['cliente_direccion']."</td>";
                echo "<td>".$row['cliente_comuna']."</td>";
                echo "<td>".$row['cliente_ciudad']."</td>";
                echo "<td><a onclick=\"abrirModificar('".$row['cliente_rut']."')\" href=\"javascript:void(0)\">MODIFICAR</a></td>";
                echo "<td><a onclick=\"eliminarCliente('".$row['cliente_rut']."')\" href=\"javascript:void(0)\">ELIMINAR</a></td>";
            $linea++;
            echo "</tr>";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }