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
//Admin Routes
$routes->get('/admin.dashboard', 'Dashboard::index');
//artikel
$routes->get('/admin.artikel', 'Artikel::index');
$routes->get('/admin.artikel.create', 'Artikel::create');
$routes->post('/admin.artikel', 'Artikel::save');
$routes->delete('/admin.artikel/delete/(:num)', 'Artikel::delete/$1');
//$routes->get('/create', 'Artikel::create');
//kategori
$routes->get('/admin.kategori', 'Kategori::index');
$routes->get('/admin.kategori.create', 'Kategori::create');
$routes->post('/admin.kategori', 'Kategori::save');
$routes->delete('/admin.kategori/delete/(:num)', 'Kategori::delete/$1');



// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/artikel', 'Home::artikel');
$routes->get('/detail/(:segment)', 'Home::detail/$1',);

//Authentication Routes
$routes->get('/sign-in', 'Auth::index');
$routes->get('/sign-up', 'Auth::signup');
$routes->post('/sign-up', 'Auth::save');
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
