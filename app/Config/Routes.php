<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'PatientController::index');
$routes->get('/patients/add', 'PatientController::add');
$routes->get('/patients/edit', 'PatientController::edit');
$routes->get('/patients/delete', 'PatientController::delete');
$routes->post('/patients/edit', 'PatientController::edit');
$routes->post('/patients/add', 'PatientController::add');
$routes->get('/patients', 'Patients::index');

$routes->get('/diagnosis', 'DiagnosisController::index');
$routes->get('/diagnosis/add', 'DiagnosisController::add');
$routes->post('/diagnosis/add', 'DiagnosisController::add');
$routes->get('/diagnosis/edit', 'DiagnosisController::edit');
$routes->post('/diagnosis/edit', 'DiagnosisController::edit');
$routes->get('/diagnosis/delete', 'DiagnosisController::delete');



$routes->get('/patients_diagnosis', 'PatientsDiagnosisController::index');
$routes->get('/patients_diagnosis/add', 'PatientsDiagnosisController::add');
$routes->post('/patients_diagnosis/store', 'PatientsDiagnosisController::store');
$routes->get('/patients_diagnosis/edit', 'PatientsDiagnosisController::edit');
$routes->post('/patients_diagnosis/edit', 'PatientsDiagnosisController::edit');
$routes->get('/patients_diagnosis/delete', 'PatientsDiagnosisController::delete');


$routes->get('/medicine', 'MedicinesController::index');
$routes->get('/medicine/add', 'MedicinesController::add');
$routes->get('/medicine/edit', 'MedicinesController::edit');
$routes->post('/medicine/edit', 'MedicinesController::edit');
$routes->get('/medicine/delete', 'MedicinesController::delete');
$routes->post('/medicine/add', 'MedicinesController::add');

$routes->get('/patients_medicine', 'PatientsMedicineController::index');
