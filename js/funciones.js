
var MODIFICADO = false;
var KEY = "DGFSGHJRTJTHWGWEJNGWI9EFN";
var bordeAzul = "solid 1px #0b41d3";
var bordeRojo = "solid 1px red";
var bordeBlanco = "solid 1px white";
var urlBase= "source/httprequest";
var urlUtil= "source/util";


function darFoco(elemento)
{
    elemento.focus();
}

function cambiarPropiedad(elemento,propiedad,valor)
{
    elemento.css(propiedad,valor);
}

function isTeclaEnter(e){
    if(e.which === 13){
        return true;
    }
    return false;
}
function isTeclaTab(e){
    e.preventDefault();
    if(e.keyCode === 9){
        return true;
    }
    return false;
}

function postRequest(url,params,success)
{
    $.ajax({
        url: url,
        data: jQuery.param(params) ,
        method:'POST',
        cache: false,
        async: true,
        beforeSend: function (xhr) {
            cambiarPropiedad($("#loader"),"visibility","visible");
        },
        success: success,
        error: function (resposeError)
        {
            $("#error").text(resposeError);
            cambiarPropiedad($("#loader"),"visibility","hidden");
        }
    });
}
function getRequest(url,success,cargar = true)
{
    $.ajax({
        url: url,
        method:'GET',
        success: success,
        async: true,
        cache: false,
        beforeSend: function (xhr) {
            if(cargar)
            {
                cambiarPropiedad($("#loader"),"visibility","visible");
            }
        },
        error: function (resposeError)
        {
            cambiarPropiedad($("#loader"),"visibility","hidden");
        }
    });
}

function redireccionar(url)
{
    window.location.href = url;
}

function addTexto(div,texto)
{
    div.text(texto);
}

function validarCamposOr(array,exepciones = null)
{
    for (var i = 0 ; i < array.length; i++)
    {
        if(exepciones === null)
        {
            if(array[i] === undefined || array[i] === '')
            {
                return false;
            }
        }
        else if(exepciones.indexOf('|'+i+'|') === -1)
        {
            if(array[i] === undefined || array[i] === '')
            {
                return false;
            }
        }
    }
    return true;
}

function validarCamposAnd(array)
{
    var cont = 0;
    for (var i = 0 ; i < array.length; i++)
    {
        if(array[i] === undefined || array[i] === '')
        {
            cont++;
        }
    }
    if(cont === array.length)
    {
        return false;
    }
    return true;
}

function agregarclase(div,clase)
{
    div.addClass(clase);
}
function quitarclase(div,clase)
{
    div.removeClass(clase);
}

function cambiarModulo(pagina){
    if(MODIFICADO)
    {
        confirmar("Cambiar de modulo","¿Desea cambiar de modulo sin guardar los cambios?",
            function(){
                MODIFICADO = false;
                quitarclase($(".opcion-menu"),"menu-activo");
                agregarclase($("#"+pagina),"menu-activo");
                $("#contenido-central").html("");
                $("#contenido-central").load(pagina+".php",function( response, status, xhr ) {
                    variable = undefined;
                });
            },
            function(){
                alertify.confirm().close();
            });
    }
    else
    {
        quitarclase($(".opcion-menu"),"menu-activo");
        agregarclase($("#"+pagina),"menu-activo");
        $("#contenido-central").html("");
        $("#contenido-central").load(pagina+".php",function( response, status, xhr ) {
            variable = undefined;
        });
    }
    
    if($("#menu-telefono").css("display") === 'block')
    {
        cambiarPropiedad($("#menu"),"display","none");
        $("#menu-telefono").attr("src","img/menu.svg");
    }
}


function cerrarSession(response)
{
    if(response === 'return')
    {
        alertify.error('sesion expirada');
        location.href = "index.php";
        return;
    }
}

function vaciarFormulario()
{
    $("input").each(function() {
        $(this).val("");
        marcarCampoOk($(this));
    });
    $("select").each(function() {
        $(this).val("");
        marcarCampoOk($(this));
    });
}

function formato_fecha(texto){
  return texto.replace(/^(\d{4})\/(\d{2})\/(\d{2})$/g,'$3/$2/$1');
}
function formato_humano(texto){
  return texto.replace(/^(\d{2}\/(\d{2})\/(\d{4}))$/g,'$1/$2/$3');
}

