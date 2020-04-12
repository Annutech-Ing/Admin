/* global alertify */

    var accion = 'agregar';

    $(document).ready(()=>{
        cargarUsuario();

        $("#enlaceBuscar").click(()=>{
            cargarUsuario();
        });

        $("#modificar").click(()=>{
            if(accion === 'agregar'){
                agregarUsuario();
            }
            else{
                modificarUsuario();
            }   
        });
        
        $("#cancelar").click(()=>{
            reset();
        });
        
    });

    function cargarUsuario(){
        reset();
        var url = "source/httprequest/usuario/GetUsuarios.php";
        $("#tabla_usr tbody").html("");
        var params = {nombre : $("#nombre").val()};
        var success = function(response)
        {
            $("#tabla_usr tbody").append(response);
        };
        postRequest(url,params,success);
    }
    
    
    function abrirModificar(id){
        $("#nombreMod").val("");
        $("#claveMod").val("");
        $("#clave2Mod").val("");
        $("#tipoMod").val("");
        $("#saldoMod").val("");
        var url = "source/httprequest/usuario/GetUsuario.php";
        var params = {id : id};
        var success = function(response)
        {
            $("#idMod").val(id);
            $("#nombreMod").val(response.nombre);
            $("#tipoMod").val(response.tipo);
            $("#saldoMod").val(response.saldo);
            accion = 'modificar';
            $("#modificar").text("MODIFICAR");
            $("#cancelar").css("visibility","visible");
        };
        postRequest(url,params,success);
    }

    function modificarUsuario(){
        let id = $("#idMod").val();
        let nombre = $("#nombreMod").val();
        let clave = $("#claveMod").val();
        let clave2 = $("#clave2Mod").val();
        let tipo = $("#tipoMod").val();
        let saldo = $("#saldoMod").val();
        
        if(nombre === '' || tipo === ''){
            alertify.error("Debe llenar todos los campos obligatorios");
            return;
        }
        if(clave !== clave2){
            alertify.error("Claves no coinciden");
            return ;
        }
        if(!validarNumero(saldo)){
            alertify.error("Saldo debe ser numérico");
            return;
        }
        let url = "source/httprequest/usuario/ModUsuario.php";
        let success = ()=>{
            reset();
            cargarUsuario();
            alertify.success("Usuario modificado");
        };
        var params = {id : id, nombre : nombre, clave : clave, 
            tipo : tipo, saldo : saldo};
        postRequest(url,params,success);
    }
    
    function agregarUsuario(){
        let nombre = $("#nombreMod").val();
        let clave = $("#claveMod").val();
        let clave2 = $("#clave2Mod").val();
        let tipo = $("#tipoMod").val();
        let saldo = $("#saldoMod").val();
        
        if(nombre === '' || clave === '' || clave2 === '' || tipo === ''){
            alertify.error("Debe llenar todos los campos obligatorios");
            return;
        }
        if(clave !== clave2){
            alertify.error("Claves no coinciden");
            return ;
        }
        if(!validarNumero(saldo)){
            alertify.error("Saldo debe ser numérico");
            return;
        }
        let url = "source/httprequest/usuario/AddUsuario.php";
        let success = ()=>{
            reset();
            cargarUsuario();
            alertify.success("Usuario agregado");
        };
        var params = {nombre : nombre, clave : clave, 
            tipo : tipo, saldo : saldo};

        postRequest(url,params,success);
    }
    
    function eliminarUsuario(id){
        let url = "source/httprequest/usuario/DelUsuario.php";
        let success = ()=>{
            cargarUsuario();
            alertify.success("Usuario eliminado");
        };
        var params = {id : id};
        postRequest(url,params,success);
    }
    
    function reset(){
        accion === 'agregar';
        $("#nombreMod").val("");
        $("#claveMod").val("");
        $("#clave2Mod").val("");
        $("#tipoMod").val("");
        $("#saldoMod").val("");
        $("#modificar").text("AGREGAR");
        $("#cancelar").css("visibility","hidden");
        accion = 'agregar';
    }
    