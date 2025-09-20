<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Reportes
$routes->get('/reportes/r1','ReporteController::getReport1');
$routes->get('/reportes/r2','ReporteController::getReport2');
$routes->get('/reportes/r3','ReporteController::getReport3');
//Reporte 4
$routes->get('/reportes/r4','ReporteController::getReport4');
$routes->get('/reportes/filtro', 'ReporteController::getFiltro');
$routes->post('/reportes/filtro', 'ReporteController::postFiltro');
$routes->post('/reportes/filtro/pdf', 'ReporteController::postFiltroPDF');
//Reporte 5
$routes->get('/reportes/r5', 'ReporteController::getReport5');
$routes->get('/reportes/r5/ajax', 'ReporteController::ajaxReport5');
$routes->post('/reportes/r5/pdf', 'ReporteController::postReport5PDF');

