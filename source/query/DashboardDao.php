<?php
include '../../conexion/Conexion.php';
include '../../dominio/Folio.php';

class DashboardDao {
    public function getProductosMasVendidos()
    {
        $array = array();
        try {
            $query = "SELECT producto_nombre,SUM(detalle_cantidad) AS total FROM tbl_detalle JOIN tbl_producto ON detalle_producto = producto_id GROUP BY producto_nombre ORDER BY total DESC LIMIT 10"; 
            $conn = Conexion::conectar();
            $result = pg_query($conn,$query); 
            while($row = pg_fetch_array($result)) {
                $array[$row["producto_nombre"]] = $row["total"];
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $array;
    }
    
    public function getProductosMenosVendidos()
    {
        $array = array();
        try {
            $query = "SELECT producto_nombre,SUM(detalle_cantidad) AS total FROM tbl_detalle JOIN tbl_producto ON detalle_producto = producto_id GROUP BY producto_nombre ORDER BY total LIMIT 10"; 
            $conn = Conexion::conectar();
            $result = pg_query($conn,$query); 
            while($row = pg_fetch_array($result)) {
                $array[$row["producto_nombre"]] = $row["total"];
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $array;
    }
    
    public function getFoliosDisponibles()
    {
        try {
            $query = "SELECT folio_estado,folio_tipo,COUNT(*) AS total FROM tbl_folio WHERE folio_estado = 0 GROUP BY folio_tipo ORDER BY folio_tipo"; 
            $conexion = new Conexion();
            $conexion->conectar();
            $result = mysqli_query($conexion->conn,$query); 
            $folio = new Folio();
            while($row = mysqli_fetch_array($result)) {
                if($row['folio_tipo'] == "33"){
                    $folio->setCantidad33($row["total"]);
                } else if($row['folio_tipo'] == "39"){
                    $folio->setCantidad39($row["total"]);
                } else if($row['folio_tipo'] == "56"){
                    $folio->setCantidad56($row["total"]);
                } else if($row['folio_tipo'] == "61"){
                    $folio->setCantidad61($row["total"]);
                }
                
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $folio;
    }
    
    public function getVentasDiarias()
    {
        $total = 0;
        $date = getdate();
        $dia = $date['mday'] < 10 ? "0".$date['mday'] : $date['mday'];
        $mes = $date['mon'] < 10 ? "0".$date['mon'] : $date['mon'];
        $anio = $date['year'];
        $fecha = $anio."-".$mes."-".$dia;
        try {
            $query = "SELECT SUM(venta_total) AS total FROM tbl_venta WHERE venta_fecha >= '".$fecha."'"; 
            $conexion = new Conexion();
            $conexion->conectar();
            $result = mysqli_query($conexion->conn,$query) or die(mysqli_error($conexion->conn)); 
            while($row = mysqli_fetch_array($result)) {
                $total = $row["total"];
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $total;
    }
    
        
    public function getVentasMensuales()
    {
        $total = 0;
        $date = getdate();
        $mes = $date['mon'] < 10 ? "0".$date['mon'] : $date['mon'];
        $anio = $date['year'];
        $fecha = $anio."-".$mes."-01";
        try {
            $query = "SELECT SUM(venta_total) AS total FROM tbl_venta WHERE venta_fecha >= '".$fecha."'"; 
            $conexion = new Conexion();
            $conexion->conectar();
            $result = mysqli_query($conexion->conn,$query) or die(mysqli_error($conexion->conn)); 
            while($row = mysqli_fetch_array($result)) {
                $total = $row["total"];
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $total;
    }
}
