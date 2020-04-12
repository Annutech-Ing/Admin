<script src="js/usuario.js"></script>
<div class="buscador_ventas">
    <div class="titulo-sec">
        Buscar Usuario
    </div>
    <div class="contenedor_busc" style="height: 99%;">
        <div>
            Nombre
        </div>
        <div>
            <input type="text" id="nombre">
        </div>
        <a class="boton" id="enlaceBuscar">BUSCAR</a>
    </div>
</div>
<div class="contenedor-tabla minimal">
    <table id="tabla_usr" class="tabla-mail">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>TIPO</th>
                <th>SALDO</th>
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
        Editar Usuario
    </div>
    <div class="contenedor_edit">
        <div>
            Nombre
        </div>
        <div>
            <input type="hidden" id="idMod">
            <input type="text" id="nombreMod">
        </div>
        <div>
            Clave
        </div>
        <div>
            <input type="password" id="claveMod">
        </div>
        <div>
            Repite Clave
        </div>
        <div>
            <input type="password" id="clave2Mod">
        </div>
    </div>
    <div class="contenedor_edit">
        <div>
            Tipo
        </div>
        <div>
            <select id="tipoMod">
                <option value="">Seleccione</option>
                <option value="1">Admin</option>
                <option value="2">Cajero</option>
                <option value="3">Vendedor</option>
            </select>
        </div>
        <div>
            Saldo
        </div>
        <div>
            <input type="number" id="saldoMod">
        </div>
        <a class="boton" id="modificar">AGREGAR</a>
        <a class="boton" id="cancelar" style="visibility: hidden">CANCELAR</a>
    </div>
</div>