function getfecha()
{
    var url = urlUtil + "/obtenerFecha.php";
    var success = function(response)
    {
        $("#fecha").html("");
        $("#fecha").append(response);
    };
    getRequest(url,success,false);
}

function getUsuario()
{
    var url = urlUtil + "/obtenerUsuario.php";
    var success = function(response)
    {
        NICK_GLOBAL = response;
        $("#enlace_usuario").append(response);
    };
    getRequest(url,success,false);
}

function mensajeBienvenida(mensaje)
{
    $("#contenedor_central").html("<div class=\"contenedor-loaderCentral\">\n\
                                    <div class=\"loaderCentral\" id=\"loader\"\n\
                                    style=\"visibility=\"hidden\"\">Loading...</div>\n\
                                    </div><div class=\"mensaje_bienvenida\">\n\
                                    SELECCIONE OPCIONES PARA AGREGAR EDITAR Y/O MODIFICAR "+mensaje+"</div>");
}

function resetFormulario() 
{
    MODIFICADO = false;
    
}



function resetFormularioEliminar(pagina) 
{
    MODIFICADO = false;
    $("#contenedor_central").html("");
    mensajeBienvenida(pagina);
}

function abrirFile(e,obj){
    e.preventDefault();
    obj.trigger("click");
}


function subirFichero(event,form,archivo)
{
    var tipo = obtenerTipoFolio(archivo);
    var url = 'source/util/subirFichero.php?archivo='+archivo+'&tipo='+tipo;
    $.ajax({
        async: true,
        type: 'POST',
        url: url,
        data: new FormData(form[0]),
        cache: false,
        contentType: false,
        processData: false,
        success: function()
        {
            procesarXML($('#folioOculta').val(),tipo);
        },
        error: function(response)
        {
            alert(JSON.stringify(response));
        }
    });
    event.preventDefault();
}
function obtenerTipoFolio(file){
    var tipo = "";
    var url = 'source/util/leerFichero.php?archivo='+file;
    $.ajax({
        async: false,
        type: 'POST',
        url: url,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response)
        {
            tipo = response.folio_tipo;
            alert(tipo);
        },
        error: function(response)
        {
            
        }
    });
    return tipo;
}

function enviarFormFile(file,hidden,form)
{   
    var filename = file.replace(/.*(\/|\\)/, '');
    hidden.val(filename);
    form.submit();
}

function iniciarFecha(inputs) {
    jQuery.datetimepicker.setLocale('es');
    var conf = {
        i18n:{
            de:{
                months:[
                    'Januar','Februar','März','April',
                    'Mai','Juni','Juli','August',
                    'September','Oktober','November','Dezember'
                ],
                dayOfWeek:[
                    "So.", "Mo", "Di", "Mi", 
                    "Do", "Fr", "Sa."
                ]
            }
        },
        timepicker:false,
        format:'d/m/Y'
    };
    for(var i = 0 ; i < inputs.length; i++)
    {
        jQuery(inputs[i]).datetimepicker(conf);    
    }
}

function validarRut(rut){
    var suma=0;
    var arrRut = rut.split("-");
    var rutSolo = arrRut[0];
    if(isNaN(rutSolo))
    {
        return false;
    }
    var verif = arrRut[1];
    var continuar = true;
    for(i=2;continuar;i++){
        suma += (rutSolo%10)*i;
        rutSolo = parseInt((rutSolo /10));
        i=(i==7)?1:i;
        continuar = (rutSolo == 0)?false:true;
    }
    resto = suma%11;
    dv = 11-resto;
    if(dv==10){
        if(verif.toUpperCase() == 'K')
        return true;
    }
    else if (dv == 11 && verif == 0)
        return true;
    else if (dv == verif)
        return true;
    else
    return false;
}

function validarEmail(valor) {
  if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){
   return true;
  } else {
   return false;
  }
}

function validarNumero(numero)
{
    if(isNaN(numero))
    {
        return false;
    }
    return true;
}

function validarPatente(patente)
{
    if (/^[A-Z?]{4}-\d{2}$/.test(patente))
    {
        return true;
    }
    if (/^[A-Z?]{2}-\d{3}$/.test(patente)){
        return true;
    }
    return false;
}




