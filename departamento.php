<script src="js/departamento.js"></script>
<div class="buscador_ventas">
    <div class="titulo-sec">
        Buscar Departamento
    </div>
    <div class="contenedor_busc" style="height: 99%;">
        <div>
            Nombre
        </div>
        <div>
            <input type="text" id="nombre">
        </div>
        <div>
            Descripción
        </div>
        <div>
            <input type="text" id="descripcion">
        </div>

        <a class="boton" id="enlaceBuscar">BUSCAR</a>
    </div>
</div>
<div class="contenedor-tabla minimal">
    <table id="tabla_dep" class="tabla-mail">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>VER EN CATÁLOGO</th>
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
        Editar Departamento
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
            Descripción
        </div>
        <div>
            <input type="text" id="descripcionMod">
        </div>
        <div>
            Mostrar en catálogo
        </div>
        <div>
            <input type="checkbox" id="catalogoMod">
        </div>

        <a class="boton" id="modificar">AGREGAR</a>
        <a class="boton" id="cancelar" style="visibility: hidden">CANCELAR</a>
    </div>
</div>
