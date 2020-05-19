/* global alertify */

$(document).ready(function(){
    cargarVentas();
    
    $("#enlaceBuscar").click(function(){
        cargarVentas();
    });
        
});

    function enviarDte(id){
        var url = "source/util/enviarDte.php";
        var params = {id : id};
        var success = function(response)
        {
            cargarVentas();
            alertify.success("Documento enviado Track ID: "+response);
        };
        postRequest(url,params,success);
    }
    
    function cargarVentas(){
        var url = "source/util/obtenerVentas.php";
        $("#tabla_ventas tbody").html("");
        var params = {idventa : $("#id").val(),folio : $("#folio").val(),
        desde : $("#desde").val(),hasta : $("#hasta").val(),estado : $("#estado").val()};
        var success = function(response)
        {
            $("#tabla_ventas tbody").append(response);
        };
        postRequest(url,params,success);
    }
    
    function verDetalle(){
        cambiarModulo('detalle');
    }
    
    
