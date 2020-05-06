<?php

// respuesta en texto plano
header('Content-type: text/plain; charset=ISO-8859-1');

// incluir archivos php de la biblioteca y configuraciones
include 'inc.php';

// primer folio a usar para envio de set de pruebas
$folios = [
    39 => 186, // boleta electrónica
];

// caratula para el envío de los dte
$caratula = [
    'RutEnvia' => '18079717-3',
    'RutReceptor' => '60803000-K',
    'FchResol' => '2018-12-26',
    'NroResol' => 0,
];
// datos del emisor
$Emisor = [
    'RUTEmisor' => '76958825-6',
    'RznSoc' => 'Annunaki Ingenieria SpA',
    'GiroEmis' => 'VENTA AL POR MENOR DE COMPUTADORES',
    'Acteco' => 474100,
    'DirOrigen' => 'Monjitas 550, Piso 19',
    'CmnaOrigen' => 'Santiago',
];

// datos el recepor
$Receptor = [
	'RUTRecep' => '60803000-K',
	'RznSocRecep' => 'EMPRESA  LTDA',
	'GiroRecep' => 'COMPUTACION',
	'DirRecep' => 'SAN DIEGO 2222',
	'CmnaRecep' => 'LA FLORIDA',
];

// datos de las boletas (cada elemento del arreglo $set_pruebas es una boleta)
$set_pruebas = [
    // CASO 1
    [
        'Encabezado' => [
            'IdDoc' => [
                'TipoDTE' => 39,
                'Folio' => $folios[39],
            ],
            'Emisor' => $Emisor,
            'Receptor' => $Receptor,
        ],
        'Detalle' => [
            [
                'NmbItem' => 'Cambio de aceite',
                'QtyItem' => 1,
                'PrcItem' => 19900,
            ],
            [
                'NmbItem' => 'Alineacion y balanceo',
                'QtyItem' => 1,
                'PrcItem' => 9900,
            ],
        ],
    ],
    // CASO 2
    [
        'Encabezado' => [
            'IdDoc' => [
                'TipoDTE' => 39,
                'Folio' => $folios[39]+1,
            ],
            'Emisor' => $Emisor,
            'Receptor' => $Receptor,
        ],
        'Detalle' => [
            [
                'NmbItem' => 'Papel de regalo',
                'QtyItem' => 17,
                'PrcItem' => 120,
            ],
        ],
    ],
    // CASO 3
    [
        'Encabezado' => [
            'IdDoc' => [
                'TipoDTE' => 39,
                'Folio' => $folios[39]+2,
            ],
            'Emisor' => $Emisor,
            'Receptor' => $Receptor,
        ],
        'Detalle' => [
            [
                'NmbItem' => 'Sandwich',
                'QtyItem' => 2,
                'PrcItem' => 1500,
            ],
            [
                'NmbItem' => 'Bebida',
                'QtyItem' => 2,
                'PrcItem' => 550,
            ],
        ],
    ],
    // CASO 4
    [
        'Encabezado' => [
            'IdDoc' => [
                'TipoDTE' => 39,
                'Folio' => $folios[39]+3,
            ],
            'Emisor' => $Emisor,
            'Receptor' => $Receptor,
        ],
        'Detalle' => [
            [
                'NmbItem' => 'item afecto 1',
                'QtyItem' => 8,
                'PrcItem' => 1590,
            ],
            [
                'IndExe' => 1,
                'NmbItem' => 'item exento 2',
                'QtyItem' => 2,
                'PrcItem' => 1000,
            ],
        ],
    ],
    // CASO 5
    [
        'Encabezado' => [
            'IdDoc' => [
                'TipoDTE' => 39,
                'Folio' => $folios[39]+4,
            ],
            'Emisor' => $Emisor,
            'Receptor' => $Receptor,
        ],
        'Detalle' => [
            [
                'NmbItem' => 'Arroz',
                'QtyItem' => 5,
                'UnmdItem' => 'Kg',
                'PrcItem' => 700,
            ],
        ],
    ],
];

// Objetos de Firma y Folios
$Firma = new \sasco\LibreDTE\FirmaElectronica($config['firma']);
$Folios = [];
foreach ($folios as $tipo => $cantidad)
    $Folios[$tipo] = new \sasco\LibreDTE\Sii\Folios(file_get_contents('xml/folios/'.$tipo.'.xml'));
// generar cada DTE, timbrar, firmar y agregar al sobre de EnvioBOLETA
$EnvioDTE = new \sasco\LibreDTE\Sii\EnvioDte();
foreach ($set_pruebas as $documento) {
    $DTE = new \sasco\LibreDTE\Sii\Dte($documento);
    if (!$DTE->timbrar($Folios[$DTE->getTipo()]))
        break;
    if (!$DTE->firmar($Firma))
        break;
    $EnvioDTE->agregar($DTE);
}
$EnvioDTE->setFirma($Firma);
$EnvioDTE->setCaratula($caratula);
$EnvioDTE->generar();
if ($EnvioDTE->schemaValidate()) {
    if (is_writable('xml/EnvioBOLETA.xml'))
        file_put_contents('xml/EnvioBOLETA.xml', $EnvioDTE->generar()); // guardar XML en sistema de archivos
    echo $EnvioDTE->generar();
}
// si hubo errores mostrar
foreach (\sasco\LibreDTE\Log::readAll() as $error)
    echo $error,"\n";