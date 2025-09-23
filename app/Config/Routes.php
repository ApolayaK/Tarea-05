<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Reportes
$routes->get('/reportes/r1', 'ReporteController::getReport1');
$routes->get('/reportes/r2', 'ReporteController::getReport2');
$routes->get('/reportes/r3', 'ReporteController::getReport3');

// Muestra la interfaz Web (form) para seleccionar tipo de reporte
$routes->get('/reportes/showui','ReporteController::showUIReport');
$routes->post('/reportes/publisher','ReporteController::getReportByPublisher');
$routes->post('/reportes/racealignment','ReporteController::getReportByRaceAlignment');

// Dashboard 
$routes->get('/dashboard/informe1','DashboardController::getInforme1');
