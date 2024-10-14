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
$routes->get('/admin.dashboard', 'Dashboard::index', ['filter' => 'Pagebarier']);
//artikel
$routes->get('/admin.artikel', 'Artikel::index', ['filter' => 'Pagebarier']);
$routes->get('/admin.artikel.create', 'Artikel::create', ['filter' => 'Pagebarier']);
$routes->post('/admin.artikel', 'Artikel::save', ['filter' => 'Pagebarier']);
$routes->delete('/admin.artikel/delete/(:num)', 'Artikel::delete/$1');
//kategori
$routes->get('/admin.kategori', 'Kategori::index', ['filter' => 'Pagebarier']);
$routes->get('/admin.kategori.create', 'Kategori::create', ['filter' => 'Pagebarier']);
$routes->post('/admin.kategori', 'Kategori::save', ['filter' => 'Pagebarier']);
$routes->delete('/admin.kategori/delete/(:num)', 'Kategori::delete/$1', ['filter' => 'Pagebarier']);

//Profile
$routes->get('/admin.profile', 'Profile::index');



// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/artikel', 'Home::artikel');
$routes->get('/detail/(:segment)', 'Home::detail/$1', ['filter' => 'logged_in']);

//Authentication Routes
$routes->get('/sign-in', 'Auth::index');
$routes->post('/sign-in', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
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
