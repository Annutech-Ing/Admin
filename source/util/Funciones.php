<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of funciones
 *
 * @author HP
 */
class Funciones {
    
    
    public static function formatoFecha($fecha)
    {
                       
        $newDate = date("d-m-Y H:i", strtotime($fecha));  
        //echo "La FECHA ERA ASI: $fecha Y AHORA ES ASI ".$newDate. "";  
        
        return $newDate;
         
    }
    
    
    public static function formatoResumen($resumen,$arrayText,$tipo)
    {
        $arrayResumen = explode('%',$resumen);
        $contenidoImp="";
        
        if ($tipo == '11' ||$tipo =='14' || $tipo=='17'|| $tipo=='24' ) 
        {
            for($i=0; $i<count($arrayText); $i++)
            {
                if ($i>0) {
                    $contenidoImp .= '  '.$arrayText[$i].'   '.$arrayResumen[$i].' ';
                    echo "<br>";
                }
                else {
                    $contenidoImp .= '    '.$arrayResumen[$i].' ';
                }
            }
            return $contenidoImp;
        }
        else 
        {
            return $resumen;
        }
        
    }
    
    
    public static function archivoTexto($file)
    {
        $file = fopen("archivo.txt", "a")
        or die("Problema al crear archivo");

        fwrite($file, "Esta es una prueba bro ");
        fwrite($file, "\n");
        fclose($file);
        
        return $file;
        
        
        //$file = fopen("arcchivo.txt", "r")
        //or die("Problema al abrir arichivo");
        //while (!feof($file))
        //{
        //    $leer = fgetc($file);
        //    $imprimir = nl2br($leer);
        //    echo $imprimir;
        //}
    }

}