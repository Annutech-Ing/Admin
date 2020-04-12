<script src="js/cliente.js"></script>
<div class="buscador_ventas">
    <div class="titulo-sec">
        Buscar Cliente
    </div>
    <div class="contenedor_busc" style="height: 99%;">
        <div>
            Rut
        </div>
        <div>
            <input type="text" id="rut">
        </div>
        <div>
            Nombre
        </div>
        <div>
            <input type="text" id="nombre">
        </div>
        <div>
            Giro
        </div>
        <div>
            <input type="text" id="giro">
        </div>
        <div>
            E-mail
        </div>
        <div>
            <input type="text" id="mail">
        </div>
        <a class="boton" id="enlaceBuscar">BUSCAR</a>
    </div>
</div>
<div class="contenedor-tabla minimal">
    <table id="tabla_cli" class="tabla-mail">
        <thead>
            <tr>
                <th>RUT</th>
                <th>NOMBRE</th>
                <th>GIRO</th>
                <th>E-MAIL</th>
                <th>TELÉFONO</th>
                <th>DIRECCIÓN</th>
                <th>COMUNA</th>
                <th>CIUDAD</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<div class="cont-add">
    <div class="titulo-sec">
        Editar Cliente
    </div>
    <div class="contenedor_edit">
        <div>
            Rut
        </div>
        <div>
            <input type="text" id="rutMod">
        </div>
        <div>
            Nombre
        </div>
        <div>
            <input type="text" id="nombreMod">
        </div>
        <div>
            Giro
        </div>
        <div>
            <input type="text" id="giroMod">
        </div>
        <div>
            E-mail
        </div>
        <div>
            <input type="text" id="mailMod">
        </div>
    </div>
    <div class="contenedor_edit">
        <div>
            Teléfono
        </div>
        <div>
            <input type="text" id="telefonoMod">
        </div>
        <div>
            Dirección
        </div>
        <div>
            <input type="text" id="direccionMod">
        </div>
        <div>
            Comuna
        </div>
        <div>
            <input type="text" id="comunaMod">
        </div>
        <div>
            Ciudad
        </div>
        <div>
            <input type="text" id="ciudadMod">
        </div>
    </div>
    <div class="contenedor_edit">
        <div>
            Tipo
        </div>
        <div>
            <select id="tipoMod">
                <option value="0">Nuevo</option>
                <option value="1">Normal</option>
                <option value="2">Premium</option>
            </select>
        </div>
        <div>
            Descuento (%)
        </div>
        <div>
            <input type="text" id="descMod">
        </div>
        <a class="boton" id="modificar">AGREGAR</a>
        <a class="boton" id="cancelar" style="visibility: hidden">CANCELAR</a>
    </div>
</div>
