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
                       
        $fecha = "";  
        $newDate = date("d-m-Y H:i", strtotime($fecha));  
        //echo "La FECHA ERA ASI: $fecha Y AHORA ES ASI ".$newDate. "";  
        
        return $newDate;
         
    }
    
    
    public static function formatoResumen($resumen,$textoExtra)
    {
        
        $arrayResumen = explode('%',$resumen);
        $contenidoImp="";
        
        for($i=0; $i<count($arrayResumen); $i++)
        {
            $contenidoImp .= $textoExtra[$i].' '.$arrayResumen[$i];
          
            echo "<br>";
        }
        
        return $contenidoImp;

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
