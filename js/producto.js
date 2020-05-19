/* global alertify */

    var accion = 'agregar';

    $(document).ready(()=>{
        cargarProducto();

        $("#enlaceBuscar").click(()=>{
            cargarProducto();
        });

        $("#modificar").click(()=>{
            if(accion === 'agregar'){
                agregarProducto();
            }
            else{
                modificarProducto();
            }   
        });
        
        $("#cancelar").click(()=>{
            reset();
        });
        
    });

    function cargarProducto(){
        reset();
        var url = "source/httprequest/producto/GetProductos.php";
        $("#tabla_prod tbody").html("");
        var params = {codigo : $("#codigo").val(), nombre : $("#nombre").val(),precio : $("#precio").val()};
        var success = function(response)
        {
            $("#tabla_prod tbody").append(response);
        };
        postRequest(url,params,success);
    }
    
    
    function abrirModificar(codigo){
        $("#codigoMod").val("");
        $("#nombreMod").val("");
        $("#descripcionMod").val("");
        $("#precioCostoMod").val("");
        $("#precioVentaMod").val("");
        $("#departamentoMod").val("");
        $("#stockMod").val("");
        $("#catalogoMod").prop("checked",false);
        $("#ivaMod").prop("checked",false);
        $("#descClienteNuevoMod").val("");
        $("#descClienteNormalMod").val("");
        $("#descClientePremiumMod").val("");
        var url = "source/httprequest/producto/GetProducto.php";
        var params = {codigo : codigo};
        var success = function(response)
        {
            $("#codigoMod").val(codigo);
            $("#nombreMod").val(response.nombre);
            $("#descripcionMod").val(response.descripcion);
            $("#precioCostoMod").val(response.precio_costo);
            $("#precioVentaMod").val(response.precio_venta);
            $("#departamentoMod").val(response.depto);
            $("#stockMod").val(response.stock);
            $("#catalogoMod").prop("checked",response.catalogo==="1"?true:false);
            $("#ivaMod").prop("checked",response.iva==="1"?true:false);
            $("#descClienteNuevoMod").val(response.descuento1);
            $("#descClienteNormalMod").val(response.descuento2);
            $("#descClientePremiumMod").val(response.descuento3);
            accion = 'modificar';
            $("#modificar").text("MODIFICAR");
            $("#cancelar").css("visibility","visible");
        };
        postRequest(url,params,success);
    }

    function modificarProducto(){
        let codigo = $("#codigoMod").val();
        let nombre = $("#nombreMod").val();
        let descripcion = $("#descripcionMod").val();
        let precioCosto = $("#precioCostoMod").val();
        let precioVenta = $("#precioVentaMod").val();
        let depto = $("#departamentoMod").val();
        let stock = $("#stockMod").val();
        let catalogo = $("#catalogoMod").prop("checked");
        let iva = $("#catalogoMod").prop("checked");
        let desc1 = $("#descClienteNuevoMod").val();
        let desc2 = $("#descClienteNormalMod").val();
        let desc3 = $("#descClientePremiumMod").val();
        
        if(nombre === '' || precioCosto === '' || precioVenta === ''){
            alertify.error("Debe llenar todos los campos obligatorios");
            return;
        }
        if(!validarNumero(precioCosto)){
            alertify.error("Precio costo debe ser numérico");
            return;
        }
        if(!validarNumero(precioVenta)){
            alertify.error("Precio venta debe ser numérico");
            return;
        } if(!validarNumero(stock)){
            alertify.error("Stock debe ser numérico");
            return;
        }
        if(!validarNumero(desc1)){
            alertify.error("Descuento cliente nuevo debe ser numérico");
            return;
        }
        if(!validarNumero(desc2)){
            alertify.error("Descuento cliente normal debe ser numérico");
            return;
        }
        if(!validarNumero(desc3)){
            alertify.error("Descuento cliente premium debe ser numérico");
            return;
        }
        let url = "source/httprequest/producto/ModProducto.php";
        let success = ()=>{
            reset();
            cargarProducto();
            alertify.success("Producto modificado");
        };
        var params = {codigo : codigo, nombre : nombre,descripcion : descripcion, 
            precioCosto : precioCosto, precioVenta : precioVenta, depto : depto,
            stock : stock, catalogo : catalogo, iva : iva, desc1: desc1, desc2 : desc2, desc3 : desc3};
        postRequest(url,params,success);
    }
    
    function agregarProducto(){
        let codigo = $("#codigoMod").val();
        let nombre = $("#nombreMod").val();
        let descripcion = $("#descripcionMod").val();
        let precioCosto = $("#precioCostoMod").val();
        let precioVenta = $("#precioVentaMod").val();
        let depto = $("#departamentoMod").val();
        let stock = $("#stockMod").val();
        let catalogo = $("#catalogoMod").prop("checked");
        let iva = $("#catalogoMod").prop("checked");
        let desc1 = $("#descClienteNuevoMod").val();
        let desc2 = $("#descClienteNormalMod").val();
        let desc3 = $("#descClientePremiumMod").val();
        
        if(nombre === '' || precioCosto === '' || precioVenta === ''){
            alertify.error("Debe llenar todos los campos obligatorios");
            return;
        }
        if(!validarNumero(precioCosto)){
            alertify.error("Precio costo debe ser numérico");
            return;
        }
        if(!validarNumero(precioVenta)){
            alertify.error("Precio venta debe ser numérico");
            return;
        } if(!validarNumero(stock)){
            alertify.error("Stock debe ser numérico");
            return;
        }
        if(!validarNumero(desc1)){
            alertify.error("Descuento cliente nuevo debe ser numérico");
            return;
        }
        if(!validarNumero(desc2)){
            alertify.error("Descuento cliente normal debe ser numérico");
            return;
        }
        if(!validarNumero(desc3)){
            alertify.error("Descuento cliente premium debe ser numérico");
            return;
        }
        let url = "source/httprequest/producto/AddProducto.php";
        let success = ()=>{
            reset();
            cargarProducto();
            alertify.success("Producto agregado");
        };
        var params = {codigo : codigo, nombre : nombre,descripcion : descripcion, 
            precioCosto : precioCosto, precioVenta : precioVenta, depto : depto,
            stock : stock, catalogo : catalogo, iva : iva, desc1: desc1, desc2 : desc2, desc3 : desc3};
        postRequest(url,params,success);
    }
    
    function eliminarProducto(codigo){
        let url = "source/httprequest/producto/DelProducto.php";
        let success = ()=>{
            cargarProducto();
            alertify.success("Producto eliminado");
        };
        var params = {codigo : codigo};
        postRequest(url,params,success);
    }
    
    function reset(){
        accion === 'agregar';
        $("#codigoMod").val("");
        $("#nombreMod").val("");
        $("#descripcionMod").val("");
        $("#precioCostoMod").val("");
        $("#precioVentaMod").val("");
        $("#departamentoMod").val("");
        $("#stockMod").val("");
        $("#catalogoMod").prop("checked",false);
        $("#ivaMod").prop("checked",false);
        $("#descClienteNuevoMod").val("");
        $("#descClienteNormalMod").val("");
        $("#descClientePremiumMod").val("");
        $("#modificar").text("AGREGAR");
        $("#cancelar").css("visibility","hidden");
    }
    