<?php
$archivo = 'folio';
$tipo = $_REQUEST["tipo"];
$upload_max_size = ini_get('upload_max_filesize');
$fichero_subido = "C:\\xampp\\htdocs\\VentasWebService\\vendor\\sasco\\libredte\\src\\folios\\".basename($_FILES[$archivo]['name']);
echo $fichero_subido;

if (move_uploaded_file($_FILES[$archivo]['tmp_name'], $fichero_subido)) {
    echo "Successfully uploaded";
}
else
{
    echo "Not uploaded because of error #".$_FILES[$archivo]["error"];
}
print ($_FILES[$archivo]['name']);
