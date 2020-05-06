<script src="js/folio.js"></script>
<div class="buscador_ventas">
    <div class="contenedor_busc" style="height: calc(100% - 185px)">
        <div class="boton" id="adjuntarContrato" onclick="abrirFile(event,$('#folio:hidden'))">Subir Archivo</div>
        <input type="hidden" id="folioOculta">
        <form id="form" enctype="multipart/form-data" method="POST" onsubmit="subirFichero(event,$('#form'),$('#folioOculta').val())">
            <input name="folio" type="file" class="file" id="folio" accept="text/xml"
                   onchange="enviarFormFile($('#folio').val(),$('#folioOculta'),$('#form'))">         
        </form>
        <div>
            Rut Empresa:
        </div>
        <div>
             <input type="text" id="re" readonly>
        </div>
        <div>
            Razón social: 
        </div>
        <div>
             <input type="text" id="rs" readonly>
        </div>
        <div>
            Tipo folio:
        </div>
        <div>
            <input type="text" id="tipo" readonly>        
        </div>
        <div>
            Folio desde 
        </div>
        <div>
            <input type="text" id="fd" readonly>
        </div>
        <div>
            Folio hasta:
        </div>
        <div>
            <input type="text" id="fh" readonly>
        </div>
        <div>
            Folio total: 
        </div>
        <div>
            <input type="text" id="total" readonly>
        </div>
        <div>
            Folio fecha:
        </div>
        <div>
            <input type="text" id="ff" readonly>
        </div>
        <div id="confirmar" class="boton dispose" onclick="insertarFolios()">Confirmar Folios</div>
    </div>
</div>
<div class="contenedor-tabla">
    <table id="tabla_folios" class="tabla-mail">
        <thead>
            <tr>
                <th>ID FOLIO</th>
                <th>FECHA CREACION</th>
                <th>TIPO</th>
                <th>ESTADO</th>
                <th>CAF</th>
                <!--<th>ASIGNADO A</th>-->
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>