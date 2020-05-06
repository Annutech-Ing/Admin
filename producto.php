<script src="js/producto.js"></script>
<div class="buscador_ventas">
    <div class="titulo-sec">
        Buscar Producto
    </div>
    <div class="contenedor_busc" style="height: 99%;">
        <div>
            Código
        </div>
        <div>
            <input type="text" id="codigo">
        </div>
        <div>
            Nombre
        </div>
        <div>
            <input type="text" id="nombre">
        </div>
        <div>
            Precio
        </div>
        <div>
            <input type="text" id="precio">
        </div>
        <a class="boton" id="enlaceBuscar">BUSCAR</a>
    </div>
</div>
<div class="contenedor-tabla minimal">
    <table id="tabla_prod" class="tabla-mail">
        <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>NOMBRE</th>
                <th>DESCRIPCIÓN</th>
                <th>PRECIO COSTO</th>
                <th>PRECIO VENTA</th>
                <th>DEPARTAMENTO</th>
                <th>VER EN CATÁLOGO</th>
                <th>AFECTO A IVA</th>
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
        Editar Producto
    </div>
    <div class="contenedor_edit">
        <div>
            Código
        </div>
        <div>
            <input type="text" id="codigoMod">
        </div>
        <div>
            Nombre
        </div>
        <div>
            <input type="text" id="nombreMod">
        </div>
        <div>
            Descripción
        </div>
        <div>
            <input type="text" id="descripcionMod">
        </div>
        <div>
            Precio costo
        </div>
        <div>
            <input type="text" id="precioCostoMod">
        </div>
    </div>
    <div class="contenedor_edit">
        <div>
            Precio venta
        </div>
        <div>
            <input type="text" id="precioVentaMod">
        </div>
        <div>
            Departamento
        </div>
        <div>
            <select id="departamentoMod">
                <option value="0" selected>Seleccione</option>
            </select>
        </div>
        <div>
            Stock
        </div>
        <div>
            <input type="number" id="stockMod">
        </div>
        <div>
            Afecto a IVA
        </div>
        <div>
            <input type="checkbox" id="ivaMod">
        </div>
    </div>
    <div class="contenedor_edit">
        <div>
            Mostrar en catálogo
        </div>
        <div>
            <input type="checkbox" id="catalogoMod">
        </div>
        <div>
            Descuento clientes nuevos
        </div>
        <div>
            <input type="text" id="descClienteNuevoMod">
        </div>
        <div>
            Descuento clientes normales
        </div>
        <div>
            <input type="text" id="descClienteNormalMod">
        </div>
        <div>
            Descuento clientes premium
        </div>
        <div>
            <input type="text" id="descClientePremiumMod">
        </div>
    </div>
    <div class="contenedor_edit">
        <a class="boton" id="modificar">AGREGAR</a>
        <a class="boton" id="cancelar" style="visibility: hidden">CANCELAR</a>
    </div>
</div>
