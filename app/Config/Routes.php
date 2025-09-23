<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Reportes
$routes->get('/reportes/r1', 'ReporteController::getReport1');
$routes->get('/reportes/r2', 'ReporteController::getReport2');
$routes->get('/reportes/r3', 'ReporteController::getReport3');

//Muestra una interfaz Web (form) para que el USUARIO sleccione un "tipo de reporte" a generar
$routes->get('/reportes/showui','ReporteController::showUIReport');
$routes->post('/reportes/publisher','ReporteController::getReportByPublisher');
$routes->post('/reportes/racealignment','getReportByRaceAlignment');

//Dashoboard 
$routes->get('/dashboard/informe1','DashboardController::getInforme1');