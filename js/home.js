$(document).ready(function(){
    cargarDashBoard();
   
});

function cargarDashBoard(){
    var url = "source/httprequest/dashboard/GetDashboard.php";
    $("#tabla_inv tbody").html("");
    var params = {};
    var success = function(response)
    {
        $("#folio39 span").html(response.folios_39);
        $("#folio33 span").html(response.folios_33);
        $("#folio56 span").html(response.folios_56);
        $("#folio61 span").html(response.folios_61);
        $("#diario span").html("$ "+(response.venta_diaria===""?"0":response.venta_diaria));
        $("#mensual span").html("$ "+(response.venta_mensual===""?"0":response.venta_mensual));
        $("#disco span").html(response.disco_duro_libre+" GB / "+response.disco_duro_total+" GB");
    };
    postRequest(url,params,success);
}
