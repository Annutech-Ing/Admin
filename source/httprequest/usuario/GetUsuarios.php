<?php
    include '../../conexion/Conexion.php';

    $nombre = filter_input(INPUT_POST, 'nombre');
    $linea = 0;
    $conn = new Conexion();
    try {
        $qryNombre = "";
        if($nombre != ""){
            $qryNombre = " AND usuario_nombre LIKE '%$nombre%' ";
        }
        $query = "SELECT * FROM tbl_usuario WHERE 1=1 $qryNombre LIMIT 100";
        $conn->conectar();
        $result = mysqli_query($conn->conn,$query) or die (mysqli_error($conn->conn)); 
        while($row = mysqli_fetch_array($result)) {
            if($linea % 2 == 0){
                echo "<tr style='background-color:white;'>";
            }
            else{
                echo "<tr'>";
            }
                echo "<td>".$row['usuario_id']."</td>";
                echo "<td>".$row['usuario_nombre']."</td>";
                echo "<td>".$row['producto_tipo']."</td>";
                echo "<td>".$row['producto_saldo']."</td>";
                echo "<td><a onclick=\"abrirModificar('".$row['usuario_id']."')\" href=\"javascript:void(0)\">MODIFICAR</a></td>";
                echo "<td><a onclick=\"eliminarUsuario('".$row['usuario_id']."')\" href=\"javascript:void(0)\">ELIMINAR</a></td>";
            $linea++;
            echo "</tr>";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }