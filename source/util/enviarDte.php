<?php

include '../query/ConfiguracionDao.php';

$id = filter_input(INPUT_POST,"id");
$ipServidor = ConfiguracionDao::getConfiguracion("ip_servidor");
$urlWebService = ConfiguracionDao::getConfiguracion("url_web_service");

$ruta ="http://".$ipServidor.$urlWebService."envioDte.php?id=".$id;
$trackid = file_get_contents($ruta);
