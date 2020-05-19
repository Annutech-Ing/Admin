<?php
    include '../../conexion/Conexion.php';

    $nombre = filter_input(INPUT_POST, 'nombre');
    $descripcion = filter_input(INPUT_POST, 'descripcion');
    $linea = 0;
    $conn = new Conexion();
    try {
        $qryNombre = "";
        if($nombre != ""){
            $qryNombre = " AND departamento_nombre LIKE '%$nombre%' ";
        }
        $qryDesc = "";
        if($descripcion != ""){
            $qryDesc = " AND departamento_descripcion LIKE '%$descripcion%' ";
        }
        $query = "SELECT * FROM tbl_departamento WHERE 1=1 $qryNombre $qryDesc LIMIT 100";
        $conn->conectar();
        $result = mysqli_query($conn->conn,$query) or die (mysqli_error($conn->conn)); 
        while($row = mysqli_fetch_array($result)) {
            if($linea % 2 == 0){
                echo "<tr style='background-color:white;'>";
            }
            else{
                echo "<tr'>";
            }
                echo "<td>".$row['departamento_id']."</td>";
                echo "<td>".$row['departamento_nombre']."</td>";
                echo "<td>".$row['departamento_descripcion']."</td>";
                echo "<td>".($row['departamento_mostrar_en_catalogo'] != '0' ? "SI" : "NO")."</td>";
                echo "<td><a onclick=\"abrirModificar(".$row['departamento_id'].")\" href=\"javascript:void(0)\">MODIFICAR</a></td>";
                echo "<td><a onclick=\"eliminarDepartamento(".$row['departamento_id'].")\" href=\"javascript:void(0)\">ELIMINAR</a></td>";
            $linea++;
            echo "</tr>";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }