<?php

namespace Config;

use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Login
// landing page
$routes->get('/', 'HomeController::index');

// Login
$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::prosesLogin');
$routes->get('/logout', 'LoginController::logout');
// $routes->get('/logout', 'LoginController::logout');
$routes->get('/main', 'DashboardController::index');

// user
$routes->get('/data_user', 'UserController::index');
$routes->get('/tambah_user', 'UserController::tambah');

// gejala
$routes->get('/data_gejala', 'GejalaController::index');
$routes->get('/data_gejala/tambah', 'GejalaController::tambah');
$routes->post('/data_gejala/tambah', 'GejalaController::tambah');
$routes->get('/data_gejala/hapus/(:any)', 'GejalaController::hapus/$1');
$routes->get('/data_gejala/edit/(:any)', 'GejalaController::edit/$1');
$routes->post('/data_gejala/update/(:num)', 'GejalaController::update/$1');

// penyakit
$routes->get('/data_penyakit', 'PenyakitController::index');
$routes->get('/data_penyakit/tambah', 'PenyakitController::tambah');
$routes->post('/data_penyakit/tambah', 'PenyakitController::tambah');
$routes->get('/data_penyakit/hapus/(:any)', 'PenyakitController::hapus/$1');
$routes->get('/data_penyakit/edit/(:any)', 'PenyakitController::edit/$1');
$routes->post('/data_penyakit/update/(:num)', 'PenyakitController::update/$1');

// rule
$routes->get('/data_rule', 'RuleController::index');
$routes->get('/data_rule/tambah', 'RuleController::tambah');
$routes->post('/data_rule/tambah', 'RuleController::tambah');
$routes->get('/data_rule/hapus/(:any)', 'RuleController::hapus/$1');
$routes->get('/data_rule/edit/(:any)', 'RuleController::edit/$1');
$routes->post('/data_rule/update/(:num)', 'RuleController::update/$1');

// solusi
$routes->get('/data_solusi', 'SolusiController::index');
$routes->get('/data_solusi/tambah', 'SolusiController::tambah');
$routes->post('/data_solusi/tambah', 'SolusiController::tambah');
$routes->get('/data_solusi/hapus/(:any)', 'SolusiController::hapus/$1');
$routes->get('/data_solusi/edit/(:any)', 'SolusiController::edit/$1');
$routes->post('/data_solusi/update/(:num)', 'SolusiController::update/$1');

// Laporan
$routes->get('/data_laporan', 'LaporanController::index');

// Diagnosa
$routes->get('/mulai_diagnosa', 'DiagnosaController::index');
$routes->post('/hitung', 'DiagnosaController::start');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
