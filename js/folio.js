
/* global alertify */

$(document).ready(function(){
    cargarFolios();
    
    $("#enlaceBuscar").click(function(){
        cargarFolios();
    });
        
});

function cargarFolios(){
        var url = "source/httprequest/folio/GetFolios.php";
        $("#tabla_folios tbody").html("");
        var params = {};
        var success = function(response)
        {
            $("#tabla_folios tbody").append(response);
        };
        postRequest(url,params,success);
    }
function procesarXML(file,tipo){
    var carpeta = '';
    if(tipo === '33'){
        carpeta = 'factura';
    }
    else if(tipo === '39'){
        carpeta = 'boleta';
    }
    else if(tipo === '56'){
        carpeta = 'nota_credito';
    }
    else if(tipo === '61'){
        carpeta = 'nota_debito';
    }
    var url = 'source/util/leerFichero.php?archivo='+file+"&carpeta="+carpeta;
    $.ajax({
        async: true,
        type: 'GET',
        url: url,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response)
        {
            $("#re").val(response.folio_rut);
            $("#rs").val(response.folio_rs);
            $("#tipo").val(response.folio_tipo);
            $("#fd").val(response.folio_desde);
            $("#fh").val(response.folio_hasta);
            $("#total").val(parseInt(response.folio_hasta) - parseInt(response.folio_desde) + 1);
            $("#ff").val(response.folio_fecha);
            quitarclase($("#confirmar"),"dispose");
        },
        error: function(response)
        {
            
        }
    });
}

function insertarFolios(){
    var inicio = parseInt($("#fd").val());
    var fin = parseInt($("#fh").val());
    var tipo = $("#tipo").val();
    var archivo = $("#folioOculta").val();
    var fecha = $("#ff").val();
    var url = 'source/httprequest/folio/AddFolio.php?inicio='+inicio+'&fin='+fin+'&tipo='+tipo+'&archivo='+archivo+"&fecha="+fecha;
    $.ajax({
        async: true,
        type: 'POST',
        url: url,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response)
        {
            alertify.success("Folios cargados correctamente");
            $(".cont-form input").val("");
        },
        error: function(response)
        {
            alertify.error()("Error al cargar folios " +response);
        }
    });
}