<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/kontak', 'Home::kontak');
$routes->get('/team-login', 'Login::login_team');
// $routes->get('/admin', 'Home::admin');
$routes->get('/team-detail', 'Team::detail_akun');
$routes->get('/book', 'Arena::search_arena');
$routes->get('/team-daftar', 'Daftar::v_daftar_team');
$routes->get('/arena-daftar', 'Daftar::v_daftar_arena');
$routes->get('/arena-login', 'Login::login_arena');
$routes->get('/profile', 'Team::profile_team');
// $routes->get('/profile-arena', 'Arena::v_profile_arena');
$routes->get('/arena-detail', 'Arena::info_arena');
$routes->get('/arena/(:num)', 'Arena::detail_arena/$1');
$routes->get('/team/(:num)', 'Team::detail_team/$1');
$routes->get('/arena/pemesanan', 'Arena::view_pemesanan');
$routes->get('/team/pemesanan', 'Team::view_pemesanan');
$routes->get('/lawan', 'Team::search_lawan');
// $routes->get('/daftar', 'Daftar::index');


/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
