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
                       
        $fecha = "2019-09-15 5:35 PM";  
        $newDate = date("d-m-Y H:i", strtotime($fecha));  
        //echo "La FECHA ERA ASI: $fecha Y AHORA ES ASI ".$newDate. "";  
        
        return $newDate;
         
    }
    
    
    public static function formatoResumen($resumen,$textoExtra)
    {
        $resumen = "2222%pera%84,03%168,07";
        $array = explode('%',$resumen);
        
        $textoExtra = "Código: Nombre: PrecioCosto: PrecioVenta:";
        $arrayText = explode(' ', $textoExtra);
         
        for($i=0; $i<count($array); $i++)
        {
	  echo $arrayText[$i].'   ',$array[$i];
          
	  echo "<br>";
        }
        
        

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
