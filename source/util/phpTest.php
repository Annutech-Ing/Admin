<?php
include '../util/Funciones.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


Funciones::formatoFecha('2020-01-01 00:00:00'); 
    $fechaFinal = Funciones::formatoFecha('2020-01-01 00:00:00');
    echo $fechaFinal;
    \error_reporting(E_ALL);
    echo $fechaFinal;


    $resumenFinal = Funciones::formatoResumen("2222%pera%84,03%168,07","Código Nombre PrecioCosto PrecioVenta");
    echo $resumenFinal;
    \error_reporting(E_ALL);
    echo "$resumenFinal";
    