/* global alertify */

    var accion = 'agregar';

    $(document).ready(()=>{
        cargarDepartamento();

        $("#enlaceBuscar").click(()=>{
            cargarDepartamento();
        });

        $("#modificar").click(()=>{
            if(accion === 'agregar'){
                agregarDepartamento();
            }
            else{
                modificarDepartamento();
            }   
        });
        
        $("#cancelar").click(()=>{
            reset();
        });
        
    });

    function cargarDepartamento(){
        reset();
        var url = "source/httprequest/departamento/GetDepartamentos.php";
        $("#tabla_dep tbody").html("");
        var params = {nombre : $("#nombre").val(),descripcion : $("#descripcion").val()};
        var success = function(response)
        {
            $("#tabla_dep tbody").append(response);
        };
        postRequest(url,params,success);
    }
    
    
    function abrirModificar(id){
        $("#idMod").val("");
        $("#nombreMod").val("");
        $("#descripcionMod").val("");
        $("#catalogoMod").prop("checked",false);
        var url = "source/httprequest/departamento/GetDepartamento.php";
        var params = {id : id};
        var success = function(response)
        {
            $("#idMod").val(id);
            $("#nombreMod").val(response.nombre);
            $("#descripcionMod").val(response.descripcion);
            $("#catalogoMod").prop("checked",response.catalogo==="1"?true:false);
            accion = 'modificar';
            $("#modificar").text("MODIFICAR");
            $("#cancelar").css("visibility","visible");
        };
        postRequest(url,params,success);
    }

    function modificarDepartamento(){
        let id = $("#idMod").val();
        let nombre = $("#nombreMod").val();
        let descripcion = $("#descripcionMod").val();
        let catalogo = $("#catalogoMod").prop("checked");
        if(nombre === ''){
            alertify.error("Debe llenar todos los campos obligatorios");
            return;
        }
        let url = "source/httprequest/departamento/ModDepartamento.php";
        let success = ()=>{
            reset();
            cargarDepartamento();
            alertify.success("Departamento modificado");
        };
        var params = {id : id, nombre : nombre,descripcion : descripcion, catalogo : catalogo};
        postRequest(url,params,success);
    }
    
    function agregarDepartamento(){
        let nombre = $("#nombreMod").val();
        let descripcion = $("#descripcionMod").val();
        let catalogo = $("#catalogoMod").prop("checked");
        if(nombre === ''){
            alertify.error("Debe llenar todos los campos obligatorios");
            return;
        }
        let url = "source/httprequest/departamento/AddDepartamento.php";
        let success = ()=>{
            $("#nombreMod").val("");
            $("#descripcionMod").val("");
            $("#catalogoMod").prop("checked",false);
            cargarDepartamento();
            alertify.success("Departamento agregado");
        };
        var params = {nombre : nombre,descripcion : descripcion, catalogo : catalogo};
        postRequest(url,params,success);
    }
    
    function eliminarDepartamento(id){
        let url = "source/httprequest/departamento/DelDepartamento.php";
        let success = ()=>{
            cargarDepartamento();
            alertify.success("Departamento eliminado");
        };
        var params = {id : id};
        postRequest(url,params,success);
    }
    
    function reset(){
        accion === 'agregar';
        $("#idMod").val("");
        $("#nombreMod").val("");
        $("#descripcionMod").val("");
        $("#catalogoMod").prop("checked",false);
        $("#modificar").text("AGREGAR");
        $("#cancelar").css("visibility","hidden");
    }