$(document).ready(function(){
    iniciarFecha([$("#desde"),$("#hasta")]);
    cargarLogs();
    
    $("#enlaceBuscar").click(function(){
        cargarLogs();
    });
<<<<<<< HEAD
       
    $("#enlaceLimpiar").click(function(){
       $("#resumen").val("");
       $("#usuario").val("");
       $("#ip").val("");  
       $("#desde").val("");  
       $("#hasta").val("");
       $("#tipo").prop('selectedIndex',0);  
       cargarLogs();
    });
    
=======
        
>>>>>>> 7f9da37ab96a45474e9d754b514d134cc39490ff
});

    function cargarLogs(){
        var resumen = $("#resumen").val();
        var usuario = $("#usuario").val();
        var ip = $("#ip").val();
        var desde = $("#desde").val();
        var hasta = $("#hasta").val();
        var tipo = $("#tipo").val();
        var params = {resumen: resumen, usuario: usuario, ip: ip, desde: desde, hasta: hasta, tipo: tipo};
        var url = "source/util/obtenerLogs.php";
        $("#tabla_log tbody").html("");
        var success = function(response)
        {
            $("#tabla_log tbody").append(response);
        };
        postRequest(url,params,success);
    }
