/* global alertify */

$(document).ready(()=>{
    cargarInventario();
    
    $("#enlaceBuscar").click(()=>{
        cargarInventario();
    });
    
    $("#modEntrada").click(()=>{
       $("#entrada").prop("readonly",false) ;
       $("#salida").prop("readonly",true) ;
       $("#salida").val("");
       $("#entrada").focus();
    });
    
    $("#modSalida").click(()=>{
        $("#entrada").prop("readonly",true) ;
        $("#salida").prop("readonly",false) ;
        $("#entrada").val("");
        $("#salida").focus();
    });
    
    $("#modificar").click(()=>{
        modificarInventario();
    });
        
});

    function cargarInventario(){
        var url = "source/httprequest/inventario/GetInventario.php";
        $("#tabla_inv tbody").html("");
        var params = {id : $("#id").val(),nombre : $("#nombre").val(),
        depto : $("#depto").val()};
        var success = function(response)
        {
            $("#tabla_inv tbody").append(response);
        };
        postRequest(url,params,success);
    }
    
    
    function abrirModificar(codigo,stock){
        if($(".contenedor_mod").css("visibility") === "hidden"){
            $(".contenedor_mod").css("visibility","visible");
        }
        $("#idMod").val(codigo);
        $("#stockMod").val(stock);
    }

    function modificarInventario(){
        let codigo = $("#idMod").val();
        let stock = $("#stockMod").val();
        let entrada = $("#entrada").val();
        let salida = $("#salida").val();
        if(!validarNumero(entrada) && salida === ""){
            alertify.error("Entrada debe ser numerico");
            return;
        }
        else if(!validarNumero(salida) && entrada === ""){
            alertify.error("Salida debe ser numerico");
            return;
        }
        else if(entrada === "" && salida === ""){
            alertify.error("Debe ingresar todos los campos necesarios");
            return;
        }
        else if (entrada < 0){
            alertify.error("Entrada debe ser mayor a 0");
            return;
        }
        else if (salida < 0){
            alertify.error("Salida debe ser mayor a 0");
            return;
        }
        else if (parseInt(stock) < parseInt(salida)){
            alertify.error("Salida debe ser menor a stock");
            return;
        }
        let url = "source/httprequest/inventario/ModInventario.php";
        let success = ()=>{
            $(".contenedor_mod").css("visibility","hidden");
            $("#entrada").val("");
            $("#salida").val("");
            $("#codigo").val("");
            cargarInventario();
            alertify.success("Inventario modificado");
        };
        let params = {codigo: codigo, entrada: entrada, salida: salida};
        postRequest(url,params,success);
    }