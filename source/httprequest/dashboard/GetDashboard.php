<?php
include '../../query/DashboardDao.php';

header('Content-Type: application/json');
$dashboardDao = new DashboardDao();
$folio = $dashboardDao->getFoliosDisponibles();
$ventasDiarias = $dashboardDao->getVentasDiarias();
$ventasMensuales = $dashboardDao->getVentasMensuales();
$discoDuroTotal = disk_total_space("C:");
$discoDuroLibre = disk_free_space("C:");
echo "{\"folios_33\":\"".$folio->getCantidad33()."\","
    . "\"folios_39\":\"".$folio->getCantidad39()."\","
    . "\"folios_56\":\"".$folio->getCantidad56()."\","
    . "\"folios_61\":\"".$folio->getCantidad61()."\","
    . "\"venta_diaria\":\"".$ventasDiarias."\","
    . "\"venta_mensual\":\"".$ventasMensuales."\","
    . "\"disco_duro_total\":\"". floor($discoDuroTotal / 1000000000)."\","
    . "\"disco_duro_libre\":\"". floor($discoDuroLibre / 1000000000)."\""
    ."}";