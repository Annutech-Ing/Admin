<?php
    include '../../conexion/Conexion.php';

    $nombre = filter_input(INPUT_POST, 'nombre');
    $descripcion = filter_input(INPUT_POST, 'descripcion');
    $precio = filter_input(INPUT_POST, 'precio');    
    $linea = 0;
    $conn = new Conexion();
    try {
        $qryNombre = "";
        if($nombre != ""){
            $qryNombre = " AND producto_nombre LIKE '%$nombre%' ";
        }
        $qryDesc = "";
        if($descripcion != ""){
            $qryDesc = " AND producto_descripcion LIKE '%$descripcion%' ";
        }
        $qryPrecio = "";
        if($precio != ""){
            $qryPrecio = " AND producto_precio = $precio ";
        }
        $query = "SELECT * FROM tbl_producto LEFT JOIN tbl_departamento ON producto_departamento = departamento_id WHERE 1=1 $qryNombre $qryDesc LIMIT 100";
        $conn->conectar();
        $result = mysqli_query($conn->conn,$query) or die (mysqli_error($conn->conn)); 
        while($row = mysqli_fetch_array($result)) {
            if($linea % 2 == 0){
                echo "<tr style='background-color:white;'>";
            }
            else{
                echo "<tr'>";
            }
                echo "<td>".$row['producto_id']."</td>";
                echo "<td>".$row['producto_nombre']."</td>";
                echo "<td>".$row['producto_descripcion']."</td>";
                echo "<td>".$row['producto_coste']."</td>";
                echo "<td>".$row['producto_precio']."</td>";
                echo "<td>".$row['departamento_nombre']."</td>";
                echo "<td>".($row['departamento_mostrar_en_catalogo'] != '0' ? "SI" : "NO")."</td>";
                echo "<td>".($row['departamento_afecto'] != '0' ? "SI" : "NO")."</td>";
                echo "<td><a onclick=\"abrirModificar('".$row['producto_id']."')\" href=\"javascript:void(0)\">MODIFICAR</a></td>";
                echo "<td><a onclick=\"eliminarProducto('".$row['producto_id']."')\" href=\"javascript:void(0)\">ELIMINAR</a></td>";
            $linea++;
            echo "</tr>";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }