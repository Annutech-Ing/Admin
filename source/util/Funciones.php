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
        
        
        //$fecha = "2019/13/06 5:35 PM";  
        //converts date and time to seconds  
        //$sec = strtotime($fecha);  
        //converts seconds into a specific format  
        //$nuevaFecha = date ("Y/d/m H:i", $sec);  
        //Appends seconds with the time  
        //$nuevaFecha = $nuevaFecha . ":00";  
        // display converted date and time  
        //echo "New date time format is: ".$nuevaFecha;    
    }
    
    
}
