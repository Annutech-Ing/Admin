/* global alertify */

    var accion = 'agregar';

    $(document).ready(()=>{
        cargarCliente();

        $("#enlaceBuscar").click(()=>{
            cargarCliente();
        });

        $("#modificar").click(()=>{
            if(accion === 'agregar'){
                agregarCliente();
            }
            else{
                modificarCliente();
            }   
        });
        
        $("#cancelar").click(()=>{
            reset();
        });
        
    });

    function cargarCliente(){
        reset();
        var url = "source/httprequest/cliente/GetClientes.php";
        $("#tabla_cli tbody").html("");
        var params = {rut : $("#rut").val(), nombre : $("#nombre").val(),giro : $("#giro").val(),mail : $("#mail").val()};
        var success = function(response)
        {
            $("#tabla_cli tbody").append(response);
        };
        postRequest(url,params,success);
    }
    
    
    function abrirModificar(rut){
        $("#rutMod").val("");
        $("#nombreMod").val("");
        $("#giroMod").val("");
        $("#mailMod").val("");
        $("#telefonoMod").val("");
        $("#direccionMod").val("");
        $("#comunaMod").val("");
        $("#ciudadMod").val("");
        $("#tipoMod").val("");
        var url = "source/httprequest/cliente/GetCliente.php";
        var params = {rut : rut};
        var success = function(response)
        {
            $("#rutMod").val(rut);
            $("#nombreMod").val(response.nombre);
            $("#giroMod").val(response.giro);
            $("#mailMod").val(response.mail);
            $("#direccionMod").val(response.direccion);
            $("#telefonoMod").val(response.telefono);
            $("#comunaMod").val(response.comuna);
            $("#ciudadMod").val(response.ciudad);
            $("#descuentoMod").val(response.descuento);
            accion = 'modificar';
            $("#modificar").text("MODIFICAR");
            $("#cancelar").css("visibility","visible");
        };
        postRequest(url,params,success);
    }

    function modificarCliente(){
        let rut = $("#rutMod").val();
        let nombre = $("#nombreMod").val();
        let giro = $("#giroMod").val();
        let mail = $("#mailMod").val();
        let telefono = $("#telefonoMod").val();
        let direccion = $("#direccionMod").val();
        let comuna = $("#comunaMod").val();
        let ciudad = $("#ciudadMod").val();
        let tipo = $("#tipoMod").val();
        let descuento = $("#descMod").val();
        if(rut === '' || nombre === ''){
            alertify.error("Debe llenar todos los campos obligatorios");
            return;
        }
        if(!validarNumero(telefono)){
            alertify.error("Teléfono costo debe ser numérico");
            return;
        }
        if(!validarNumero(descuento)){
            alertify.error("Descuento debe ser numérico");
            return;
        }
        if(!validarRut(rut)){
            alertify.error("Rut invalido");
            return;
        }
        if(!validarEmail(mail)){
            alertify.error("E-mail invalido");
            return;
        }
        let url = "source/httprequest/cliente/ModCliente.php";
        let success = ()=>{
            reset();
            cargarCliente();
            alertify.success("Cliente modificado");
        };
        var params = {rut : rut, nombre : nombre,giro : giro, 
            mail : mail, telefono : telefono, direccion : direccion,
            ciudad : ciudad, comuna : comuna, tipo : tipo, descuento : descuento};
        postRequest(url,params,success);
    }
    
    function agregarCliente(){
        let rut = $("#rutMod").val();
        let nombre = $("#nombreMod").val();
        let giro = $("#giroMod").val();
        let mail = $("#mailMod").val();
        let telefono = $("#telefonoMod").val();
        let direccion = $("#direccionMod").val();
        let ciudad = $("#ciudadMod").val();
        let comuna = $("#comunaMod").val();
        let tipo = $("#tipoMod").val();
        let descuento = $("#descMod").val();
        if(rut === '' || nombre === ''){
            alertify.error("Debe llenar todos los campos obligatorios");
            return;
        }
        if(!validarNumero(telefono)){
            alertify.error("Teléfono costo debe ser numérico");
            return;
        }
        if(!validarNumero(descuento)){
            alertify.error("Descuento debe ser numérico");
            return;
        }
        if(!validarRut(rut)){
            alertify.error("Rut invalido");
            return;
        }
        if(!validarEmail(mail)){
            alertify.error("E-mail invalido");
            return;
        }
        let url = "source/httprequest/cliente/AddCliente.php";
        let success = ()=>{
            reset();
            cargarCliente();
            alertify.success("Cliente agregado");
        };
        var params = {rut : rut, nombre : nombre,giro : giro, 
            mail : mail, telefono : telefono, direccion : direccion,
            ciudad : ciudad, comuna : comuna, tipo : tipo, descuento : descuento};
        postRequest(url,params,success);
    }
    
    function eliminarCliente(rut){
        let url = "source/httprequest/cliente/DelCliente.php";
        let success = ()=>{
            cargarCliente();
            alertify.success("Cliente eliminado");
        };
        var params = {rut : rut};
        postRequest(url,params,success);
    }
    
    function reset(){
        accion === 'agregar';
        $("#rutMod").val("");
        $("#nombreMod").val("");
        $("#giroMod").val("");
        $("#mailMod").val("");
        $("#telefonoMod").val("");
        $("#direccionMod").val("");
        $("#ciudadMod").val("");
        $("#tipoMod").val("");
        $("#modificar").text("AGREGAR");
        $("#cancelar").css("visibility","hidden");
    }
    