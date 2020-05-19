<script src="js/gestor_dte.js"></script>
<div class="buscador_ventas">
    <div class="contenedor_busc" style="height: calc(100% - 290px)">
        <div>
            ID Venta
        </div>
        <div>
            <input type="text" id="id">
        </div>
        <div>
            Folio
        </div>
        <div>
            <input type="text" id="folio">
        </div>
        <div>
            Fecha desde
        </div>
        <div>
            <input type="text" id="desde" >
        </div>
        <div>
            Fecha hasta
        </div>
        <div>
            <input type="text" id="hasta" >
        </div>
        <div>
            Estado
        </div>
        <div>
            <select id="estado"  width="50">
                <option value="0">No enviado</option>
                <option value="1">Enviado con reparos</option>
                <option value="2">Enviado con errores</option>
                <option value="3">Enviado correctamente</option>
            </select>
        </div>
        
        <a class="boton" id="enlaceBuscar">BUSCAR</a>
    </div>
</div>
<div class="contenedor-tabla">
    <table id="tabla_ventas" class="tabla-mail">
        <thead>
            <tr>
                <th><input type="checkbox"></th>
                <th>ID VENTA</th>
                <th>TOTAL</th>
                <th>FECHA</th>
                <th>TIPO</th>
                <th>FOLIO</th>
                <th>ESTADO</th>
                <th>TRACK ID</th>
                <th>ERROR</th>
                <th>ENVIAR</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>