function resetBotones()
{
    cambiarPropiedad($("#agregar"),"visibility","visible");
    cambiarPropiedad($("#guardar"),"visibility","hidden");
    cambiarPropiedad($("#cancelar"),"visibility","hidden");
    cambiarPropiedad($("#eliminar"),"visibility","hidden");
}

function seleccionar(div)
{
    if(div.attr("class") === "tablaFila no-seleccionado")
    {
        quitarclase(div,"no-seleccionado");
        agregarclase(div,"seleccionado");
    }
    else
    {
        quitarclase(div,"seleccionado");
        agregarclase(div,"no-seleccionado");
    }
}

function marcarCampoError(campo)
{
    var dis = typeof  campo.attr("disabled") !== "undefined";
    if(dis === false)
    {
        cambiarPropiedad(campo,"backgroundColor","red");
    }
    cambiarPropiedad(campo,"color","white");
}

function marcarCampoOk(campo)
{
    var dis = typeof  campo.attr("disabled") !== "undefined";
    if(dis === false)
    {
        cambiarPropiedad(campo,"backgroundColor","white");
    }
    cambiarPropiedad(campo,"color","black");
}

function mostrarMapa()
{
    $('#map').appendTo('#contenedor_mapa');
    cambiarPropiedad($('#map'),"display","block");
}
function ocultarMapa()
{
    $('#map').appendTo('body');
    cambiarPropiedad($('#map'),"display","none");
}

function salir()
{
    var url = urlBase + "/usuario/Logout.php";
    var success = function()
    {
        window.location.href = "index.php";
    };
    getRequest(url,success);
}

function confirmar(titulo,texto,si,no)
{
    alertify.confirm(titulo,texto,si,no).set('labels', {ok:'Si', cancel:'No'}); 
}

function cambioEjecutado()
{
    $("input").change(function()
    {
        MODIFICADO = true;
    });
    $("select").change(function()
    {
        MODIFICADO = true;
    });
    $("radio").change(function()
    {
        MODIFICADO = true;
    });
}

function marcarFilaActiva(id)
{
    quitarclase($(".fila_contenedor"),"fila_contenedor_activa");
    agregarclase($("#"+id),"fila_contenedor_activa");
}

function recortar(titulo,index = 32)
{
    if(titulo.length > index )
    {
        titulo = titulo.substr(0,index) + "...";
    }
    return titulo;
}

function validarCancelar(pagina)
{
    if(MODIFICADO)
    {
        confirmar("Reinicio formulario",
        "¿Desea cancelar sin guardar los cambios?",
        function()
        {
            resetFormularioEliminar(pagina);
            resetBotones();
        },null);
    }
    else
    {
        resetFormularioEliminar(pagina);
        resetBotones();
    }
    quitarclase($(".fila_contenedor"),"fila_contenedor_activa");
}

function validarInexistencia(val,array)
{
    if(val === '')
    {
        return false;
    }
    else
    {
        for(var i = 0 ; i < array.length ; i++)
        {
            if(array[i] === val)
            {
                return false;
            }
        }
    }
    return true;
}


function opcionVolver()
{
    $("#cont_general").load("html/transportista-conductor.html");
}


function abrirMenu()
{
    if(MENU_VISIBLE)
    {
        $("#btn_menu_img").attr("src","img/menu.svg");
        cambiarPropiedad($("#menu"),"width","calc(4% - 1px)");
        cambiarPropiedad($("#contenido-central"),"width","96%");
        cambiarPropiedad($(".contenido-menu"),"width","calc(30% - 10px)");
        cambiarPropiedad($(".contenido-menu"),"display","none");
        //cambiarPropiedad($("#tabla_log"),"width","79%");
        MENU_VISIBLE = false;
    }
    else
    {
        $("#btn_menu_img").attr("src","img/cancelar.svg");
        cambiarPropiedad($("#menu"),"width","calc(15% - 1px)");
        cambiarPropiedad($("#contenido-central"),"width","calc(89% - 60px)");
        cambiarPropiedad($(".contenido-menu"),"width","calc(90% - 10px)");
        cambiarPropiedad($(".contenido-menu"),"display","block");
        MENU_VISIBLE = true;

    }
}

function abrirTooltip(tooltip)
{
    cambiarPropiedad($("#"+tooltip),"display","block");
}

function cerrarTooltip(tooltip)
{
    cambiarPropiedad($("#"+tooltip),"display","none");
}

function marcarCampoNoAplicable()
{
    return "-";
}