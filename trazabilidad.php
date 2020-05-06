<script src="js/trazabilidad.js"></script>
<div class="buscador_ventas">
    <div class="contenedor_busc" style="height: calc(100% - 11px)">
        <div>
            Resumen
        </div>
        <div>
            <input type="text" name="resumen" id="resumen" >
        </div>
        <div>
            Usuario
        </div>
        <div>
            <input type="text" name="usuario" id="usuario" >
        </div>
        <div>
            IP
        </div>
        <div>
            <input type="text" name="ip" id="ip" >
        </div>
        <div>
            Fecha desde
        </div>
        <div>
            <input type="text" name="desde" id="desde" >
        </div>
        <div>
            Fecha hasta
        </div>
        <div>
            <input type="text" name="hasta" id="hasta" >
        </div>
        <div>
            Tipo
        </div>
        <div>
            <select id="tipo"  name="tipo" width="50">
                <option value="">Todos</option>
                <option value="0">LOGIN</option>
                <option value="1">LOGOUT</option>
                <option value="2">LOGIN ERRONEO</option>
                <option value="3">ASIGNACIÓN DE FONDOS</option>
                <option value="4">DESASIGNACIÓN DE FONDOS</option>
                <option value="5">VENTAS GENERADAS</option>
                <option value="6">DETALLE DE VENTAS GENERADAS</option>
                <option value="7">ADICIÓN DE CLIENTES</option>
                <option value="8">ELIMINACIÓN DE CLIENTES</option>
        <!--        <option value="9">ADICIÓN DE CRÉDITOS</option>
                <option value="10">ELIMINACIÓN DE CRÉDITOS</option>-->
                <option value="11">MODIFICACIÓN DE CLIENTE</option>
                <!--<option value="12">MODIFICACIÓN CUENTA DE CLIENTE</option>-->
                <option value="13">ADICIÓN DE PRODUCTO</option>
                <option value="14">MODIFICACIÓN DE PRODCUTO</option>
                <option value="15">ELIMINACIÓN DE PRODUCTO</option>
                <option value="16">ADICIÓN DE USUARIO</option>
                <option value="17">MODIFICACIÓN DE USUARIO</option>
                <option value="18">ELIMINACIÓN DE USUARIO</option>
                <option value="19">ENVIO DE BOLETAS POR CORREO</option>
                <option value="20">IMPRESIÓN DE BOLETAS</option>
                <option value="21">ENVIO DE FACTURAS POR CORREO</option>
                <option value="22">IMPRESIÓN DE FACTURAS</option>    
                <option value="23">ADICIÓN DE DEPARTAMENTO</option>
                <option value="24">MODIFICACIÓN DE DEPARTAMENTO</option>
                <option value="25">ELIMINACIÓN DE DEPARTAMENTO</option>
                <option value="26">AUTORIZACION DE PERMISOS</option>
                <option value="27">AUTORIZACION DE PERMISOS ERRONEO</option>
                <option value="28">INGRESO INVENTARIO</option>
                <option value="29">GENERACIÓN INFORME X</option>
                <option value="30">GENERACIÓN INFORME Z</option>
            </select>
        </div>      
        <a class="boton" id="enlaceBuscar">BUSCAR</a>
    </div>
</div>
<div class="contenedor-tabla">
    <table id="tabla_log" class="tabla-mail">
        <thead>
            <tr>
                <th>ID</th>
                <th>RESUMEN</th>
                <th>FECHA</th>
                <th>USUARIO</th>
                <th>IP</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
