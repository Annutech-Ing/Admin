<?php
//include '../util/validarPeticion.php';
include '../../conexion/Conexion.php';
include '../../dominio/Log.php';
//include './LogQuery.php';

class LogDao {
    
    public function getLogs($resumen,$usuario,$ip,$desde,$hasta)
    {
        try {
            $logs = array();
            $query = "SELECT * FROM tbl_log LEFT JOIN tbl_usuario ON log_usuario = usuario_id WHERE 1=1 ";
            if($resumen != ''){
                $query .= " AND log_resumen ILIKE '%".$resumen."%'";
            }
            if($usuario != ''){
                $query .= " AND usuario_nombre ILIKE '%".$usuario."%'";                   
            }
            if($ip != ''){
                $query .= " AND log_ip ILIKE '".$ip."%'";
            }
            if($desde != '' && $hasta != ''){
                $query .= " AND log_fecha BETWEEN '".$desde."' AND '".$desde."'";
            }
            $conn = Conexion::conectar();
            $result = pg_query($conn,$query); 
            while($row = pg_fetch_array($result)) {
                $log = new Log();
                $log->setId($row["log_id"]);
                $log->setResumen($row["log_resumen"]);
                $log->setUsuario($row["usuario_nombre"]);
                $log->setFecha($row["log_fecha"]);
                $log->setIp($row["log_ip"]);
                $log->setTipo($row["log_tipo"]);
                array_push($logs, $log);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $logs;
    }

    public static function agregarSincronizacion($sql)
    {
        $id = 0;
        $conn = new Conexion();
        try {
            $query = "INSERT INTO tbl_sincronizacion (sincronizacion_query) VALUES (\"".$sql."\")"; 
            $conn->conectar();
            if (mysqli_query($conn->conn,$query) or die (mysqli_error($conn->conn))) {
                $id = mysqli_insert_id($conn->conn);
                LogDao::obtenerPuntoSincro($id);
            } else {
                echo mysqli_error($conn->conn);
            }  
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public static function obtenerPuntoSincro($id){
        try {
            $query = "SELECT puntoventa_id FROM tbl_puntoventa WHERE puntoventa_activo = 1"; 
            $conn = new Conexion();
            $conn->conectar();
            $result = mysqli_query($conn->conn,$query); 
            while($row = mysqli_fetch_array($result)) {
                LogDao::agregarPuntoSincro($id,$row["puntoventa_id"]);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    public static function agregarPuntoSincro($idSincro,$idPunto)
    {
        $id = 0;
        $conn = new Conexion();
        try {
            $query = "INSERT INTO tbl_sincropunto (sincropunto_sincro,sincropunto_punto) VALUES ($idSincro,$idPunto)"; 
            $conn->conectar();
            mysqli_query($conn->conn,$query);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
}
